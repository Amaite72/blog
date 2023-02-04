<?php

// Nouvelle fonction qui nous permet d'éviter de répéter du code
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

function getPosts(){

   $database = dbConnect();
        // We retrieve the 5 last blog posts.
        $statement = $database->query('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") 
                                      AS creation_date_fr 
                                      FROM posts 
                                      ORDER BY creation_date 
                                      DESC LIMIT 0, 5');

        $posts = [];

        while ($row = $statement->fetch())
            {
               $post = [
                    'title' => $row['title'],
                    'content' => $row['content'],
                    'frenchCreationDate' => $row['creation_date_fr'],
                    'id' => $row['id'],
               ];

               $posts[] = $post;
            } 

            return $posts;

}



function getPost($id){

   $database = dbConnect();

   $statement = $database->prepare("SELECT id, title, content, 
                                     DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') 
                                     AS french_creation_date 
                                     FROM posts 
                                     WHERE id = ?"
                                    );

        $statement->execute([$id]);
        
        $row = $statement->fetch();
            $post = [
                'title' => $row['title'],
                'french_creation_date' => $row['french_creation_date'],
                'content' => $row['content'],
                'id' => $row['id'],
            ];
     
        return $post;
   
}





