<?php

require_once('src/model/comment.php');

function addComment($id, array $input)
{
	$author = NULL;
	$comment = NULL;

	if (!empty($input['author']) && !empty($input['comment'])) {

    	$author = (htmlentities(trim($input['author'])));;
    	$comment = (htmlentities(trim($input['comment'])));

	}else {

    	die('Les données du formulaire sont invalides.');

	}

	$success = createComment($id, $author, $comment);

	if (!$success) {

    	die('Impossible d\'ajouter le commentaire !');

	}else {

    	header('Location: /index.php?action=post&id=' . $id);
	}
	
}

