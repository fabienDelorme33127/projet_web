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
    private $nb_per_page;
    private $id;
    private $id_director;
    private $id_previous;
    private $title;
    private $title_fr;
    private $year;
    private $score;


//    public function show(){
//        $db = new DB();
//        $db->query('SELECT * FROM film');
//        $res = $db->result('App\\Entity\\Movie');
//        $_GET['films']=$res;
//        return [
//            'site',
//            [
//                'title' => 'BIENVENUE SUR LE SITE DE FILMS',
//                'text' => 'Ce site vous propose une liste de film à modifier, compléter ou supprimer',
//                'films' => $res
//            ]
//        ];
//    }

    public function show(){
        return [
            'acceuil',
            [
                'title' => 'SELF HEROES',
                'text' => 'You think its juste un book ... You are not prepared !'
            ]
        ];
    }

    private function checkParam(){

        if(isset($_POST['no_of_records_per_page']) && $_POST['no_of_records_per_page'] != ''){
            $this->no_of_records_per_page = $_POST['no_of_records_per_page'];
        }
        else {
            $this->no_of_records_per_page = '10';
        }

        if(isset($_POST['id']) && $_POST['id'] != ''){
            $this->id = $_POST['id'];
        }
        else {
            $this->id = 'NULL';
        }

        if(isset($_POST['id_director']) && $_POST['id_director'] != ''){
            $this->id_director = $_POST['id_director'];
        }
        else {
            $this->id_director = 'NULL';
        }

        if(isset($_POST['id_previous']) && $_POST['id_previous'] != ''){
            $this->id_previous = $_POST['id_previous'];
        }
        else {
            $this->id_previous = 'NULL';
        }

        if(isset($_POST['title']) && $_POST['title'] != ''){
            $this->title = '\'' . $_POST['title']. '\'' ;
        }
        else {
            $this->title = 'NULL';
        }

        if(isset($_POST['title_fr']) && $_POST['title_fr'] != ''){
            $this->title_fr = '\'' . $_POST['title_fr']. '\'' ;
        }
        else {
            $this->title_fr = 'NULL';
        }

        if(isset($_POST['year']) && $_POST['year'] != ''){
            $this->year = $_POST['year'];
        }
        else {
            $this->year = 'NULL';
        }

        if(isset($_POST['score']) && $_POST['score'] != ''){
            $this->score = $_POST['score'];
        }
        else {
            $this->score = 'NULL';
        }

    }

    public function constructParamSearch(){

        $req = ' WHERE ';

        if($this->id != 'NULL'){
            $req = $req . 'id = ' . $this->id;
        }

        if($this->id_director != 'NULL'){
            if($req != ' WHERE '){
                $req = $req . ' AND ';
            }
            $req = $req . 'id_director = ' . $this->id_director;
        }

        if($this->id_previous != 'NULL'){
            if($req != ' WHERE '){
                $req = $req . ' AND ';
            }
            $req = $req . 'id_previous = ' . $this->id_previous;
        }

        if($this->title != 'NULL'){
            if($req != ' WHERE '){
                $req = $req . ' AND ';
            }
            $req = $req . 'title LIKE \'%' . str_replace("'","",$this->title) . '%\'';
        }

        if($this->title_fr != 'NULL'){
            if($req != ' WHERE '){
                $req = $req . ' AND ';
            }
            $req = $req . 'title_fr LIKE \'%' . str_replace("'","",$this->title_fr) . '%\'';
        }

        if($this->year != 'NULL'){
            if($req != ' WHERE '){
                $req = $req . ' AND ';
            }
            $req = $req . 'year LIKE \'%' . str_replace("'","",$this->year) . '%\'';
        }

        if($this->score != 'NULL'){
            if($req != ' WHERE '){
                $req = $req . ' AND ';
            }
            $req = $req . 'score = ' . $this->score;
        }

        if($req == ' WHERE '){
            $req = '';
        }

        return $req;
    }

    public function searchMovie(){

        $this->checkParam();
        $req = $this->constructParamSearch();

        $db = new DB();
        $db->query('SELECT * FROM film ' . $req);
        $res = $db->result('App\\Entity\\Movie');
        $_GET['films'] = $res;
        $_GET['nb_per_page'] = $this->nb_per_page;
        return [
            'site',
            [
                'title' => 'Bienvenue sur le site de Films',
                'text' => 'Ce site vous propose une liste de film à modifier, compléter ou supprimer',
                'films' => $res
            ]
        ];
    }

    public function other(){
        echo "hehe";

    }


}