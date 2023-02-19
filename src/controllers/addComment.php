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

		throw new Exception('Les données du formulaire sont invalides.');

	}

	$comment = \Model\createComment($id, $author, $comment);

	if (!$comment) {

		throw new Exception('Impossible d\'ajouter le commentaire !');

	}else {

    	header('Location: /index.php?action=post&id=' . $id);
	}
	
}

