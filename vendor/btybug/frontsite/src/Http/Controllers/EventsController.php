<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 6/28/17
 * Time: 12:06 PM
 */

namespace Btybug\FrontSite\Http\Controllers;


use Btybug\Console\Models\Forms;
use Btybug\Console\Repository\FormsRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Btybug\FrontSite\Models\EventSubscriber\EventGenerator\Generator;

class EventsController extends Controller
{
    public function getIndex(FormsRepository $formsRepository,Generator $generator)
    {
//        $generator->getEvents();
//        $generator->generate('form',13,'Create fpost');
//        Generator::fire('form',27,Forms::find(27),\Auth::user());
        $forms = $formsRepository->getAll();
        foreach($forms as $form){
            if(isset($form->settings['event']) && $form->settings['event']){
               
                \Subscriber::addEvent($form->name, 'App\Events\FormSubmit$'.$form->id);
            }
        }
        $subscriber = \Subscriber::getSubscriptions();
        return view('manage::events.index', compact('subscriber'));
    }

    public function getIndexNew()
    {
        $subscriber = \Subscriber::getSubscriptions();
        return view('manage::events.index_new', compact('subscriber'));
    }

    public function postNewConnection(Request $request)
    {
        dd($request->all());

    }

    public function getIndexNewConnection()
    {
        $subscriber = \Subscriber::getSubscriptions();
        return view('manage::events.new_connections', compact('subscriber'));
    }

    public function postGetFunctionData(Request $request)
    {
        $namespace = $request->get('namespace');
        if ($namespace) {
            $data = \Subscriber::getForm($namespace);
            return \Response::json(['data' => $data, 'error' => false]);
        }
        return \Response::json(['error' => true, 'message' => 'namespace is mandatory']);
    }

    public function postSave(Request $request)
    {
        dd($request->all());
    }

    public function postGetEventFunctionRelation(Request $request)
    {
        $e_name = $request->get('event_namespace');
        $subscriberProperties = \Subscriber::getSubscriptions()->getProperties();
        $subscripts = \Subscriber::getSubscriptions()->getData();
        $tabs = [];
        if (isset($subscripts[$e_name])) {
            foreach ($subscripts[$e_name] as $key => $value) {
                $functionNamespace = explode('$', $key);
                $slug = str_replace('\\', '-', $functionNamespace[0]);
                $formData = \Subscriber::getForm($functionNamespace[0]);
                foreach ($value as $key => $val) {
                    if (isset($formData[$key])) {
                        $formData[$key]['value'] = $val;
                    }
                }
                if(isset($subscriberProperties[$slug])){
                    $tabs[] = [
                        'namespace' => $functionNamespace[0],
                        'form' => $formData,
                        'name' => $subscriberProperties[$slug]['name']
                    ];
                }

            }
        }

        return \Response::json(['tabs' => $tabs]);
    }

    public function postSaveEventFunctionRelation(Request $request)
    {

        $settings = json_decode($request->get('data'), true);
        foreach ($settings as $e_name => $subscriptions) {
            foreach ($subscriptions as $f_name => $f_settings) {
                \Subscriber::clean($e_name, $f_name);
                \Subscriber::add($e_name, $f_name, $f_settings);
            };
        }
        \Subscriber::save();
        return \Response::json(['error' => false]);

    }

}