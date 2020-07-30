<?php 

	include('connection/connect.php');



	if(isset($_GET['id'])){
		$id  = mysqli_real_escape_string($connection, $_GET['id']);
		$sqlbyid = "SELECT * FROM blog WHERE id= $id ";
		$resultbyid = mysqli_query($connection, $sqlbyid);
		while($row = mysqli_fetch_assoc($resultbyid)){
			$title_i = $row['title'];
			$description_i = $row['description'];
			$image_i = $row['image'];
			$blog_i = $row['blog'];
			$id_i = $row['id'];
		}

		mysqli_free_result($resultbyid);
		mysqli_close($connection);

	}

	if(isset($_POST['id_delete'])){
		$delete_id = mysqli_real_escape_string($connection, $_POST['idDelete']);
		$sql_delete = "DELETE FROM blog WHERE id = $delete_id";

		if(mysqli_query($connection, $sql_delete)){
			header('Location: index.php');	
		}
		else{
			echo 'query error: ' . mysqli_error($connection);}
	
	}

?>

<!DOCTYPE html>
<html>
<head>
	<style>
		#comment{
			margin-top: 20px;
		}
	</style>
</head>
	<?php include('templates/header.php');?>
	<div class="container center">
		<p><?php if(isset($_SESSION['login'])){ ?>
			<h4 class="indigo-text">Viewing by:</h4>
            <b><?php echo $_SESSION['login']; ?>
            <hr>   
          <?php } ?></b></p>
		<h4 class="indigo-text">Title:</h4>
		<p class="detail"><b><?php echo $title_i; ?></b>
		<hr>
		<h4 class="indigo-text">Description:</h4>
		<p class="detail"><b><?php echo $description_i; ?></b></p>
		<hr>
		<h4 class="indigo-text">Content:</h4>
		<div class="center">
			<img src="image/<?php echo $image_i; ?>" alt="There should be a photo" id="image">
		</div>
		<p class="detail"><?php echo $blog_i;?></p>
		
		<!-- Put this div tag to the place, where the Comments block will be -->
		<div id="vk_comments"></div>
			<script type="text/javascript">
				VK.Widgets.Comments("vk_comments", {limit: 10, width: "600", attach: "*"});
			</script>
		
		<form action="detail.php" method="POST" class="newform">
			<input type="hidden" name="idDelete" value="<?php echo $id_i;?>">
			<input type="submit" name="id_delete" value="Delete" class="btn red z-depth-0">
		</form>
		<a href="comment.php?id=<?php echo $id_i; ?> " id = "comment" class="btn indigo center">Comments</a>
	</div>

	<?php include('templates/footer.php');?>

</html>