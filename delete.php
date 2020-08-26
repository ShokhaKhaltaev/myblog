<?php 
session_start();
include('connection/connect.php');

if(isset($_GET['id'])){
	$id_delete = mysqli_real_escape_string($connection, $_GET['id']);
	$sqlDelete = "DELETE FROM blog WHERE id = $id_delete";
	$resultDelete = mysqli_query($connection, $sqlDelete);
}
if($resultDelete){
	header('Location: index.php');
}
else{
	echo 'query error: ' . mysqli_error($connection);
}

?>