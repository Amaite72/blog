<?php
// src/controllers/homepage.php

require_once('src/model/post.php');

function homepage() {

	$posts = new \Model\Post(getPdo());
	$articles = $posts->getPosts();

	require('templates/homepage.php');
}