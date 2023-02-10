<?php

class Comment{

    public string $author;
    public string $comment;

    public function __construct(string $author, string $comment){

        $this->author = $author;
        $this->comment = $comment;
    }
    public function presenter(){

        echo "<p>je m'appel ".$this->author." et comme commentaire j'ai mis ".$this->comment."</p>";

    }

}

$comment = new Comment("amaite","woaw super");
$comment1 = new Comment("lilian","genial"); 

$comment->presenter(); 
$comment1->presenter();