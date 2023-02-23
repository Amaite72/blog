<?php
// src/controllers/post.php

require_once('src/model/post.php');

function updatePost($id, $data)
{
    var_dump($data);
	$postUpdate = new \Model\Post(getPdo());
	$post = $postUpdate->getPost($id);



    if($data != []){
        $image = $data["image"];
        $title = $data["title"];
        $content = $data["content"];

        $newPost = $postUpdate->updatePost($id, $image, $title, $content);
    }
    
    
    /* $newPost = $postUpdate->updatePost($id, $image, $title, $content); */
    
	
	require('templates/updatePost.php');
}