<?php
/**
 * Copyright (c) 2017.
 * *
 *  * Created by PhpStorm.
 *  * User: Edo
 *  * Date: 10/3/2016
 *  * Time: 10:44 PM
 *
 */

namespace Btybug\Console\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Btybug\Console\Http\Requests\Account\GeneralSettingsRequest;
use Btybug\Console\Repository\AdminPagesRepository;
use Btybug\btybug\Repositories\AdminsettingRepository;

class GeneralController extends Controller
{

    public $adminsettingRepository;
    public $adminPagesRepository;

    public function __construct(
        AdminsettingRepository $adminsettingRepository,
        AdminPagesRepository $adminPagesRepository
    )
    {
        $this->adminsettingRepository = $adminsettingRepository;
        $this->adminPagesRepository = $adminPagesRepository;
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        $adminLoginPage = $this->adminPagesRepository->findBy('slug', 'admin-login');
        $data = $this->adminsettingRepository->getBackendSettings();
        return view('console::general.settings', compact(['data', 'adminLoginPage']));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSettings(
        Request $request
    )
    {
        $data = $request->except('_token', 'admin_login_url');
        if ($request->admin_login_url) {
            $this->adminsettingRepository->createOrUpdate($request->admin_login_url, 'setting_system', 'admin-login-url');
        }
        $this->adminsettingRepository->createOrUpdateToJson($data, 'backend_settings', 'backend_settings');
        return redirect()->back();
    }

    public function getValidations()
    {
        $validations = BBGetAllValidations();
        return view('console::general.validations', compact(['validations']));
    }

    public function getTriggerEvents()
    {
        return view('console::general.trigger_events');
    }
}