<?php
/**
 * Created by PhpStorm.
 * User: Zouif
 * Date: 23-Aug-18
 * Time: 4:26 PM
 */

namespace App\Controller;

use App\Utils\DB;

class HistoireController
{

    public function showHistoire(){
        echo $_SERVER['QUERY_STRING'];
        echo $_GET['histoires'][$_SERVER['QUERY_STRING']];
        return [
            'histoire',
            [
                'title' => 'Histoire',
                'histoire' => $_GET['histoires'][$_SERVER['QUERY_STRING']]
            ]
        ];
    }
}