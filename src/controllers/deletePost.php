<?php
// src/controllers/post.php


require_once('src/model/comment.php');
require_once('src/model/post.php');

function deletePost(string $id)
{
	$deletePost = new \Model\Post(getPdo()); 
	$deletePost->deletePost($id); 
	header('Location: /index.php');
	
	require('templates/post.php');
}
