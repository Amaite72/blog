<?php

// New function to connect database
function dbConnect()
{
	// Connect database
   try
   {
       $database = new PDO('mysql:host=localhost;dbname=blog_exo;charset=utf8',
       'amaite',
       'Uaherevauiaoe72');

       return $database;
   }
      catch(Exception $e)
         {
            die('Erreur : '.$e->getMessage());
         }
}

