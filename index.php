<?php 
	include('connection/connect.php');

    $sqlBlog = 'SELECT * FROM blog ORDER BY created_at';
	$result = mysqli_query($connection,$sqlBlog);


	//mysqli_free_result($result);
	//mysqli_close($connection);


?>

<!DOCTYPE html>
<html>
	<?php include('templates/header.php'); ?>
		<div class="container">
			<?php if(!isset($_SESSION['login'])) {?>
				<div class="card-panel light-blue darken-1 ">
				<span><a href="register.php" class="white-text" >Please log in to add a blog!</a></span>
				</div> 
			<?php }?>
			<?php if(isset($_SESSION['login'])) { ?>
				<a href="addblog.php" class="btn-large orange right brand">Create</a>
			<?php }?>
			<?php while($row = mysqli_fetch_assoc($result)) { ?>
				<div class="row">
				<div class="col s12 m12 l12">
					<div class="card" id="card">
						<div class="card-image">
							<img src="image/<?php echo $row['image']; ?>" alt="There should be a photo">
							<a href="#" class=" waves-effect waves-light halfway-fab btn-floating red ">
								<i class="material-icons">favorite</i>
							</a></div>
					
						<div class="card-content">
						<span class="teal-text"><?php echo $row['created_at']; ?></span>
						<span class="card-title center"><h4><?php echo $row['title']; ?></h4></span>
						<div class="indigo-text center"><b>Description:</b></div> . <p class="indigo-text"><?php echo $row['description']; ?></p>

						</div>
						
					
						<div class="card-action right-align">
						    <a href="detail.php?id=<?php echo $row['id'];?>" >
						    More info</a>
						</div>
                    </div>
				</div>
				</div>
				<?php }?>
		</div>

	<?php include('templates/footer.php'); ?>
</html>