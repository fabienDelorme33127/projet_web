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
        return [
            'histoire',
            [
                'title' => 'Histoire',
                'text' => 'LOREPSUM'
            ]
        ];
    }
}