<?php

require 'vendor/autoload.php';
 
function dd(...$vars)
{
    foreach($vars as $var){
    echo "<pre>";
        print_r($var);
    echo "</pre>";
    }
}

function getPdo():PDO
{
    // Connect database       
    return new PDO('mysql:host=localhost;dbname=blog_exo;charset=utf8','amaite','Uaherevauiaoe72',[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
}

function h(?string $value):string
{
    if($value === null){
        return '';
    }
    return htmlentities($value);
}

function render(string $view, $parameters = [])
{
    extract($parameters);
    include 'Views/'.$view.'.php';
}

/* function success()
{
    extract($parameters);
    include 'Views/'.$view.'.php';
} */

function separateDate($date){
    $cutTolimit = '@';
    $newDate = substr($date, 0, strpos($date,$cutTolimit)); 
    return $newDate;
}

function separateTime($time){
    $cutTolimit = '@';
    $newTime = substr($time, 12, strpos($time,$cutTolimit)); 
    return $newTime;
}

/* function success(){

} */