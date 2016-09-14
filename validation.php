<?php
require('config/config.php');
require('model/functions.fn.php');
session_start();

if(	isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && 
	!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
	
	$email = htmlspecialchars($_POST["email"]);
  	$password = htmlspecialchars($_POST["password"]);

	userConnection($db, $email, $password);
	if (userConnection($db, $email, $password) == true) {
		header('Location: dashboard.php');
	}
 	else{
		$error = "Mauvais identifiants";
	}

}else {
	$_SESSION['message'] = 'Erreur : Formulaire incomplet';
	header('Location: register.php');
}

else{
	$error = 'Champs requis !';
}