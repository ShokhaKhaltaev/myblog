<?php 
	include('connection/connect.php');

	$sqlBlog = 'SELECT * FROM blog ORDER BY created_at';
	$result = mysqli_query($connection,$sqlBlog);
	$blogs = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_free_result($result);
	mysqli_close($connection);



?>

<!DOCTYPE html>
<html>
	<?php include('templates/header.php'); ?>
		<div class="container">
			<a href="addblog.php" class="btn-large orange right brand">Create</a> <?php foreach($blogs as $blog){ ?>
				<div class="row">
				<div class="col s12 m12 l12">
					<div class="card" id="card">
						<div class="card-image">
							<img src="image/<?php echo $blog['image']; ?>" alt="There should be a photo">
							<a href="#" class=" waves-effect waves-light halfway-fab btn-floating red ">
								<i class="material-icons">favorite</i>
							</a></div>
					
						<div class="card-content">
						<span class="teal-text"><?php echo $blog['created_at']; ?></span>
						<span class="card-title center"><h4><?php echo $blog['title']; ?></h4></span>
						<div class="indigo-text center"><b>Description:</b></div> . <p class="indigo-text"><?php echo $blog['description']; ?></p>

						</div>
						
					
						<div class="card-action right-align">
							<a href="edit.php?id=<?php echo $blog['id'];?>" class="btn cyan">Edit</a>
							<a href="detail.php?id=<?php echo $blog['id'];?>" class="btn red">Delete</a>
							<a href="detail.php?id=<?php echo $blog['id'];?>">More info</a>
						</div>

					</div>
				<?php } ?>
				</div>
				</div>

	<?php include('templates/footer.php'); ?>
</html>