<?php
	include('connection/connect.php');
	//include('connection.php');
	
	//$title = $description = $blog = '';
	//$editid['description'] = $editid['title'] = $editid['blog'] = '';
	//$errors = array('title' => '', 'description' => '', 'blog' => '');

	//if(isset($_POST['submit'])){
		//if(empty($_POST['title'])){
			//$errors['title'] = "Please write title of your blog";
		//}
		//else{
	//$title = $_POST['title'];
			//if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $title)){
				//$errors['title'] = "Not valid format of text";}
		//}
		//if(empty($_POST['description'])){
			//$errors['description'] = "Please write title of your blog";
		//}
		//else{
	//$description = $_POST['description'];
			//if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $description)){
				//$errors['description'] = "Not valid format of text";}
		//}
		//if(empty($_POST['blog'])){
			//$errors['blog']='Not valid format of text1';
		///}
		//else{
	//$blog = $_POST['blog'];
		//}
		////if(!array_filter($errors)){}
		//}

	//}

	//$title = $description = $blog = '';
	$content_id = $_GET['id'];
	$sql_content = "SELECT * FROM blog WHERE id= '$content_id'";
	$id = mysqli_real_escape_string($connection,$content_id);
	$result  = mysqli_query($connection,$sql_content);
	$content = mysqli_fetch_assoc($result);

	

	//if(isset($_GET['id'])){
		//$idedit  = mysqli_real_escape_string($connection, $_GET['id']);
		//$sqledit = "SELECT * FROM contant WHERE id= $id ";
		//$resultedit = mysqli_query($connection, $sqledit);
		//$editid = mysqli_fetch_assoc($resultedit);

		//mysqli_free_result($resultedit);
		//mysqli_close($connection);
		//}
	
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