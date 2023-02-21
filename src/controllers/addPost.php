<?php

require_once('src/model/post.php');

function addPost(array $input)
{
	if (!empty($input['title']) && !empty($input['content']) && !empty($input['image'])) {

		$image = (htmlentities(trim($input['image'])));
    	$title = (htmlentities(trim($input['title'])));
    	$content = (htmlentities(trim($input['content'])));

	}else {

		throw new Exception('Les données du formulaire sont invalides.');

	}
	//Create new post
	$post = new \Model\Post(getPdo());
    $post->createPost($image, $title, $content);

	if (!$post) {

		throw new Exception('Impossible d\'ajouter le post!');

	}else {
		
    	header('Location: /index.php');
		
	}
	
}
