<?php
//router
require_once('src/controllers/homepage.php');
require_once('src/controllers/post.php');
require_once('src/controllers/addComment.php');
require_once('src/controllers/userController.php');
require_once('src/controllers/addPost.php');
require_once('src/controllers/deletePost.php');
require_once('src/controllers/updatePost.php');
require 'src/utilityFunction.php';

$errors = [];

// add a exception
try{
	//check the action in the url 
	if (isset($_GET['action']) && $_GET['action'] !== '') {
		//Call the controller post
		if ($_GET['action'] === 'post') {
			//check if the id is in the url and if the id where bigger than 0
	    	if (isset($_GET['id']) && $_GET['id'] > 0) {
				//assign the id to the valid $id
	        	$id = $_GET['id'];
				//send the id with the function post() on the controller post
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
	    }else if($_GET['action'] === 'addUser'){
			if(isset($_POST)){
				

				createUser($_POST);

			}
		}else if($_GET['action'] === 'addPost'){
			if(isset($_POST)){
				
				addPost($_POST);

			}
		}else if($_GET['action'] === 'updatePost'){
			if(isset($_GET['id']) && $_GET['id'] > 0){

				$id = $_GET['id'];
				updatePost($id, $_POST);

			}
		}else if($_GET['action'] === 'deletePost'){
			if(isset($_GET['id']) && $_GET['id'] > 0){

				if(isset($_POST)){

					$id = $_GET['id'];
					deletePost($id);
	
				}

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

