<?php
	include('connection/connect.php');


	$content_id = $_GET['id'];
	$sql_content = "SELECT * FROM blog WHERE id= '$content_id'";
	$id = mysqli_real_escape_string($connection,$content_id);
	$result  = mysqli_query($connection,$sql_content);
	$content = mysqli_fetch_assoc($result);
	
?>


<!DOCTYPE html>
<html>
	<?php include('templates/header.php'); ?>
	<section class="container grey-text">
	<h4 class="center blue-text">Update your blog</h4>
	<form class="white" action="update.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $content['id']; ?>">
		<label for="title">Title</label>
		<input type="text" name="title" value="<?php echo htmlspecialchars($content['title']);?>">
		<label for="description">Description</label>		
		<input type="text" name="description" value="<?php echo $content['description'];?>">
		<textarea class="textarea" name="blog"><?php echo $content['blog'];?></textarea>
		<div class="center">
			<input type="submit" name="submit" value="Update" class="btn indigo z-depth-0">
		</div>
	</form>
	</section>
	
	<?php include('templates/footer.php'); ?>
</html>