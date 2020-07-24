<?php	
	$connection = mysqli_connect('localhost', 'shokha', 'neymar11', 'survey');
	if(!$connection){
		echo "Connection error: " . mysqli_connect_error();
	}