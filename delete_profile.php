<?php 
session_start();
include('connection/connect.php');

if(isset($_GET['id'])){
	$idProfile_delete = mysqli_real_escape_string($connection, $_GET['id']);
	$sql_profileDelete = "DELETE FROM users WHERE id = $idProfile_delete";
	$resultDelete_profile = mysqli_query($connection, $sql_profileDelete);
}
if($resultDelete_profile){
    session_unset();
	header('Location: index.php');
}
else{
	echo 'query error: ' . mysqli_error($connection);
}

?>