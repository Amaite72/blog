<?php

namespace Model;

class Posts{  

    public function createPost(string $image, string $title, string $content)
    {
        $database = dbConnect();
   
        $statement = $database->prepare('INSERT INTO posts(`image`, title, content, creation_date)
                                        VALUES(?, ?, ?, NOW())');

        $statement->execute([$image, $title, $content]);
    }

    public function updatePost(array $post)
    {
        $statement = $this->pdo->prepare('UPDATE posts SET `image` = ?,`title` = ?, `content` = ?, `creation_date` = NOW() WHERE id = ?');
        return $statement->execute([
            $this->image->getImage(),
            $this->title->getTitle(),
            $this->content->getContent(),
            $this->id->getId()
        ]);
    }

}