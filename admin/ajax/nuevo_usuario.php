<?php
	require_once ("../config/db.php");
	require_once ("../config/conexion.php");
	//quitamos los espacios en blanco del inicio y del final
    //echo "<pre>";print_r ($_REQUEST);echo "</pre>";
    $firstname = trim($_POST["firstname"]);
	$lastname = trim($_POST["lastname"]);
    $name= $firstname.' '.$lastname;
	$user_name = trim($_POST["user_name"]);
    $email = trim($_POST["user_email"]);
	$user_password = $_POST['user_password_new'];
	$user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
	$rol='user';
    
    $sql = "INSERT INTO users (name, login, email, password, rol) VALUES('{$name}','{$user_name}','{$email}','{$user_password_hash}','{$rol}');";
    if (mysqli_query($con,$sql)) {
        echo 1;
    } else {
        echo 0;
    }
?>