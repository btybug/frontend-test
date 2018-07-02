<?php

function FWgetClasses()
{
    $modal = View::make('framework::FwFunctions.getClasses')->render();
    echo $modal;
    return '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Classes Modal</button>';
}

function FWget($data)
{
    $version = \Btybug\Framework\Models\Framework::active()->first();
    $masterCollections = count($version) ? $version->getMasterCollectionsByType($data['tag']) : [];
    $collections = ($version) ? $version->getCollectionsByType($data['tag']) : [];
    $name = (isset($data['name']) ? $data["name"] : null);
    $tag = (isset($data['tag']) ? htmlentities("<" . $data["tag"] . ">") : null);
    $modal = View::make('framework::FwFunctions.getCollections', compact('masterCollections', 'collections', 'tag', 'name'))->render();

    return $modal;
}

function BBCss($section = 'frontend')
{
    $adminsettingRepository = new  \Btybug\btybug\Repositories\AdminsettingRepository();
    $model = $adminsettingRepository->getVersionsSettings('versions', $section);
    if (count($model)) {
        if (isset($model['css_version'])) {
            $versionRepo = new \Btybug\Uploads\Repository\VersionProfilesRepository();
            $version = $versionRepo->find($model['css_version']);
            if($version && \File::exists("public/" .$version->hint_path)){
                return Html::style("public/" .$version->hint_path);
            }
        }
    }
    return '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">';
}

function BBJs($section = 'frontend')
{
    $adminsettingRepository = new  \Btybug\btybug\Repositories\AdminsettingRepository();
    $model = $adminsettingRepository->getVersionsSettings('versions', $section);
    if (count($model)) {
        if (isset($model['js_data'])) {
            $versionRepo = new \Btybug\Uploads\Repository\VersionProfilesRepository();
            $version = $versionRepo->find($model['js_data']);
            if($version && \File::exists("public/" .$version->hint_path)){
                return Html::script("public/" .$version->hint_path);
            }
        }
    }

    return '<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>';
}

function BBJquery($section = 'frontend')
{
    $adminsettingRepository = new  \Btybug\btybug\Repositories\AdminsettingRepository();
    $model = $adminsettingRepository->getVersionsSettings('versions', $section);
    if (count($model)) {
//        if ($model['jquery_option']) {
//            return Html::script($model['jquery_version']);
//        } else {
//            return Html::script($model['jquery_url']);
//        }

    }

   // return '<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>';
}

function BBMainJS()
{
    if (\File::exists(public_path('js/back.js'))) {
        return Html::script('public/js/back.js?v=999');
    }
    return '<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>';
}

function BBMainFrontJS()
{
    if (\File::exists(public_path('js/front.js'))) {
        return Html::script('public/js/front.js');
    }
    return '<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>';
}

function BBaddFunctions($key,$settings)
{
    $codes = \Config::get('functions', []);
    $codes[$key] = $settings;
    \Config::set('functions', $codes);
}

function BBallFunctions()
{
    $codes = \Config::get('functions', []);
    return $codes;
}

function BBGetUserForm()
{
    return [
        'alert_class' => [
            'type' => 'select',
            'label' => 'Alert class',
            'data' => ['success' => 'Success', 'info' => 'Info', 'warning' => 'Warning', 'danger' => 'Danger'],
            'value' => 'success'
        ],
        'message' => [
            'type' => 'text',
            'label' => 'Message',
            'value' => 'Hello world'
        ],

    ];
}