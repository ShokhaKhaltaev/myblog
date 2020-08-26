<?php

include('connection/connect.php');



	if(isset($_GET['id'])){
        
        
		$id_user = mysqli_real_escape_string($connection, $_GET['id']);
		$sql_user = "SELECT * FROM users WHERE id = '$id_user' ";
		$result_user = mysqli_query($connection, $sql_user);

		$sql_content = "SELECT * FROM blog WHERE id_author = '$id_user' ";
		$result_content = mysqli_query($connection, $sql_content);
	}



?>

<!DOCTYPE html>
<html>
<head>
	<style>
		#divc{
		    border-radius:15px;
			background-color: white;
			width: 100%;
			height:200px;
		    text-align:left;
			
        }
		.email{
			margin-left:65px;
		}
		#data{
		    padding-top:20px;
		    margin-left:220px;
		}
		#data2{
		    margin-left:220px;
		}
		#data3{
		    margin-left:220px; 
		}
		#btn1{
		    margin-left:10px;
		}
		#btn2{
		    margin-left:220px;
		}
		#photo_profile{
		    width:150px;
		    height:150px;
		    margin-top:20px;
		    margin-left: 20px;
		    position:absolute;
		    border-radius:50%;
		}
		.session{
		    position:relative;

		}
		 
		@media only screen and (max-width: 600px){
		    #divc{
		        background-color: white;
		        width:380px;
		        height:200px;
		        text-align:left;
		        margin-left: 15px;}
		    .email{
		        
		    }
		    #data{
		        padding-top:30px;
		        margin-left:200px;
		    }
		    #data2{
		        margin-left:200px;
		    }
		    #data3{
		        margin-left:200px;
		    }
		    #btn1{
		        margin-left:10px;
		    }
		    #btn2{
		        margin-left:200px;
		        
		    }
		    #photo_profile{
		        position:absolute;
		        border-radius:50%;
		    }
		    .session{
		        position:relative;
		    }
		   

		}
	</style>
</head>
<?php include('templates/header.php'); ?>
    <h4 class = "indigo-text center">My Profile</h4>
	<div class="container center" id = "divc">
	    <img src="image/<?php echo $_SESSION['image']; ?>" alt="There should be a photo" id = "photo_profile">
	    <div class ="session">
		    <p class = "email" id = "data"><span class="indigo-text">Name:</span> <?php echo $_SESSION['name']; ?><p>
		    <p class = "email" id="data2"><span class="indigo-text">Login:</span> <?php echo $_SESSION['login']; ?></p>
		    <p class = "email" id="data3"><span class="indigo-text">Email:</span> <?php echo $_SESSION['email']; ?></p>
		    <span><a href ="edit_profile.php?id=<?php echo $_SESSION['id']; ?>" class = "btn cyan" id = "btn2">Edit</a></span>
		    <span></span><a href ="delete_profile.php?id=<?php echo $_SESSION['id']; ?>" class = "btn red" id = "btn1">Delete</a></span>
		 </div>
	</div>
    <h5 class = "indigo-text center">My posts</h5>
	<div class="container">
		<?php while($row_con = mysqli_fetch_assoc($result_content)){ ?>
			<div class="row ">
			<div class="col s12 m12 l12 ">
				<div class="card" id="card">
					<div class="card-image">
						<img src="image/<?php echo $row_con['image']; ?>" alt="There should be a photo">
						<a href="#" class=" waves-effect waves-light halfway-fab btn-floating red ">
							<i class="material-icons">favorite</i>
						</a></div>
					
					<div class="card-content">
					<span class="teal-text"><?php echo $row_con['created_at']; ?></span>
					<span class="card-title center"><h4><?php echo $row_con['title']; ?></h4></span>
					<div class="indigo-text center"><b>Description:</b></div><p class="indigo-text"><?php echo $row_con['description']; ?></p>

					</div>
						
					
					<div class="card-action right-align">
						<a href="edit.php?id=<?php echo $row_con['id'];?>" class="btn cyan">Edit</a>
						<a href="delete.php?id=<?php echo $row_con['id'];?>" class="btn red">Delete</a>
						<a href="detail.php?id=<?php echo $row_con['id'];?>">More info</a>
                    </div>
				
                </div>
			</div>
			</div>
		<?php }?>	
	</div>
	


<?php include('templates/footer.php'); ?>
</html>