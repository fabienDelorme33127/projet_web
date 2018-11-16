<?php
/**
 * Created by PhpStorm.
 * User: Zouif
 * Date: 23-Aug-18
 * Time: 4:26 PM
 */

namespace App\Controller;

use App\Utils\DB;

class HomeController
{
    public function show(){
        return [
            'acceuil',
            [
                'title' => 'SELF HEROES',
                'text' => 'You think its juste un book ... You are not prepared !'
            ]
        ];
    }

    public function showSignIn(){

        return [
            'sign_in',
            [
            ]
        ];
        echo "signIn";
    }

    public function signIn(){

//        $this->checkParamUser();
//        $req = $this->constructParamSearch();
//
//        $db = new DB();
//        $db->query('SELECT * FROM user ' . $req);
//        $res = $db->result('App\\Entity\\User');
//        $_GET['user'] = $res;
        return [
            'compte',
            [
            ]
        ];
        echo "signIn";
    }

    public function showSignUp(){

        return [
            'sign_up',
            [
            ]
        ];
        echo "signUp";
    }

    public function signUp(){

//        $this->checkParamUser();
//        $req = $this->constructParamSearch();
//
//        $db = new DB();
//        $db->query('SELECT * FROM user ' . $req);
//        $res = $db->result('App\\Entity\\User');
//        $_GET['user'] = $res;
//        return [
//            'site',
//            [
//                'title' => 'Bienvenue sur le site de Films',
//                'text' => 'Ce site vous propose une liste de film à modifier, compléter ou supprimer',
//                'films' => $res
//            ]
//        ];
        echo "signUp";
    }

    public function checkAuth(){
//
//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
//        die;

        $errors = [];

        if($_POST['login'] === ""){
            $errors['login'] = 'Le champs est obligatoire';
        }
        if($_POST['password'] === ""){
            $errors['password'] = 'Le champs est obligatoire';
        }
        if(count($errors) > 0){
            return [
                'sign_in',
                [
                    'errors' => $errors
                ]
            ];
        }
        else {
            $typeCompte = 'user';
            if($typeCompte == 'admin'){
                header('location:/SelfHeroes/php/compteAdmin');
            }
            else {
                header('location:/SelfHeroes/php/compte');
            }
        }

    }
}