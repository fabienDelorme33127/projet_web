<?php
/**
 * Created by PhpStorm.
 * User: Zouif
 * Date: 23-Aug-18
 * Time: 10:40 AM
 */

namespace App\Entity;

class User
{

    private $numeroPage;
    private $contenue;
    // TODO - Ajouter un attribut typeCompte => admin ou user (il faut aussi ajouter dans la base)
//    private $mail;

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
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

//    /**
//     * @return mixed
//     */
//    public function getMail()
//    {
//        return $this->mail;
//    }
//
//    /**
//     * @param mixed $mail
//     */
//    public function setMail($mail)
//    {
//        $this->mail = $mail;
//    }

    public function afficher(){
        $login = $this->getLogin();
        $password = $this->getPassword();
        echo "<b>$login</b>";
        echo "Password : $password";
    }

    public function __toString()
    {
        return '<b>' . $this->getLogin() . '</b> {' . $this->getPassword() . '}';
    }

}