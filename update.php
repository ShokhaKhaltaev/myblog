<?php

	include('connection/connect.php');

	$id = $_POST['id'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$blog = $_POST['blog'];
	//$created_at = $_POST['created_at'];

	$sql = " UPDATE blog SET title = '$title', description = '$description', blog = '$blog' WHERE id = '$id' ";
	
	if(mysqli_query($connection, $sql)){
		header('Location: index.php');
	}
	else{
		echo 'query error: ' . mysqli_error($connection);
	}


?>