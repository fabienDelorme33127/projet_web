<?php
/**
 * Created by PhpStorm.
 * User: Zouif
 * Date: 23-Aug-18
 * Time: 11:45 AM
 */

namespace App;

use App\Layout;
use App\Net\HTTPRequest;

class Site
{

    private $req;
    private $layout;

    /**
     * Site constructor.
     */
    function __construct()
    {
        $this->layout = new Layout('views/layout.view.php');

        //Le router regarde d'abord l'url puis decide de l'envoyer au controler demandé avec l'a    ction choisi

        //HomeController
        Router::addRoute(new Route('GET', '/', 'Home', 'show'));
        Router::addRoute(new Route('GET', '/signIn', 'Home', 'showSignIn'));
        Router::addRoute(new Route('POST', '/signIn', 'Home', 'checkAuth'));
        Router::addRoute(new Route('GET', '/signUp', 'Home', 'ShowSignUp'));
        Router::addRoute(new Route('POST', '/signUp', 'Home', 'signUp'));

        //CompteController
        Router::addRoute(new Route('GET', '/compte', 'Compte', 'showCompteUser'));
        Router::addRoute(new Route('GET', '/compte/creerHistoire', 'Compte', 'showCreerHistoire'));
        Router::addRoute(new Route('POST', '/compte/creerHistoire', 'Compte', 'creerHistoire'));
//        Router::addRoute(new Route('GET', '/compteAdmin', 'Compte', 'showCompteAdmin'));
        Router::addRoute(new Route('GET', '/compte/listeHistoires', 'Compte', 'showListeHistoires'));
        Router::addRoute(new Route('GET', '/compte/mesHistoires', 'Compte', 'showMesHistoires'));


        Router::addRoute(new Route('GET', '/compte/histoire', 'Histoire', 'showHistoire'));
        Router::addRoute(new Route('GET', '/compte/createPersonnage/histoire', 'Histoire', 'showCreatePersonnage'));
        Router::addRoute(new Route('POST', '/compte/createPersonnage/histoire', 'Histoire', 'createPersonnage'));

        $this->req = new HTTPRequest();
    }

    public function run() {
        list($name, $action) = Router::getController($this->req);
        if (!empty($name) && !empty($action)) {
            $class = 'App\\Controller\\' . $name . 'Controller';
            $ctrl = new $class();
            list($view, $params) = $ctrl->{$action}();
            echo $this->layout->render($view, $params);
        } else {
            echo $this->layout->render('404');
        }
    }
}