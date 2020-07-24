<?php
	include('connection/connect.php');
	//include('connection.php');
	
	$title = $description = $blogContent = '';
	$errors = array('title' => '', 'description' => '', 'blogContent' => '');

	if(isset($_POST['submit'])){
		if(empty($_POST['title'])){
			$errors['title'] = "Please write title of your blog";
		}
		//else{
			$title = $_POST['title'];
			//if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $title)){
				//$errors['title'] = "Not valid format of text";
		//}
		if(empty($_POST['description'])){
			$errors['description'] = "Please write title of your blog";
		}
		//else{
			$description = $_POST['description'];
			//if(!preg_match('/^[a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $description)){
				//$errors['description'] = "Not valid format of text";}
		//}
		if(empty($_POST['blogContent'])){
			$errors['blogContent']='Not valid format of text';
		}
		//else{
			$blogContent = $_POST['blogContent'];
		//}

		if(!array_filter($errors)){
			$title = mysqli_real_escape_string($connection,$_POST['title']);
			$description = mysqli_real_escape_string($connection,$_POST['description']);
			$blogContent = mysqli_real_escape_string($connection, $_POST['blogContent']);
			$target = "image/".basename($_FILES['image']['name']);
			$image = $_FILES['image']['name'];

			$sql = "INSERT INTO blog(title, description, blog, image) VALUES('$title', '$description', '$blogContent', '$image')";
			$result = mysqli_query($connection, $sql);
			if($result){
				if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
					$msg = "Image uploaded successfully";
				}
				else{
					$msg = "There was a big problem in uploading file";
				}
				header('Location: index.php');
			}
			else{
				echo 'query error: '. mysqli_error($connection);
			}
		}

	}




?>



<!DOCTYPE html>
<html>
	<?php include('templates/header.php'); ?>
	<section class="container grey-text">
	<h4 class="center blue-text">Add a blog</h4>
	<form class="white" action="addblog.php" method="POST" enctype="multipart/form-data">
		<label for="title">Title</label>
		<input type="text" name="title" value="<?php echo htmlspecialchars($title);?>">	
		<div class="red-text"><?php echo $errors['title']; ?></div>
		<label for="description">Description</label>		
		<input type="text" name="description" value="<?php echo htmlspecialchars($description);?>">
		<div class="red-text"><?php echo $errors['description']; ?></div>
		<textarea class="textarea" name="blogContent"><?php echo htmlspecialchars($blogContent); ?></textarea>
		<div class="red-text"><?php echo $errors['blogContent']; ?></div>
		<input type="hidden" name="size" value="1000000">
		<div>
			<p class="orange-text">Upload an image for your blog</p>
			<input type="file" name="image" value="Uplaod an image">
		</div>
		<div class="center">
			<input type="submit" name="submit" value="Add" class="btn indigo z-depth-0">
		</div>
	</form>
	</section>
	


	<?php include('templates/footer.php'); ?>
</html>