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
    private $id;
    private $login;
    private $password;


    public function checkParamSignIn(){
        $this->errors = [];

        if($_POST['login'] === ""){
            $this->errors['login'] = 'this field is required';
        } else {
            $this->login = $_POST['login'];
        }
        if($_POST['password'] === ""){
            $this->errors['password'] = 'this field is required';
        } else {
            $this->password = $_POST['password'];
        }
    }

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


        echo "signUp";
    }

    public function checkAuth(){
//
//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
//        die;

        $this->checkParamSignIn();
        if(count($this->errors) > 0){
            return [
                'sign_in',
                [
                    'errors' => $this->errors
                ]
            ];
        }
        else {

            $db = new DB();
            $db->query('SELECT * FROM heroes WHERE login LIKE :login AND password LIKE :password');
            $db->bind(':login', $this->login);
            $db->bind(':password', $this->password);
            $res = $db->result('App\\Entity\\User');
            if($res == null){
                $this->errors['SQL'] = "Wrong Login or Wrong Password";
                return [
                    'sign_in',
                    [
                        'errors' => $this->errors
                    ]
                ];
            } else {
                $_GET['user'] = $res;
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
}