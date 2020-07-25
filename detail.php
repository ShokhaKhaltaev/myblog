<?php 

	include('connection/connect.php');



	if(isset($_GET['id'])){
		$id  = mysqli_real_escape_string($connection, $_GET['id']);
		$sqlbyid = "SELECT * FROM blog WHERE id= $id ";
		$resultbyid = mysqli_query($connection, $sqlbyid);
		$info = mysqli_fetch_assoc($resultbyid);

		mysqli_free_result($resultbyid);
		//mysqli_close($connection);

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

	$sql_comment = 'SELECT * FROM comment';
	$result_c = mysqli_query($connection,$sql_comment);
	$com_id = mysqli_fetch_all($result_c, MYSQLI_ASSOC);

	mysqli_free_result($result_c);

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
		
		<p class="line">Write a comment:</p>
		<div class="container">
			<form action="comment.php" method="POST" class="Comment">
			<label>Name: </label>
			<input type="text" name="commentname">
			<textarea rows="15" cols="20" placeholder="Write a comment..." name="commenttext"></textarea>
			<input type="submit" name="comment" class="btn cyan center" value="Send">
			</form>
		</div>
		<ul>
			<?php foreach($com_id as $com) {?>
				<li><?php echo $com['name']; ?> : <?php echo $com['comment']; ?></li>
			<?php } ?>	 
		</ul>
	</div>

	<?php include('templates/footer.php');?>

</html>