<?php
/**
 * Created by PhpStorm.
 * User: Zouif
 * Date: 23-Aug-18
 * Time: 4:26 PM
 */

namespace App;

use App\Net\HTTPRequest;

class Route{

    private $method;
    private $uri; //unique ressource identifiant
    private $parameters;
    private $controller;
    private $action;

    /**
     * Route constructor.
     * @param $method
     * @param $uri
     * @param $parameters
     * @param $controller
     * @param $action
     */
    public function __construct($method, $uri, $controller, $action)
    {
        $this->method = $method;
        $this->uri = trim($uri, '/');
        $this->parameters = $this->parseUri($uri);
        $this->controller = $controller;
        $this->action = $action;
    }

    private function parseUri() {
        $params = [];
        $parts = explode('/', $this->uri);
        foreach ($parts as $part) {
            if (substr($part, 0, 1) !== '{') continue;
            $part = str_replace(['{', '}'], '', $part);
            list($name, $reg) = explode(':', $part);
            $params[$name] = $reg;
        }
        return $params;
    }

    public function match(HTTPRequest $req) {
        if (strtolower($this->method) !== strtolower($req->method()))
            return false;
        $pattern = $this->getUriPatternMatcher();
        if (empty($pattern) && empty($req->uri())) {
            return true;
        } else if (!empty($pattern)) {
            $pattern = '/^'. $pattern . '$/';
            preg_match($pattern, $req->uri(), $match);
            if (count($match) > 0) {
                foreach ($match as $k => $v) {
                    if (!is_int($k)) {
                        $_GET[$k] = $match[$k];
                    }
                }
                return true;
            }
        }
        return false;
    }

    private function getUriPatternMatcher() {
        $parts = explode('/', $this->uri);
        foreach ($parts as &$part) {
            if (substr($part, 0, 1) !== '{') continue;
            $part = str_replace(['{', '}'], '', $part);
            $name = substr($part, 0, strpos($part, ':'));
            $part = '(?<' . $name . '>' . $this->parameters[$name] . ')';
        }
        return implode('\/', $parts);
    }


    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param mixed $uri
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
    }

    /**
     * @return null
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param null $parameters
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

}

class Router
{
    private static $routes = [];


    public static function addRoute($route){
        self::$routes[] = $route;
    }

    public static function getController($request) {
        foreach(self::$routes as $route){
            if($route->match($request)){
                return [$route->getController(), $route->getAction()];
            }
        }
    }


}