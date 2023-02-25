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

function uploadControl($data){

    if(isset($data['image'])){
        $name = $data['image']['name'];
        $type = $data['image']['type'];
        $tmp_name = $data['image']['tmp_name'];
        $error = $data['image']['error'];
        $size = $data['image']['size'];
        
        $tabExtension = explode('.',$name);
        $extension = strtolower(end($tabExtension));

        $extensionAllowed = ["jpeg","png","gif","jpg"];
        $maxSize = 4000000;

        if(in_array($extension,$extensionAllowed) && $size <= $maxSize && $error === 0){

            $singleName = uniqid('',true);
            $newName = $singleName.'.'.$extension;
            
            move_uploaded_file($tmp_name, 'upload/'.$newName);
            return $newName;
        }else{
            echo "fichier non pris en charge ou taille trop importante du fichier ou il y a une erreur de fichier!";
            return $name;
        }
        
        
    }
} 


/* function success(){

} */