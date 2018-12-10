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
        $db->query('SELECT contenue FROM detail_histoire dh JOIN histoire h ON h.id_histoire=dh.id_histoire where h.id_histoire=:idHistoire and dh.numero_page=:numeroPage');
        $db->bind('idHistoire', $_SERVER['QUERY_STRING']);
        $res = $db->result('App\\Entity\\Histoire');
        $_SESSION['histoire']=json_decode($res);
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