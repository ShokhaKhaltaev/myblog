<?php
	include('connection/connect.php');

    if(isset($_GET['id'])){
	    $edit_id = $_GET['id'];
	    $sql_profile = "SELECT * FROM users WHERE id= '$edit_id'";
	    $id_profile = mysqli_real_escape_string($connection,$sql_profile);
	    $result  = mysqli_query($connection,$sql_profile);
	    $info_profile = mysqli_fetch_assoc($result);
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
		</style>
	</head>
	<?php include('templates/header.php'); ?>
	<div class="container center">
		<h4 class="center indigo-text">Sign up</h4>
		<form action="edit_logic.php" method="POST">
		    <input type="hidden" name="id" value="<?php echo $info_profile['id']; ?>">
			<label class="black-text">Full name</label>
			<input type="text" name="fname_1" value = "<?php echo htmlspecialchars($info_profile['name']); ?>" >
			<label class="black-text">Login</label>
			<input type="text" name="login_1" value = "<?php echo htmlspecialchars($info_profile['login']);?>" >
			<label class="black-text">Email</label>
			<input type="email" name="email_1" value ="<?php echo htmlspecialchars($info_profile['email']); ?>" >
			<div class="center">
			<input type="submit" name="signup_1" value="Update" class="btn cyan z-depth-0"></div>

		</form>
	</div>

	
	<?php include('templates/footer.php'); ?>
</html>