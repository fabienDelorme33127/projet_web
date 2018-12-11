<?php
/**
 * Created by PhpStorm.
 * User: Zouif
 * Date: 23-Aug-18
 * Time: 10:40 AM
 */

namespace App\Entity;

class Sauvegarde
{

    private $id_sauvegarde;
    private $id_heroes;
    private $id_histoire;
    private $id_detail_histoire;
    private $id_personnage;

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
    public function getIdSauvegarde()
    {
        return $this->id_sauvegarde;
    }

    /**
     * @param mixed $id_sauvegarde
     */
    public function setIdSauvegarde($id_sauvegarde)
    {
        $this->id_sauvegarde = $id_sauvegarde;
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
    public function getIdDetailHistoire()
    {
        return $this->id_detail_histoire;
    }

    /**
     * @param mixed $id_detail_histoire
     */
    public function setIdDetailHistoire($id_detail_histoire)
    {
        $this->id_detail_histoire = $id_detail_histoire;
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