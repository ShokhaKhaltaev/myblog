<?php
	    include('connection/connect.php');
	
	    $title = $description = $blogContent = '';
	    $errors = array('title' => '', 'description' => '', 'blogContent' => '');

	    if(isset($_POST['submit'])){
		    if(empty($_POST['title'])){
			    $errors['title'] = "Please write title of your blog";
		    }
			    $title = $_POST['title'];

		    if(empty($_POST['description'])){
			    $errors['description'] = "Please write title of your blog";
		    }

			    $description = $_POST['description'];
			

		    if(empty($_POST['blogContent'])){
			    $errors['blogContent']='Not valid format of text';
		    }
		
			    $blogContent = $_POST['blogContent'];
	

		    if(!array_filter($errors)){
			    $title = mysqli_real_escape_string($connection,$_POST['title']);
			    $description = mysqli_real_escape_string($connection,$_POST['description']);
			    $blogContent = mysqli_real_escape_string($connection, $_POST['blogContent']);
			    $target = "image/".basename($_FILES['image']['name']);
			    $image = $_FILES['image']['name'];
			
			    $sql_b = "SELECT id FROM users";
			    $result = mysqli_query($connection, $sql_b);
			
			    while($row = mysqli_fetch_assoc($result)){
				    $id_new = $row['id'];
			    }

			    $sql = "INSERT INTO blog(title, description, blog, image, id_author) VALUES('$title', '$description', '$blogContent', '$image', '$id_new')";
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
<head>
	<style>
		#aform{
			height: 760px;
		}
	</style>
</head>
	<?php include('templates/header.php'); ?>
	<section class="container grey-text">
	<h4 class="center blue-text">Add a blog</h4>
	<form class="white" id="aform" action="addblog.php" method="POST" enctype="multipart/form-data">
		<label for="title">Title</label>
		<input type="text" name="title" value="<?php echo htmlspecialchars($title);?>">	
		<div class="red-text"><?php echo $errors['title']; ?></div>
		<label for="description">Description</label>		
		<input type="text" name="description" value="<?php echo htmlspecialchars($description);?>">
		<div class="red-text"><?php echo $errors['description']; ?></div>
		<div><p>Your post:</p></div>
		<textarea class="textarea" name="blogContent" placeholder = "Content..."><?php echo htmlspecialchars($blogContent); ?></textarea>
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