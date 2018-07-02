<?php
/**
 * Copyright (c) 2017. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

namespace Btybug\Uploads\Services;

use Btybug\btybug\Services\GeneralService;
use Btybug\btybug\Repositories\AdminsettingRepository;
use Btybug\Uploads\Repository\AppProductRepository;
use Btybug\Uploads\Repository\AppRepository;

/**
 * Class ThemeService
 * @package Btybug\Console\Services
 */
class AppsService extends GeneralService
{

    /**
     * @var
     */
    private $current;
    private $appRepository;
    private $appProductRepository;
    private $adminsettingRepository;
    /**
     * @var
     */
    private $result;

    public function __construct (
        AppRepository $appRepository,
        AppProductRepository $appProductRepository,
        AdminsettingRepository $adminsettingRepository
    )
    {
        $this->appRepository = $appRepository;
        $this->appProductRepository = $appProductRepository;
        $this->adminsettingRepository = $adminsettingRepository;
    }

    public function createProduct ($id, $name)
    {
        $app = $this->appRepository->findOrFail($id);

        if (! $name) return false;
        $this->appProductRepository->create([
            'name'    => $name,
            'app_id'  => $app->id,
            'token'   => bcrypt(uniqid($name)),
            'user_id' => \Auth::id(),
        ]);

        return true;
    }

    public function getForEdit ($model)
    {
        $data = $model->json_data;
        $model = $model->toArray();

        return (is_array($data)) ? array_merge($model, $data) : $model;
    }
}