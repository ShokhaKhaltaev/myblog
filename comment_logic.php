<?php 
	
	include('connection/connect.php');

	if(isset($_POST['comment_button'])){
		$com_name = $_POST['com_name'];
		$com_content = $_POST['com_content'];

		$com_name = mysqli_real_escape_string($connection, $com_name);
		$com_content = mysqli_real_escape_string($connection, $com_content);

		$sql_com = "INSERT INTO comment(name, comment) VALUES('$com_name','$com_content') ";
		$result_com = mysqli_query($connection,$sql_com);
		if($result_com){
			header('Location: comment.php');
		}
		else{
			echo 'query error' . mysqli_error($connection);
		}
	}
?>