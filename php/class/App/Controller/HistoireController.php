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
        echo $_SERVER['QUERY_STRING'];

        $db = new DB();
        $db->query('SELECT * FROM histoire h where h.id_histoire=:idHistoire');
        $db->bind('idHistoire', $_SERVER['QUERY_STRING']);
        $res = $db->result('App\\Entity\\Histoire');
        $_SESSION['histoire']=$res;
        var_dump($_SESSION['histoire']);
        return [
            $_SESSION['histoires']['titre'],
            [
                'title' => 'Liste Histoire'
            ]
        ];

        return [
            'histoire',
            [
                'title' => 'Histoire',
                'histoire' => $_GET['histoires'][$_SERVER['QUERY_STRING']]
            ]
        ];
    }
}