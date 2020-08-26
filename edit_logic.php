<?php 
    session_start();
    include('connection/connect.php');
    
    if(isset($_POST['signup_1'])){
        
        $id_edit = $_POST['id'];
        $name_edit = $_POST['fname_1'];
        $login_edit = $_POST['login_1'];
        $email_edit = $_POST['email_1'];
        
        

	    $sql_new = "UPDATE users SET name = '$name_edit' , login = '$login_edit' , email = '$email_edit' WHERE id = '$id_edit' ";
    
	    if(mysqli_query($connection, $sql_new)){
	        $_SESSION['name'] = $name_edit;
            $_SESSION['login'] = $login_edit;
            $_SESSION['email'] = $email_edit;
		    header('Location: index.php');
	    }
	    else{
		    echo 'query error: ' . mysqli_error($connection);
	    }
    }
	
	
?>