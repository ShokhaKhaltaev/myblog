<?php 
	session_start();
	include('connection/connect.php');

	$login = $_POST['login'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
	$check_user = mysqli_query($connection, $sql);
	$user = mysqli_fetch_assoc($check_user);
	if(mysqli_num_rows($check_user) >= 1){
		$_SESSION['login'] = $login;
		$_SESSION['id'] = $user['id'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['name'] = $user['name'];
		$_SESSION['password'] = $user['password'];
		$_SESSION['image'] = $user['image'];
		header('Location: index.php');}
	else{
		header('Location: signup.php');
	}

?>