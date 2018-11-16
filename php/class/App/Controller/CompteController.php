<?php
/**
 * Created by PhpStorm.
 * User: Zouif
 * Date: 23-Aug-18
 * Time: 4:26 PM
 */

namespace App\Controller;

use App\Utils\DB;

class CompteController
{
    public function showCompteUser(){
        return [
            'compte',
            [
                'title' => 'Compte Utilisateur'
            ]
        ];
    }

    public function showCompteAdmin(){
        return [
            'compte',
            [
                'title' => 'Compte Admin'
            ]
        ];
    }

    public function showListeHistoires(){
        $db = new DB();
        $db->query('SELECT * FROM film');
        $res = $db->result('App\\Entity\\Movie');
        $_GET['films']=$res;
        return [
            'liste_histoires',
            [
                'title' => 'Liste Histoire',
                'films' => $res
            ]
        ];
    }

    public function showMesHistoires(){
        return [
            'mes_histoires',
            [
                'title' => 'Mes Histoires'
            ]
        ];
    }

}