<?php 

	include('connection/connect.php');



	if(isset($_GET['id'])){
		$id  = mysqli_real_escape_string($connection, $_GET['id']);
		$sqlbyid = "SELECT * FROM blog WHERE id= $id ";
		$resultbyid = mysqli_query($connection, $sqlbyid);
		$info = mysqli_fetch_assoc($resultbyid);

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
			echo 'query error: ' . mysqli_error($connection);
		}
	}



?>

<!DOCTYPE html>
<html>
	<?php include('templates/header.php');?>
	<div class="container center">
		<p><?php if(isset($_SESSION['login'])){ ?>
			<h4 class="indigo-text">Viewing by:</h4>
            <b><?php echo $_SESSION['login']; ?>   
          <?php } ?></b></p>
         <hr>
		<h4 class="indigo-text">Title:</h4>
		<p class="detail"><b><?php echo $info['title']; ?></b>
		<hr>
		<h4 class="indigo-text">Description:</h4>
		<p class="detail"><b><?php echo $info['description']; ?></b></p>
		<hr>
		<h4 class="indigo-text">Content:</h4>
		<div class="center">
			<img src="image/<?php echo $info['image']; ?>" alt="There should be a photo" id="image">
		</div>
		<p class="detail"><?php echo $info['blog'];?></p>
		<form action="detail.php" method="POST" class="newform">
			<input type="hidden" name="idDelete" value="<?php echo $info['id'];?>">
			<input type="submit" name="id_delete" value="Delete" class="btn red z-depth-0">
		</form>
		<form action="edit.php?id=<?php echo $info['id']; ?>" method="POST" class="newform">
			<input type="hidden" name="id" value="<?php echo $info['id']; ?>"></input>
			<input type = "submit"  name= "id_edit" value = "Edit" class = "btn cyan" ></input>
		</form>
	</div>


	<?php include('templates/footer.php');?>
	?>
</html>