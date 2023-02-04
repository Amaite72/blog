<?php
//routeur
require_once('src/controllers/homepage.php');
require_once('src/controllers/post.php');
require_once('src/controllers/add_Comment.php');

if (isset($_GET['action']) && $_GET['action'] !== '') {

	if ($_GET['action'] === 'post') {

    	if (isset($_GET['id']) && $_GET['id'] > 0) {

        	$id = $_GET['id'];

        	post($id);
            
    	} else {

        	echo 'Erreur : aucun identifiant de billet envoyé';

        	die;
    	}
    //j'appelle le contrôleur addComment
	}else if($_GET['action'] === 'addComment'){
        //je teste si on a bien un ID de billet
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            
        	$id = $_GET['id'];

        	addComment($id, $_POST);

    	} else {

        	echo 'Erreur : aucun identifiant de billet envoyé';

        	die;
    	}
    }
     else {
    	echo "Erreur 404 : la page que vous recherchez n'existe pas.";
	}
}else {

	homepage();
}



