<?php

require_once('src/model/user.php');

function createUser(array $input) {

	if(!empty($input['lname']) || !empty($input['fname']) || !empty($input['username']) || !empty($input['email']) || !empty($input['password'])) {
		
    	$lname = (h(trim($input['lname'])));;
    	$fname = (h(trim($input['fname'])));
		$username = (h(trim($input['username'])));
		$email = (h(trim($input['email'])));
		$pswd = (h(trim($input['password'])));
		$pswdConfirm = (h(trim($input['passwordConfirm'])));
		if($pswd === $pswdConfirm){
			$password = password_hash($pswd, PASSWORD_DEFAULT);
			}else{
				throw new Exception('Les mots de passe ne correspondent pas.');
		}
		
	}else {

		throw new Exception('Veuillez remplir correctement le formulaire.');

	}
	
	if(mb_strlen($pswd) > 8){

		$user = new \Model\User(getPdo());
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


