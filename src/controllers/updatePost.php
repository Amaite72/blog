<?php
// src/controllers/post.php

require_once('src/model/post.php');

function updatePost($id, $data)
{
	$postUpdate = new \Model\Post(getPdo());
	$post = $postUpdate->getPost($id);
    
    if($data != []){

        $title = h($data["title"]);
        $content = h($data["content"]);

        $image = uploadControl($_FILES);
        $newPost = $postUpdate->updatePost($id, $image, $title, $content); 
        header('Location: /index.php?action=post&id=' . $id);
    }
    
	
	require('templates/updatePost.php');
}

/* <?php
// src/controllers/post.php

require_once('src/model/post.php');

function updatePost($id, $data)
{
	$postUpdate = new \Model\Post(getPdo());
	$post = $postUpdate->getPost($id);
    

        $title = h($data["title"]);
        $content = h($data["content"]);

        $image = uploadControl($_FILES);
        $newPost = $postUpdate->updatePost($id, $image, $title, $content); 
    
	require('templates/updatePost.php');
} */