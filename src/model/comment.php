<?php

// Nouvelle fonction qui nous permet d'éviter de répéter du code
function commentDbConnect()
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

function getComments($id){
   
   $database = commentDbConnect();

   $statement = $database->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") 
                                      AS french_creation_date 
                                      FROM comments 
                                      WHERE post_id = ?
                                      ORDER BY comment_date DESC
                                      ');

   $statement->execute([$id]);

   $comments = [];

    while (($row = $statement->fetch())) {

        $comment = [
            'author' => $row['author'],
            'french_creation_date' => $row['french_creation_date'], 
            'comment' => $row['comment'],
        ];

        $comments[] = $comment;
    }

   return $comments;
}  


function createComment(string $id, string $author, string $comment)
{

   $database = commentDbConnect();
   
   $statement = $database->prepare('INSERT INTO comments(post_id, author, comment, comment_date)
                                        VALUES(?, ?, ?, NOW())');
        
        $affectedLines = $statement->execute([$id, $author, $comment]);

        return($affectedLines > 0);

} 

