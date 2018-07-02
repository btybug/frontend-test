<?php namespace Btybug\Uploads\Datatables;
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 28.12.2017
 * Time: 14:53
 */

class Extensions
{
    public static $js = [
        'buttons'    => [
            'public/js/DataTables/Buttons-1.5.1/js/dataTables.buttons.js',
            'public/js/DataTables/Buttons-1.5.1/js/buttons.flash.js',
            'public/js/DataTables/JSZip-2.5.0/jszip.min.js',
            'public/js/DataTables/pdfmake-0.1.32/pdfmake.js',
            'public/js/DataTables/pdfmake-0.1.32/vfs_fonts.js',
            'public/js/DataTables/Buttons-1.5.1/js/buttons.html5.js',
            'public/js/DataTables/Buttons-1.5.1/js/buttons.print.js',
            'public/js/DataTables/Buttons-1.5.1/js/buttons.colVis.js'
        ],
        'colReorder' => ['public/js/DataTables/ColReorder-1.4.1/js/dataTables.colReorder.min.js']
    ];
    public static $css = [
        'buttons'    => [
            'public/js/DataTables/Buttons-1.5.1/css/buttons.dataTables.css'
        ],
        'colReorder' => ['public/js/DataTables/ColReorder-1.4.1/css/colReorder.bootstrap.css']
    ];
    public $autoFill = ['autoFill' => true];

    public function scroller ()
    {
        return ' deferRender:true,scrollY:200,scrollCollapse: true,scroller:true';

    }

    public function autoFill ($params = null)
    {
        return 'autoFill:true';
    }

    public function colReorder ($params = null)
    {
        return 'colReorder:true';
    }

    public function buttons ($params)
    {
        $data = '';
        foreach ($params as $param => $val) {
            $data .= "'$param'" . ',';
        };
        $data = trim($data, ',');

        return " dom: 'Bfrtip',buttons: [$data]";
    }

    public static function getExtensions ($settings)
    {
        $json = '';
        $js = [];
        $css = [];
        $_this = new self();
        foreach ($settings as $extension => $param) {
            if (method_exists($_this, $extension)) {
                $json .= $_this->$extension($param) . ',';
                if (isset(self::$js[$extension])) {
                    $js = array_merge($js, self::$js[$extension]);
                }
                if (isset(self::$css[$extension])) {
                    $css = array_merge($css, self::$css[$extension]);
                }
            }
        }

        $data = ['json' => $json, 'js' => $js, 'css' => $css];

        return $data;
    }
}

//processing: true,
//                serverSide: true,
//                autoFill: true,
//                colReorder: true,
//                dom: 'Bfrtip',
//                columnDefs: [
//                    {
//                        targets: 1,
//                        className: 'noVis'
//                    }
//                ],
//                buttons: [
//                    {
//                        extend: 'colvis',
//                        columns: ':not(.noVis)'
//                    }
//                ]
//                , colReorder: {
//    realtime: false
//                },