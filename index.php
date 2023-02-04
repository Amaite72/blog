<?php
//router
require_once('src/controllers/homepage.php');
require_once('src/controllers/post.php');
require_once('src/controllers/add_Comment.php');

// add a exception
try{

	if (isset($_GET['action']) && $_GET['action'] !== '') {

		if ($_GET['action'] === 'post') {

	    	if (isset($_GET['id']) && $_GET['id'] > 0) {

	        	$id = $_GET['id'];

	        	post($id);
			
	    	} else {

	        	throw new Exception('Aucun identifiant de billet envoyé');

	        	die;
	    	}
	    //Call the controller addComment
		}else if($_GET['action'] === 'addComment'){
	        //I try to watch if the id is in the url
	        if (isset($_GET['id']) && $_GET['id'] > 0) {
			
	        	$id = $_GET['id'];

	        	addComment($id, $_POST);

	    	} else {

				throw new Exception('Aucun identifiant de billet envoyé');

	        	die;
	    	}
	    }
	     else {

			throw new Exception("Erreur 404 : la page que vous recherchez n'existe pas.");
		}
	}else {

		homepage();
	}

} catch (Exception $e) { // if error get message

	$errorMessage = $e->getMessage();

	require('templates/error.php');
}

