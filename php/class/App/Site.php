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

        Router::addRoute(new Route('GET', '/', 'Home', 'show'));
        Router::addRoute(new Route('POST', '/', 'Home', 'searchMovie'));
//        Router::addRoute(new Route('GET', '/movie/search', 'Movie', 'showSearchMovie'));
//        Router::addRoute(new Route('POST', '/movie/search', 'Movie', 'searchMovie'));
        Router::addRoute(new Route('GET', '/movie/addUpdate', 'Movie', 'showAddUpdateMovie'));
        Router::addRoute(new Route('POST', '/movie/addUpdate', 'Movie', 'addUpdateMovie'));
        Router::addRoute(new Route('GET', '/movie/delete', 'Movie', 'showDeleteMovie'));
        Router::addRoute(new Route('POST', '/movie/delete', 'Movie', 'deleteMovie'));

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