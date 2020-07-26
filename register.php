
<!DOCTYPE html>
<html>
	<?php include('templates/header.php'); ?>	
<head>
	<style type="text/css">
		body{
			background-image: url(image/wallpaper3.jpg);
			background-size: cover;
		}
		label{
			font-weight: bold;
		}
	</style>
</head>
	
	<div class="container center">
		<h4 class="center white-text">Log in</h4>
		<form action="authorization.php" method="POST" class="sform">
			<label class="white-text">Login</label>
			<input type="text" name="login" class="white-text">
			<label class="white-text">Password</label>
			<input type="password" name="password" class="white-text">
			<div class="container">
				<input type="submit" name="submit" value="Login" class="btn cyan z-depth-0"></div>
			<p class="white-text"><b>Don't have an account - <a href="signup.php">Sign up</b></a></p>
		</form>
	</div>

	<?php include('templates/footer.php'); ?>

</html>

