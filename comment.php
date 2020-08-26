<?php
	include('connection/connect.php');


	$sqlCom = 'SELECT * FROM comment';
	$result = mysqli_query($connection,$sqlCom);

	//mysqli_free_result($result);
	//mysqli_close($connection);
?>

<!DOCTYPE html>
<html>
<head>
	<style>
		body{
				background-image: url(image/wallpaper8.jpg);
				background-size: cover;
			}
		#text-btn{
			margin-top:30px;
			padding: 40px;
		}
		textarea{
			height: 650px;
			width: 190px;

		}
		textarea:focus{
			background: white;
		}
		.fcom{
			height: 300px;
		}
		.ctext{
			width: 620px;
			height: 150px;
			margin-bottom: 20px;
		}
		hr{
			width: 900px;
		}
		li{
			text-align: left;
		}
		input::placeholder{
			color:black;
		}
		textarea::placeholder{
			color: black;
		}
		@media only screen and (max-width: 600px){
		    body{
				background-image: url(image/wallpaper8.jpg);
				background-size: cover;
			}
		#text-btn{
			margin-top:30px;
			padding: 40px;
		}
		textarea{
			height: 650px;
			width: 190px;

		}
		textarea:focus{
			background: white;
		}
		.fcom{
			height: 300px;
		}
		.ctext{
			width: 320px;
			height: 150px;
			margin-bottom: 20px;
		}
		hr{
			width: 400px;
		}
		li{
			text-align: left;
		}
		input::placeholder{
			color:black;
		}
		textarea::placeholder{
			color: black;
		}
		}
	</style>	
</head>
	
	<?php include('templates/header.php'); ?>
	<div class="container center">
		<h4 class="indigo-text center">Comments!</h4>
		<form action="comment_logic.php" method="POST" class="fcom">
			<label class="center indigo-text">Name:</label>
			<input type="text" name="com_name" placeholder="Name">
			<textarea rows="45" cols="50" placeholder="Write a comment..." class="ctext" name="com_content" ></textarea>
			<input type="submit" name="comment_button" value="Send" class="btn cyan" id="text_btn">
		</form>
		<div class="container left">
			<ul class="left"><?php while($row = mysqli_fetch_assoc($result)){ ?>
				<li><span class="indigo-text"><b><?php echo $row['name']; ?></b></span> : <span><?php echo $row['comment']; ?></span> <span class="right"><?php echo $row['created_at']; ?></span> </li>
				<hr>
			<?php } ?>
			</ul>
		</div>
	</div>
	
</html>