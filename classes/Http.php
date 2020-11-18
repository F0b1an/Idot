<?php

Class Http
{

    // define webroot
    public static $webroot = '';


    public static function boot()
    {
        // check the url
        if($_SERVER['HTTP_HOST'] == 'localhost' && strpos($_SERVER['REQUEST_URI'], '/public/')) {
            $urlParts = explode('/public/', $_SERVER['REQUEST_URI']);

            self::$webroot = self::httpOrHttps().$_SERVER['HTTP_HOST'].$urlParts[0].'/public/';
        }
        else {
            self::$webroot = self::httpOrHttps().$_SERVER['HTTP_HOST'];
        }
    }

    // set webroot
    public static function webroot()
    {
        return self::$webroot;
    }

    // check for http or https
    private static function httpOrHttps()
    {
        if(isset($_SERVER['HTTPS'])) {
            return 'https://';
        }
        return 'http://';
    }

}