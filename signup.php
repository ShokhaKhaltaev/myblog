<?php 

	include('connection/connect.php');
	$errors = array('fname' => '' , 'login' => '', 'email' => '', 'password' => '', 'cpassword' => '');
	$taken = '';

	if(isset($_POST['signup'])){
		$fname = $_POST['fname'];
		$login = $_POST['login'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$cpassword = md5($_POST['cpassword']);
		$target_photo = "image/".basename($_FILES['image']['name']);
		$image_name = $_FILES['image']['name'];
		
		if(empty($fname)){
			$errors['fname'] = "Full name is required";
		}
		else{
			if(!preg_match('/^[a-zA-Z\s]+$/', $fname)){
				$errors['fname'] = "Not valid format of name";
			}
		}

		if(empty($login)){
			$errors['login'] = "Login is required";
		}
		if(empty($email)){
			$errors['email'] = "Email is required";
		}
		else{
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = "Not valid form of email";
			}
		}

		if(empty($password)){
			$errors['password']= "Password is required";
		}
		if(empty($cpassword)){
			$errors['cpassword'] = "Confirm your password";
		}
		if($password != $cpassword){
			$errors['cpassword'] = "Two passwords do not match";
		}

		if(!array_filter($errors)){
			$select = "SELECT * FROM users WHERE login = '$login'";
			$get = mysqli_query($connection,$select);
			$num = mysqli_num_rows($get);
			
			

    		if($num == 1){
    			$taken = "Username Already taken";
			}
			else{
				if($password === $cpassword){
					$sql = "INSERT INTO users (name, login, email, password, image) VALUES ('$fname', '$login', '$email', '$password', '$image_name')";
					$result = mysqli_query($connection, $sql);
					if($result){
					    if(move_uploaded_file($_FILES['image']['tmp_name'], $target_photo)){
					        $msg = "Image uploaded successfully";
					        header('Location: register.php');
				        }
				        else{
					        $msg = "There was a big problem in uploading file";
					        
				        }
					}    
				    else{
					    header('Location: signup.php');
				    }
			    }
		    }
		
		
	    }
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<style>
			body{
				background-image: url(image/wallpaper5.jpg);
				background-size: cover;
			}
			@media only screen and (max-width: 600px){
			    body{
				background-image: url(image/wallpaper5.jpg);
				background-size: cover;
			}
		</style>
	</head>
	<?php include('templates/header.php'); ?>
	<div class="container center">
		<h4 class="center indigo-text">Sign up</h4>
		<div class="red-text "><?php echo $taken; ?></div>
		<form action="signup.php" method="POST" class='sform' enctype="multipart/form-data">
			<label class="black-text">Full name</label>
			<input type="text" name="fname">
			<div class="red-text"><?php echo $errors['fname']; ?></div>
			<label class="black-text">Login</label>
			<input type="text" name="login">
			<div class="red-text"><?php echo $errors['login']; ?></div>
			<label class="black-text">Email</label>
			<input type="email" name="email">
			<div class="red-text"><?php echo $errors['email']; ?></div>
			<label class="black-text">Password</label>
			<input type="password" name="password">
			<div class="red-text"><?php echo $errors['password']; ?></div>
			<label class="black-text">Confirm password</label>
			<input type="password" name="cpassword">
			<div class="red-text"><?php echo $errors['cpassword']; ?></div>
			<input type="hidden" name="size" value="1000000">
			<p class="orange-text">Upload your image(Optional)</p>
			<input type="file" name="image" value="Uplaod an image">
			<div class="center">
			<p>Already signed in - <a href="register.php">Login</a></p>
			<input type="submit" name="signup" value="Sign up" class="btn cyan z-depth-0"></div>

		</form>
	</div>

	<?php include('templates/footer.php'); ?>
</html>
