<?php

namespace Model;

class Comment{

   public string $id;
   private $pdo;

   public function __construct(string $id, \PDO $pdo){

      $this->id = $id;
      $this->pdo = $pdo;

   } 
   
   public function getComments(){
     
      $statement = $this->pdo->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, "%d %m %Y,@ %H:%i") 
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
   
   function createComment(string $id, string $author, string $comment)
   {
      $statement = $this->pdo->prepare('INSERT INTO comments(post_id, author, comment, comment_date)
                                           VALUES(?, ?, ?, NOW())');
           $affectedLines = $statement->execute([$id, $author, $comment]);
            
           return($affectedLines > 0);  
   } 

}

   
