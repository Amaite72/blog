<?php

require_once('src/model.php');
require_once('src/model/user.php');

function createUser(array $input) {

	if(!empty($input['lname']) || !empty($input['fname']) || !empty($input['username']) || !empty($input['email']) || !empty($input['password'])) {
		
    	$lname = (htmlentities(trim($input['lname'])));;
    	$fname = (htmlentities(trim($input['fname'])));
		$username = (htmlentities(trim($input['username'])));
		$email = (htmlentities(trim($input['email'])));
		$pswd = (htmlentities(trim($input['password'])));
		$pswdConfirm = (htmlentities(trim($input['passwordConfirm'])));
		if($pswd === $pswdConfirm){
			$password = password_hash($pswd, PASSWORD_DEFAULT);
			}else{
				throw new Exception('Les mots de passe ne correspondent pas.');
		}
		
	}else {

		throw new Exception('Veuillez remplir correctement le formulaire.');

	}
	
	if(mb_strlen($pswd) > 8){

		$user = new \Model\User();
        $user->addUser($lname, $fname, $username, $email, $password);
	
    }else{

		throw new Exception('Votre mot de passe doit avoir plus de 8 caractères');
	
	}	
	if ($user) {

		homepage();

	}else {

    	throw new Exception('Impossible d\'ajouter l\'utilisateur!');
	}

}


