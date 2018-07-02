<?php

namespace Btybug\Uploads\Services;

use Btybug\btybug\Services\GeneralService;
use Btybug\Framework\Repository\VersionsRepository;
use Btybug\btybug\Repositories\AdminsettingRepository;

/**
 * Class ThemeService
 * @package Btybug\Console\Services
 */
class VersionsService extends GeneralService
{

    /**
     * @var
     */
    private $current;
    private $versionsRepository;
    private $adminsettingRepository;
    /**
     * @var
     */
    private $result;

    public function __construct (VersionsRepository $versionsRepository, AdminsettingRepository $adminsettingRepository)
    {
        $this->versionsRepository = $versionsRepository;
        $this->adminsettingRepository = $adminsettingRepository;
    }

    public function getType ($type)
    {
        if ($type == 'css' || $type == 'framework') {
            return 'css';
        } else {
            return 'js';
        }
    }

    public function makeVersion ($request)
    {
        if ($request->get("env") == "link") {
            $this->versionsRepository->create([
                'name'      => $request->get('name'),
                'type'      => $request->get('type'),
                'version'   => $request->get('version'),
                'file_name' => $request->get('link'),
                'author_id' => \Auth::id(),
                'env'       => 1,
                'active'    => 1
            ]);
        } else {
            $this->exstension = $request->file('file')->getClientOriginalExtension(); // getting image extension
            $oname = $request->file('file')->getClientOriginalName(); // getting image extension
            $fname = uniqid() . '.' . $this->exstension;
            $type = $this->getType($request->type);
            $request->file('file')->move(public_path($type . '/versions/' . $request->get('name') . '/' . $request->get('version')), $fname);

            $this->versionsRepository->create([
                'name'      => $request->get('name'),
                'type'      => $request->get('type'),
                'version'   => $request->get('version'),
                'file_name' => $fname,
                'author_id' => \Auth::id(),
                'active'    => 1,
                'env'       => 0,
                'content'   => md5(public_path($type . '/versions/' . $request->get('name') . '/' . $request->get('version')))
            ]);
        }
    }

    public function updateVersion ($request)
    {
        $version = $this->versionsRepository->find($request->get('parent_id'));

        $this->exstension = $request->file('file')->getClientOriginalExtension(); // getting image extension
        $oname = $request->file('file')->getClientOriginalName(); // getting image extension
        $fname = uniqid() . '.' . $this->exstension;
        $type = $this->getType($request->type);
        $request->file('file')->move(public_path($type . '/versions/' . $version->name . '/' . $request->get('version')), $fname);

        $this->versionsRepository->create([
            'name'      => $version->name,
            'type'      => $version->type,
            'version'   => $request->get('version'),
            'file_name' => $fname,
            'author_id' => \Auth::id(),
            'content'   => md5(public_path($type . '/versions/' . $version->name . '/' . $request->get('version')))
        ]);
    }

    public function updateJQueryVersion ($request)
    {
        if (gettype($request->get('parent_id')) == 'string') {
            $this->exstension = $request->file('file')->getClientOriginalExtension(); // getting image extension
            $oname = $request->file('file')->getClientOriginalName(); // getting image extension
            $fname = uniqid() . '.' . $this->exstension;
            $type = $this->getType($request->type);

            $request->file('file')->move(public_path($type . '/versions/' . $request->get('parent_id') . '/' . $request->get('version')), $fname);

            if ($request->get('parent_id') == 'backend_jquery') {
                $data['is_generated'] = 1;
            } else {
                $data['is_generated_front'] = 1;
            }

            $this->versionsRepository->create([
                    'name'      => $request->get('parent_id'),
                    'type'      => $request->get('type'),
                    'version'   => $request->get('version'),
                    'file_name' => $fname,
                    'author_id' => \Auth::id(),
                    'active'    => 1,
                    'env'       => 0,
                    'content'   => md5(public_path($type . '/versions/' . $request->get('parent_id') . '/' . $request->get('version')))
                ] + $data);

            $this->synchronize();
            $this->synchronize("is_generated_front");

        } else {
            $type = $this->getType($request->type);

            $version = $this->versionsRepository->find($request->get('parent_id'));
            $this->exstension = $request->file('file')->getClientOriginalExtension(); // getting image extension
            $oname = $request->file('file')->getClientOriginalName(); // getting image extension
            $fname = uniqid() . '.' . $this->exstension;
            $request->file('file')->move(public_path($type . '/versions/' . $version->name . '/' . $request->get('version')), $fname);

            $this->versionsRepository->create([
                'name'      => $version->name,
                'type'      => $version->type,
                'version'   => $request->get('version'),
                'file_name' => $fname,
                'author_id' => \Auth::id(),
                'content'   => md5(public_path($type . '/versions/' . $version->name . '/' . $request->get('version')))
            ]);
        }
    }

