<?php
/**
 * Created by PhpStorm.
 * User: Zouif
 * Date: 23-Aug-18
 * Time: 10:40 AM
 */

namespace App\Entity;

class Movie
{

    private $id;
    private $id_director;
    private $id_previous;
    private $score;
    private $title;
    private $title_fr;
    private $year;

    /**
     * Movie.class constructor.
     * @param $titre
     * @param $annee
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdDirector()
    {
        return $this->id_director;
    }

    /**
     * @param mixed $id_director
     */
    public function setIdDirector($id_director)
    {
        $this->id_director = $id_director;
    }

    /**
     * @return mixed
     */
    public function getIdPrevious()
    {
        return $this->id_previous;
    }

    /**
     * @param mixed $id_previous
     */
    public function setIdPrevious($id_previous)
    {
        $this->id_previous = $id_previous;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param mixed $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitleFr()
    {
        return $this->title_fr;
    }

    /**
     * @param mixed $title_fr
     */
    public function setTitleFr($title_fr)
    {
        $this->title_fr = $title_fr;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    public function afficher(){
        $titre = $this->getTitre();
        $annee = $this->getAnnee();
        echo "<b>$titre</b>";
        echo "Annee : $annee";
    }

    public function __toString()
    {
        return '<b>' . $this->getTitre() . '</b> {' . $this->getAnnee() . '}';
    }

}