<?php

namespace Model;

class Post{
    
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    function getPost($id){
     
        $statement = $this->pdo->prepare("SELECT id, `image`, title, content, 
                                          DATE_FORMAT(creation_date, '%d %m %Y,@ %H:%i') 
                                          AS french_creation_date 
                                          FROM posts 
                                          WHERE id = ?"
                                         );
     
             $statement->execute([$id]);
             
             $row = $statement->fetch();
                 $post = [
                     'image' => $row['image'],
                     'title' => $row['title'],
                     'french_creation_date' => $row['french_creation_date'],
                     'content' => $row['content'],
                     'id' => $row['id'],
                 ];
          
             return $post;
        
    } 

    function getPosts(){
       
             // We retrieve the 5 last blog posts.
             //the @ of the SQL DATE_FORMAT is for the function on the homepage to cut string for get the date format
             $statement = $this->pdo->query('SELECT id, `image`, title, content, DATE_FORMAT(creation_date, "%d %m %Y,@ %H:%i") 
                                           AS creation_date_fr 
                                           FROM posts 
                                           ORDER BY creation_date 
                                           DESC LIMIT 0, 9');
     
             $posts = [];
             while ($row = $statement->fetch())
                 {
                    $post = [
                         'image' => $row['image'],
                         'title' => $row['title'],
                         'content' => $row['content'],
                         'frenchCreationDate' => $row['creation_date_fr'],
                         'id' => $row['id'],
                    ];
     
                    $posts[] = $post;
                 } 
     
                 return $posts;
     
     }

    public function createPost(string $image, string $title, string $content)
    {
   
        $statement = $this->pdo->prepare('INSERT INTO posts(`image`, title, content, creation_date)
                                        VALUES(?, ?, ?, NOW())');

        $statement->execute([$image, $title, $content]);
    }

    public function updatePost(string $id, array $post)
    {
        $image = $post['image'];
        $title = $post['title'];
        $content = $post['content'];

        $statement = $this->pdo->prepare('UPDATE posts SET `image` = ?,`title` = ?, `content` = ?, `creation_date` = NOW() WHERE id = ?');
        $statement->execute([$image, $title, $content, $id]);
    }

    public function deletePost(string $id)
    {  
        $statement = $this->pdo->prepare('DELETE FROM posts WHERE id = ?');

        $statement->execute([$id]);
    }

}

