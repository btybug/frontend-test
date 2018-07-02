<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 07.03.2018
 * Time: 22:02
 */

namespace Btybug\FrontSite\Models\EventSubscriber\EventGenerator;


class Generator
{
    private $eventGenPath;
    private $listnerGenPath;
    private $eventStubPath;
    private $listnerStubPath;
    private $jsonPath;
    private $data;

    public function __construct()
    {
        $this->jsonPath = storage_path('app' . DS . 'event_generator.json');
        $this->eventGenPath = app_path('Events' . DS . 'Generator');
        $this->listnerGenPath = app_path('Listeners' . DS . 'Generator');
        $this->eventStubPath = module_path('frontsite' . DS . 'src' . DS . 'Models' . DS . 'EventSubscriber' . DS . 'EventGenerator' . DS . 'Event' . DS . 'event.stub');
        $this->listnerStubPath = module_path('frontsite' . DS . 'src' . DS . 'Models' . DS . 'EventSubscriber' . DS . 'EventGenerator' . DS . 'Event' . DS . 'listener.stub');
        if (!\File::exists($this->jsonPath)) {
            \File::put($this->jsonPath, '[]');
        }
        $this->data = $this->getStorageData();
    }

    public function generate($type, $id, $name)
    {
        $className = $type . md5($id);
        $event = $this->createEvent($className);
        $listner = $this->createListner($className);
        return $this->put($type, $event, $listner, $name);
    }

    private function createEvent($className)
    {
        $content = \File::get($this->eventStubPath);
        $content = str_replace('DummyClass', $className, $content);
        \File::put($this->eventGenPath . DS . $className . '.php', $content);
        return $this->eventNamespace($className);
    }

    private function createListner($className)
    {
        $content = \File::get($this->listnerStubPath);
        $content = str_replace('DummyEvent', $className, $content);
        $className .= 'Listner';
        $content = str_replace('DummyClass', $className, $content);
        \File::put($this->listnerGenPath . DS . $className . '.php', $content);
        return $this->listnerNamespace($className);
    }

    private function eventNamespace($className)
    {
        return 'App\Events\Generator' . '\\' . $className;
    }

    private function listnerNamespace($className)
    {
        return 'App\Listeners\Generator' . '\\' . $className;
    }

    private function put($type, $event, $listner, $name)
    {
        $data = $this->getStorageData();
        $data[$type][$event]['name'] = $name;
        $data[$type][$event]['listner'] = $listner;
        $data['subscribes'][] = $listner;
        return $this->putStorageData($data);
    }

    private function getStorageData()
    {
        $data = json_decode(\File::get($this->jsonPath), true);
        return $data;
    }

    private function putStorageData(array $data)
    {
        return \File::put($this->jsonPath, json_encode($data, true));
    }

    public function getSubscribes()
    {

        return isset($this->data['subscribes']) ? $this->data['subscribes'] : [];
    }

    public function getEvents()
    {
        $data = $this->data;
        $result = [];
        unset($data['subscribes']);
        foreach ($data as $types) {
            foreach ($types as $event => $type) ;
            $result[$event][] = $type['listner'];
        }
        return $result;
    }

    public function getEventsRegister()
    {
        $data = $this->data;
        unset($data['subscribes']);
        foreach ($data as $key=>$types) {
            foreach ($types as $event => $type) {
                \Subscriber::addEvent($type['name'], $event,['type'=>$key]);
            }
        }
    }

    public static function fire($type,$id,...$args)
    {
        $className = ('App\Events\Generator\\'.$type.md5($id));
        event(new $className($args));
    }
}