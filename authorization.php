<?php 
	session_start();
	include('connection/connect.php');

	$login = $_POST['login'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
	$check_user = mysqli_query($connection, $sql);
	if(mysqli_num_rows($check_user) >= 1){
		$_SESSION['login'] = $login;
		header('Location: index.php');}
	else{
		header('Location: signup.php');
	}

	?>