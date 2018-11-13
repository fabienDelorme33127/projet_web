<?php
/**
 * Created by PhpStorm.
 * User: Zouif
 * Date: 23-Aug-18
 * Time: 4:26 PM
 */

namespace App\Controller;

use App\Utils\DB;

class MovieController
{

    private $id;
    private $id_director;
    private $id_previous;
    private $title;
    private $title_fr;
    private $year;
    private $score;

    private $success;

    public function showAddUpdateMovie(){

        if (!empty($_POST)){
            $this->success = "SUCCESS";
        }

        return [
            'add_update',
            [
                'text' => 'Si vous alimentez le champ "id", vous serez en mode MODIFIER.
                Si vous n\' alimentez pas le champ "id", vous serez en mode AJOUTER',
                'success' => $this->success
            ]
        ];
    }

    private function checkParam(){

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

    public function addUpdateMovie(){
        $this->checkParam();
        if($this->id == 'NULL'){
            return $this->addMovie();
        } else {
            return $this->updateMovie();
        }
    }

    public function addMovie(){

        $this->checkParam();

        $db = new DB();
        $db->query('INSERT INTO film (id_director, id_previous, title, title_fr, year, score)'
        . ' VALUES('
            . $this->id_director . ', '
            . $this->id_previous . ', '
            . $this->title . ', '
            . $this->title_fr . ', '
            . $this->year . ', '
            . $this->score . ');'
        );
        $db->execute();

        return $this->showAddUpdateMovie();
    }

    private function constructParamUpdate(){
        $req = '';

        if($this->id_director != 'NULL'){
            $req = 'id_director = ' . $this->id_director;
        }

        if($this->id_previous != 'NULL'){
            if($req != ''){
                $req = $req . ', ';
            }
            $req = $req . 'id_previous = ' . $this->id_previous;
        }

        if($this->title != 'NULL'){
            if($req != ''){
                $req = $req . ', ';
            }
            $req = $req . 'title = ' . $this->title;
        }

        if($this->title_fr != 'NULL'){
            if($req != ''){
                $req = $req . ', ';
            }
            $req = $req . 'title_fr = ' . $this->title_fr;
        }

        if($this->year != 'NULL'){
            if($req != ''){
                $req = $req . ', ';
            }
            $req = $req . 'year = ' . $this->year;
        }

        if($this->score != 'NULL'){
            if($req != ''){
                $req = $req . ', ';
            }
            $req = $req . 'score = ' . $this->score;
        }

        return $req;
    }

    public function updateMovie(){

        $req = $this->constructParamUpdate();

        $db = new DB();
        $db->query('UPDATE film SET '
            . $req
            . ' WHERE id = '  . $this->id . ';'
        );

        $db->execute();

        return $this->showAddUpdateMovie();
    }

    public function showDeleteMovie(){
        if (!empty($_POST)){
            $this->success = "SUCCESS";
        }

        return [
            'delete',
            [
                'success' => $this->success
            ]
        ];
    }

    public function deleteMovie(){

        $this->checkParam();

        $db = new DB();
        $db->query('DELETE FROM film WHERE id = ' . $this->id);
        $db->execute();

        return $this->showDeleteMovie();
    }

    public function showSearchMovie(){
        return [
            'search',
            [
                'title' => 'Rechercher un film',
                'text' => 'Rechercher un film avec les différents filtres proposés',
                'films' => null
            ]
        ];
    }




    public function other(){
        echo "hehe";
    }


}