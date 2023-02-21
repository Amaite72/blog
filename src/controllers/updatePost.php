<?php
// src/controllers/post.php

require_once('src/model/post.php');

function updatePost($id,$data)
{
	$post = new \Model\Post(getPdo());
	$post->getPost($id);
    if(isset($data)){
        $post->updatePost($id, $data);
    }
	
	require('templates/updatePost.php');
}