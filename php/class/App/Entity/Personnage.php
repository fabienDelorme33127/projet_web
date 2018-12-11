<?php
/**
 * Created by PhpStorm.
 * User: Zouif
 * Date: 23-Aug-18
 * Time: 10:40 AM
 */

namespace App\Entity;

class Personnage
{

    private $id_personnage;
    private $id_histoire;
    private $id_heroes;
    private $nom_personnage;
    private $race_personnage;
    private $lore_personnage;

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
    public function getIdPersonnage()
    {
        return $this->id_personnage;
    }

    /**
     * @param mixed $id_personnage
     */
    public function setIdPersonnage($id_personnage)
    {
        $this->id_personnage = $id_personnage;
    }

    /**
     * @return mixed
     */
    public function getIdHistoire()
    {
        return $this->id_histoire;
    }

    /**
     * @param mixed $id_histoire
     */
    public function setIdHistoire($id_histoire)
    {
        $this->id_histoire = $id_histoire;
    }

    /**
     * @return mixed
     */
    public function getIdHeroes()
    {
        return $this->id_heroes;
    }

    /**
     * @param mixed $id_heroes
     */
    public function setIdHeroes($id_heroes)
    {
        $this->id_heroes = $id_heroes;
    }

    /**
     * @return mixed
     */
    public function getNomPersonnage()
    {
        return $this->nom_personnage;
    }

    /**
     * @param mixed $nom_personnage
     */
    public function setNomPersonnage($nom_personnage)
    {
        $this->nom_personnage = $nom_personnage;
    }

    /**
     * @return mixed
     */
    public function getRacePersonnage()
    {
        return $this->race_personnage;
    }

    /**
     * @param mixed $race_personnage
     */
    public function setRacePersonnage($race_personnage)
    {
        $this->race_personnage = $race_personnage;
    }

    /**
     * @return mixed
     */
    public function getLorePersonnage()
    {
        return $this->lore_personnage;
    }

    /**
     * @param mixed $lore_personnage
     */
    public function setLorePersonnage($lore_personnage)
    {
        $this->lore_personnage = $lore_personnage;
    }

//    public function afficher(){
//        $login = $this->getLogin();
//        $password = $this->getPassword();
//        echo "<b>$login</b>";
//        echo "Password : $password";
//    }

    public function __toString()
    {
        return '<b>' . $this->getLogin() . '</b> {' . $this->getPassword() . '}';
    }

}