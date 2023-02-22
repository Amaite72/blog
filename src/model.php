<?php
require('connectDb.php');

function getPosts(){

   $database = dbConnect();
        // We retrieve the 5 last blog posts.
        //the @ of the SQL DATE_FORMAT is for the function on the homepage to cut string for get the date format
        $statement = $database->query('SELECT id, `image`, title, content, DATE_FORMAT(creation_date, "%d %m %Y,@ %H:%i") 
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







