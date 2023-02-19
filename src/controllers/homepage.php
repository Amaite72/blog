<?php
// src/controllers/homepage.php

require_once('src/model.php');
require_once('src/model/post.php');

function homepage() {

	$posts = getPosts();

	function separateDate($date){
		$cutTolimit = '@';
		$newDate = substr($date, 0, strpos($date,$cutTolimit)); 
		return $newDate;
	}
	
	function separateTime($time){
		$cutTolimit = '@';
		$newTime = substr($time, 12, strpos($time,$cutTolimit)); 
		return $newTime;
	}
	require('templates/homepage.php');
}