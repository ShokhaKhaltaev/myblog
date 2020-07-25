<?php 

	include('connection/connect.php');
	
	if(isset($_POST['comment'])){
		$name = $_POST['commentname'];
		$comment = $_POST['commenttext'];

		$name = mysqli_real_escape_string($connection, $name);
		$comment = mysqli_real_escape_string($connection, $comment);
		$sql = "INSERT INTO comment(name, comment) VALUES('$name', '$comment')";
		if(mysqli_query($connection, $sql)){
			header('Location: detail.php');
		}
		else{
			echo "query error". mysqli_error($connection);
		}

	}



?>