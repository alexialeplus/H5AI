<?php
/**
 * Created by PhpStorm.
 * User: Alexi
 * Date: 05/02/2018
 * Time: 15:11
 */

class Autoloader
{

    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($classe)
    {
        require '../classes/' . $classe . '.php';
    }
}