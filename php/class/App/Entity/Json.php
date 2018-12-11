<?php
/**
 * Created by PhpStorm.
 * User: Zouif
 * Date: 23-Aug-18
 * Time: 10:40 AM
 */

namespace App\Entity;

class Json
{

    private $numero_page;
    private $contenue;

    /**
     * @return mixed
     */
    public function getNumeroPage()
    {
        return $this->numero_page;
    }

    /**
     * @param mixed $numeroPage
     */
    public function setNumeroPage($numero_page)
    {
        $this->numero_page = $numero_page;
    }

    /**
     * @return mixed
     */
    public function getContenue()
    {
        return $this->contenue;
    }

    /**
     * @param mixed $contenue
     */
    public function setContenue($contenue)
    {
        $this->contenue = $contenue;
    }



    /**
     * Movie.class constructor.
     * @param $titre
     * @param $annee
     */
    public function __construct()
    {
    }

    public function afficher(){
//        $login = $this->getContenue();
//        $password = $this->getPassword();
//        echo "<b>$login</b>";
//        echo "Password : $password";
    }

    public function __toString()
    {
        return '<b>' . $this->getNumeroPage() . '</b> {' . $this->getContenue() . '}';
    }

    public function toDejson(){

        $json = $this->getContenue();
        return json_decode($json);
    }

}