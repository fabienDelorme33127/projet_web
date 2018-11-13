<?php
/**
 * Created by PhpStorm.
 * User: Zouif
 * Date: 23-Aug-18
 * Time: 11:46 AM
 */
//header('Content-type: text/plain; charset=utf-8;');
session_start();
setlocale(LC_ALL, 'fra');
define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PWD', '');
define('MYSQL_DB', 'SelfHeros');

function autoload($class){
    require 'class/' . str_replace('\\', '/', $class . '.php');
}

spl_autoload_register('autoload');