<?php
require('config/config.php');
require('model/functions.fn.php');
session_start();

if(	isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && 
	!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {

   
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    if((isUsernameAvailable($db, $username)==true) && (isEmailAvailable($db, $email)==true)){
    userRegistration( $db, $username, $email, $password);
		header('Location: dashboard.php');

    }

    elseif((isUsernameAvailable($db, $username)==true) && (isEmailAvailable($db, $email)==false)){
        $_SESSION["message"] = 'Erreur: email indisponible';
        header('Location: register.php');
        //Code qui previent que l'email est déja utilisé//
    }

    elseif((isUsernameAvailable($db, $username)==false) && (isEmailAvailable($db, $email)==true)){
        $_SESSION["message"] = 'Erreur: username indisponible';
        header('Location: register.php');
        //Code qui previent que l'username' est déja utilisé//
    }
    elseif((isUsernameAvailable($db, $username)==false) && (isEmailAvailable($db, $email)==false)){
        $_SESSION["message"] = 'Erreur: username et email indisponible';
        header('Location: register.php');
        //Code qui previent que l'email et l'username sont déja utilisés//
    }


    else{
        echo" Error : this member already exists";
        header('Location: register.php');

    };


}


	else{
	$_SESSION['message'] = 'Erreur : Formulaire incomplet';
	header('Location: register.php');

}
?>

