<?php

require 'classes/Http.php';
require 'classes/Api.php';


Http::boot();

//connect to database
function db()
{
    $host = 'localhost';
    $database = 'idot';
    $username = 'root';
    $password = '';

    try {
        $connection = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    }
    catch(PDOException $e) {
        dd($e->getMessage());
    }
}

//getting asset url
function asset($path)
{
    return Http::webroot().$path;
}

//simple debug function
function dd($text)
{
    if(is_array($text) || is_object($text)) {
        var_dump($text);
        die();
    }
    else {
        die($text);
    }
}