    public function makeActive ($id)
    {
        $this->versionsRepository->updateWhere($id, "!=", ['active' => 0]);
        $this->versionsRepository->update($id, ['active' => 1]);
    }

    public function changeVersion ($id)
    {
        $version = $this->versionsRepository->find($id);
        $this->versionsRepository->updateWithAttribute('name', '=', $version->name, ['active' => 0]);
        $this->versionsRepository->update($id, ['active' => 1]);

        if ($version->type == "js" && $version->type == "jquery") {
            $this->synchronize();
            $this->synchronize("is_generated_front");
        }
    }

    public function generateJS ($data)
    {
        $response = $this->versionsRepository->model()->where('id', $data['id'])->where('type', 'js')->first();
        if ($response) {
            $this->versionsRepository->updateWhere($data['id'], '=', [$data['name'] => $data['value']]);
            $this->synchronize($data['name']);
        }
    }

    private function synchronize ($section = "is_generated")
    {
        $generatingData = $this->versionsRepository->getLocalData($section);
        dd($generatingData);
        $js = "";
        if (count($generatingData)) {
            foreach ($generatingData as $key => $val) {
                if (\File::exists(public_path("js/versions/" . $val->name . "/" . $val->version . "/" . $val->file_name))) {
                    $js .= \File::get(public_path("js/versions/" . $val->name . "/" . $val->version . "/" . $val->file_name));
                }
            }
        }
        $section = ($section == 'is_generated') ? 'back' : 'front';
        $this->MakeMainJS($section, $js);
    }

    public function MakeMainJS ($section, $data)
    {
        \File::put(public_path("js/" . $section . ".js"), $data);
    }

    public function makeCss ($request)
    {
        if ($request->get("env") == "link") {
            $this->versionsRepository->create([
                'name'      => $request->get('name'),
                'type'      => $request->get('type'),
                'version'   => $request->get('version'),
                'file_name' => $request->get('link'),
                'author_id' => \Auth::id(),
                'env'       => 1,
                'active'    => 1
            ]);
        } else {
            $this->exstension = $request->file('file')->getClientOriginalExtension(); // getting image extension
            $oname = $request->file('file')->getClientOriginalName(); // getting image extension
            $fname = uniqid() . '.' . $this->exstension;
            $request->file('file')->move(public_path('css/versions'), $fname);

            $this->versionsRepository->create([
                'name'      => $request->get('name'),
                'type'      => $request->get('type'),
                'version'   => $request->get('version'),
                'file_name' => $fname,
                'author_id' => \Auth::id(),
                'active'    => 0,
                'env'       => 0,
                'content'   => md5(public_path('css/versions'))
            ]);
        }
    }

    public function updateLink ($request)
    {
        $response = $this->versionsRepository->find($request['id']);
        if ($response) {
            $response->update(['file_name' => $request['link']]);
        }
    }

    public function delete ($item)
    {
        if ($item->env == 'local') {
            $data = $this->versionsRepository->getBy('name', $item->name);
            if (count($data)) {
                foreach ($data as $val) {
                    if (\File::exists(public_path("js/versions/" . $val->name . "/" . $val->version . "/" . $val->file_name))) {
                        unlink(public_path("js/versions/" . $val->name . "/" . $val->version . "/" . $val->file_name));
                    }
                    $this->versionsRepository->delete($val->id);
                }
                if ($item->type == "js") {
                    $this->synchronize();
                    $this->synchronize("is_generated_front");
                }
            }
        } else {
            return $this->versionsRepository->delete($item->id);
        }
    }

    public function getJqueryVersions ()
    {
        $data = [];
        $result = $this->versionsRepository->getJQuery();
        if (count($result)) {
            foreach ($result as $item) {
                if ($item->is_generated) {
                    $data["backend_jquery"] = $item;
                } elseif ($item->is_generated_front) {
                    $data["frontend_jquery"] = $item;
                }
            }
        }

        return $data;
    }

    public function getContent ($val)
    {
        $code = '';
        if ($val->path && \File::exists($val->path)) {
            $code = \File::get($val->path);
        }

        return $code;
    }

    public function updateContent ($val, $code)
    {
        if ($val->type == 'css' || $val->type == 'framework') {
            \File::put(public_path("css/versions/" . $val->file_name), $code);
        } else {
            if (! \File::isDirectory(public_path("js/versions/" . $val->name . "/" . $val->version))) {
                \File::makeDirectory(public_path("js/versions/" . $val->name . "/" . $val->version),493,true);
            }
            $a = \File::put(public_path("js/versions/" . $val->name . "/" . $val->version . "/" . $val->file_name), $code);
        }
    }
}