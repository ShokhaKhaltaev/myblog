<?php 

	include('connection/connect.php');



	if(isset($_GET['id'])){
		$id  = mysqli_real_escape_string($connection, $_GET['id']);
		$sqlbyid = "SELECT * FROM blog WHERE id= '$id' ";
		$resultbyid = mysqli_query($connection, $sqlbyid);


	}


?>

<!DOCTYPE html>
<html>
<head>
	<style>
		#comment{
			margin-top: 20px;
		}
		#detail{
		    background-size:cover;
		    background-color:white;
		    padding:30px;
		    border-radius:15px;
		}
	</style>
</head>
	<?php include('templates/header.php');?>
	<div class="container center">
	    <div id = "detail">
    		<p><?php if(isset($_SESSION['login'])){ ?>
    			<h4 class="indigo-text">Viewing by:</h4>
                <b><?php echo $_SESSION['login']; ?>
                <hr>   
              <?php } ?></b></p>
            <?php while($row = mysqli_fetch_assoc($resultbyid)) {?>
    		<h4 class="indigo-text">Title:</h4>
    		<p class="detail"><b><?php echo $row['title']; ?></b>
    		<hr>
    		<h4 class="indigo-text">Description:</h4>
    		<p class="detail"><b><?php echo $row['description']; ?></b></p>
    		<hr>
    		<h4 class="indigo-text">Content:</h4>
    		<div class="center">
    			<img src="image/<?php echo $row['image']; ?>" alt="There should be a photo" id="image">
    		</div>
    		<p class="detail"><?php echo $row['blog'];?></p>
    		<!-- Put this div tag to the place, where the Comments block will be -->
    		<div id="vk_comments"></div>
    			<script type="text/javascript">
    				VK.Widgets.Comments("vk_comments", {limit: 10,  attach: "*"});
    			</script>
    		<a href="comment.php?id=<?php echo $row['id']; ?> " id = "comment" class="btn indigo center">Comments</a>
		</div>
	</div>
	    <?php } ?>

	<?php include('templates/footer.php');?>

</html>

