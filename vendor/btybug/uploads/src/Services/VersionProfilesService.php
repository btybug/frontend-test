<?php

namespace Btybug\Uploads\Services;

use Btybug\btybug\Services\GeneralService;
use Btybug\Framework\Repository\VersionsRepository;
use Btybug\btybug\Repositories\AdminsettingRepository;
use Btybug\Uploads\Repository\VersionProfilesRepository;

/**
 * Class ThemeService
 * @package Btybug\Console\Services
 */
class VersionProfilesService extends GeneralService
{

    /**
     * @var
     */
    private $current;
    private $versionsRepository;
    private $adminsettingRepository;
    private $versionServiceRepository;
    /**
     * @var
     */
    private $result;

    public function __construct (VersionsRepository $versionsRepository, AdminsettingRepository $adminsettingRepository, VersionProfilesRepository $profilesRepository)
    {
        $this->versionsRepository = $versionsRepository;
        $this->adminsettingRepository = $adminsettingRepository;
        $this->versionServiceRepository = $profilesRepository;
    }

    public function generateJS ($profile)
    {
        $this->synchronize($profile, 'js');
    }

    public function generateCSS ($profile)
    {
        $this->synchronize($profile);
    }

    private function synchronize ($profile, $type = 'css')
    {
        $generatingData = $profile->files;
        $file_data = "";
        if (isset($generatingData['frontHeaderJs']) && count($generatingData['frontHeaderJs'])) {
            foreach ($generatingData['frontHeaderJs'] as $key => $item) {
                if($item['type'] == 'path' or $item['type'] == 'unit'){
                    if (\File::exists($item['path'])) {
                        $file_data .= \File::get($item['path']) . "\r\n";
                    }
                }else{
                    $file_data .= file_get_contents($item['path']). "\r\n";
                }
            }
        }
        $file = $type . "/profiles/" . str_slug($profile->name) . "." . $type;
        $this->versionServiceRepository->update($profile->id, ['hint_path' => $file]);
        $this->MakeFile($file, $file_data, $type);
    }

    public function MakeFile ($file, $data, $type)
    {
        if (! \File::isDirectory(public_path($type . "/profiles"))) {
            \File::makeDirectory(public_path($type . "/profiles"));
        }

        \File::put(public_path($file), $data);
    }

    public function removeFile ($path)
    {
        \File::delete(public_path($path));
    }
}