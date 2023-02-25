<?php
// src/controllers/post.php


require_once('src/model/comment.php');
require_once('src/model/post.php');

function post(string $id)
{
	$post = new \Model\Post(getPdo());
	$article = $post->getPost($id);
	$comments = new \Model\Comment($id,getPdo());
	$getComments = $comments->getComments();
	
	require('templates/post.php');
}


