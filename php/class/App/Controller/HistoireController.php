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
    private $nom;

    public function showCreatePersonnage(){

        return [
            'personnage',
            [
            ]
        ];
    }

    public function checkParamSign(){
        $this->errors = [];

        if($_POST['nom'] === ""){
            $this->errors['nom'] = 'this field is required';
        } else {
            $this->nom = $_POST['nom'];
        }
    }

    public function createPersonnage(){

        $this->checkParamSign();
        if(count($this->errors) > 0){
            return [
                'personnage',
                [
                    'errors' => $this->errors
                ]
            ];
        }
        else {
            var_dump("Insert un personnage ----");
            //Insert un personnage
            $db = new DB();
            $query = 'INSERT INTO personnage (id_histoire, id_heroes, nom_personnage) VALUES (:idHistoire, :idUser, :nom);';
            $db->query($query);
            $db->bind(':idHistoire', $_GET['idHistoire']);
            $db->bind(':idUser', $_SESSION['idUser']);
            $db->bind(':nom', $this->nom);
            $db->execute();

            var_dump("Select idPersonnqge ----");
            //Select idPersonnqge
            $query = 'SELECT * FROM personnage WHERE id_histoire=:idHistoire AND id_heroes=:idUser and nom_personnage=:nom;';
            $db->query($query);
            $db->bind(':idHistoire', $_GET['idHistoire']);
            $db->bind(':idUser', $_SESSION['idUser']);
            $db->bind(':nom', $this->nom);
            $res = $db->result('App\\Entity\\Personnage');
            $_SESSION['idPersonnage']=$res[0]->getIdPersonnage();

            var_dump("insert une sauvegarde ----");
            //insert une sauvegarde
            $query = 'INSERT INTO sauvegarde (id_heroes, id_histoire, id_detail_histoire, id_personnage) VALUES (:idUser, :idHistoire, :numeroPage, :idPersonnage);';
            $db->query($query);
            $db->bind(':idUser', $_SESSION['idUser']);
            $db->bind(':idHistoire', $_GET['idHistoire']);
            $db->bind(':numeroPage', 1);
            $db->bind(':idPersonnage', $_SESSION['idPersonnage']);
            $db->execute();


            //SELECT SAUVEGARDE
            $query = 'SELECT * FROM sauvegarde WHERE id_heroes=:idUser AND id_histoire=:idHistoire AND id_detail_histoire=:numeroPage AND id_personnage=:idPersonnage;';
            $db->query($query);
            $db->bind(':idUser', $_SESSION['idUser']);
            $db->bind(':idHistoire', $_GET['idHistoire']);
            $db->bind(':numeroPage', 1);
            $db->bind(':idPersonnage', $_SESSION['idPersonnage']);
            $res = $db->result('App\\Entity\\Sauvegarde');
            $_SESSION['idSauvegarde'] = $res[0]->getIdSauvegarde();

            $uriHistoire = 'location:/SelfHeroes/php/compte/histoire?idHistoire=' . $_GET['idHistoire'] . '&idPersonnage=' . $_SESSION['idPersonnage'] . '&numeroPage=1';
            header($uriHistoire);
        }
    }



    public function showHistoire(){
        $db = new DB();
        $db->query('SELECT numero_page, contenue FROM detail_histoire dh JOIN histoire h ON h.id_histoire=dh.id_histoire where h.id_histoire=:idHistoire and dh.numero_page=:numeroPage');
        $db->bind(':idHistoire', $_GET['idHistoire']);
        $db->bind(':numeroPage', $_GET['numeroPage']);
        $res = $db->result('App\\Entity\\Json');
        $jsonDecode = $res[0]->toDejson();

        $jsonDecodeText = $jsonDecode->{'text'};
        $jsonDecodeBts = $jsonDecode->{'bts'};

        $db->query('SELECT * FROM histoire');
        $histoire = $db->result('App\\Entity\\Histoire');
        $title = $histoire[0]->gettitre();

        //update sauvegarde
        $db->query('UPDATE SAUVEGARDE s SET id_detail_histoire=:idDetailHistoire where s.id_sauvegarde=:idSauvegarde;');
        $db->bind(':idDetailHistoire', $_GET['numeroPage']);
        $db->bind(':idSauvegarde', $_SESSION['idSauvegarde']);
        $db->execute();

        return [
            'histoire',
            [
                'idhistoire' => $_GET['idHistoire'],
                'numeropage' => $_GET['numeroPage'],
                'title' => $title,
                'text' => $jsonDecodeText,
                'bts' => $jsonDecodeBts
            ]
        ];
    }
}