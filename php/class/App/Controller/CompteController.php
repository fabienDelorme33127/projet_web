<?php
/**
 * Created by PhpStorm.
 * User: Zouif
 * Date: 23-Aug-18
 * Time: 4:26 PM
 */

namespace App\Controller;

use App\Entity\Histoire;
use App\Utils\DB;

class CompteController
{
    private $titre;
    private $auteur;
    private $description;
    private $errors;

    public function checkParamCreer(){
        $this->errors = [];

        if($_POST['titre'] === ""){
            $this->errors['titre'] = 'this field is required';
        } else {
            $this->titre = $_POST['titre'];
        }
        if($_POST['auteur'] === ""){
            $this->errors['auteur'] = 'this field is required';
        } else {
            $this->auteur = $_POST['auteur'];
        }
        if($_POST['description'] === ""){
            $this->errors['description'] = 'this field is required';
        } else {
            $this->description = $_POST['description'];
        }
    }

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
        $db->query('SELECT * FROM histoire');
        $res = $db->result('App\\Entity\\Histoire');
        $_SESSION['histoires']=$res;
        return [
            'liste_histoires',
            [
                'title' => 'Liste Histoire'
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

    public function showCreerHistoire(){
        return [
            'creer_histoire',
            [
                'title' => 'Creer une Histoire'
            ]
        ];
    }

    public function creerHistoire(){

        $this->checkParamCreer();
        if(count($this->errors) > 0){
            return [
                'creer_histoire',
                [
                    'errors' => $this->errors
                ]
            ];
        }

        $db = new DB();
        $db->query('INSERT INTO histoire (titre, auteur, description) VALUES(:titre , :auteur, :description)');
        $db->bind(':titre', $this->titre);
        $db->bind(':auteur', $this->auteur);
        $db->bind(':description', $this->description);
        $db->execute();
        echo('Votre valeur a ete envoyee au serveur');

        return [
            'creer_histoire',
            [
            ]
        ];
    }



}