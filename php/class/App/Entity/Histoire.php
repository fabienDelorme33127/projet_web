<?php
/**
 * Created by PhpStorm.
 * User: Zouif
 * Date: 23-Aug-18
 * Time: 10:40 AM
 */

namespace App\Entity;

class Histoire
{

    private $id_histoire;
    private $titre;
    private $auteur;
    private $description;

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
    public function getIdHistoire()
    {
        return $this->id_histoire;
    }

    /**
     * @param mixed $id
     */
    public function setId_histoire($id_histoire)
    {
        $this->id = $id_histoire;
    }

    /**
     * @return mixed
     */
    public function gettitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function settitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getauteur()
    {
        return $this->auteur;
    }

    /**
     * @param mixed $auteur
     */
    public function setauteur($auteur)
    {
        $this->auteur = $auteur;
    }

    /**
     * @return mixed
     */
    public function getdescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setdescription($description)
    {
        $this->description = $description;
    }

    public function afficher(){
        $titre = $this->gettitre();
        $auteur = $this->getauteur();
        echo "<b>$titre</b>";
        echo "auteur : $auteur";
    }

    public function __toString()
    {
        return '<b>' . $this->gettitre() . '</b> {' . $this->getauteur() . '}';
    }

}