<?php











namespace Composer\DependencyResolver;

use Composer\Util\IniHelper;




class SolverProblemsException extends \RuntimeException
{
protected $problems;
protected $installedMap;

public function __construct(array $problems, array $installedMap)
{
$this->problems = $problems;
$this->installedMap = $installedMap;

parent::__construct($this->createMessage(), 2);
}

protected function createMessage()
{
$text = "\n";
$hasExtensionProblems = false;
foreach ($this->problems as $i => $problem) {
$text .= "  Problem ".($i + 1).$problem->getPrettyString($this->installedMap)."\n";

if (!$hasExtensionProblems && $this->hasExtensionProblems($problem->getReasons())) {
$hasExtensionProblems = true;
}
}

if (strpos($text, 'could not be found') || strpos($text, 'no matching package found')) {
$text .= "\nPotential causes:\n - A typo in the package name\n - The package is not available in a stable-enough version according to your minimum-stability setting\n   see <https://getcomposer.org/doc/04-schema.md#minimum-stability> for more details.\n\nRead <https://getcomposer.org/doc/articles/troubleshooting.md> for further common problems.";
}

if ($hasExtensionProblems) {
$text .= $this->createExtensionHint();
}

return $text;
}

public function getProblems()
{
return $this->problems;
}

private function createExtensionHint()
{
$paths = IniHelper::getAll();

if (count($paths) === 1 && empty($paths[0])) {
return '';
}

$text = "\n  To enable extensions, verify that they are enabled in your .ini files:\n    - ";
$text .= implode("\n    - ", $paths);
$text .= "\n  You can also run `php --ini` inside terminal to see which files are used by PHP in CLI mode.";

return $text;
}

private function hasExtensionProblems(array $reasonSets)
{
foreach ($reasonSets as $reasonSet) {
foreach ($reasonSet as $reason) {
if (isset($reason["rule"]) && 0 === strpos($reason["rule"]->getRequiredPackage(), 'ext-')) {
return true;
}
}
}

return false;
}
}
