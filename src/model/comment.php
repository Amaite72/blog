<?php

namespace Model;

class Comment{

   public string $id;

   public function __construct($id){

      $this->id = $id;

   } 
   
   public function getComments(){

      $database = dbConnect();
      
      $statement = $database->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") 
                                         AS french_creation_date 
                                         FROM comments 
                                         WHERE post_id = ?
                                         ORDER BY comment_date DESC
                                         ');

      $statement->execute([$this->id]);
      
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

     

}

function createComment(string $id, string $author, string $comment)
   {
   
      $database = dbConnect();
      
      $statement = $database->prepare('INSERT INTO comments(post_id, author, comment, comment_date)
                                           VALUES(?, ?, ?, NOW())');
           
           $affectedLines = $statement->execute([$id, $author, $comment]);
            var_dump($affectedLines);
           return($affectedLines > 0);
   
   } 