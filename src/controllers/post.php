<?php
// src/controllers/post.php

require_once('src/model.php');
require_once('src/model/comment.php');

function post(string $id)
{
	
	$post = getPost($id);
	$comments = new Comment($id);
	$comments->getComments();
	

	require('templates/post.php');
}


