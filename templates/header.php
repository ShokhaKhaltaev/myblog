<?php 
  session_start();
?>
<head>
	<title>YAKO</title>
	    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

     <!-- Compiled and minified JavaScript -->
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

     <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
    	img{
    		height:300px;
    	}
    	nav{
    		margin-bottom: 15px;
    	}
    	#card{
    		margin-top: 15px;

    	}
    	.textarea{
  			height: 400px;
  		}
  		.newform{
  			height: 7px;
  			margin:10px auto;
  		}
  		form{
  		max-width: 660px;
  		height: 700px;
  		margin: 20px auto;
  		padding: 20px;
  		}
      .sform{
        max-width: 500px;
      }
      #image{
        width: 90%;
        height: 500px;
        border: 1px solid blue;
        }
      .detail{
        font-size: 18px;
      }
      label{
        font-size: 16px;
      }
      .Comment{
        margin: 0px;
        padding: 0px;
        height:150px;
      }

      footer{
        margin-top: 80px;
      }
      .line{
        margin-top: 30px;
        text-align: center;
        color: blue;
      }

    </style>
    
</head>
<body class="grey lighten-2">
	<nav class="nav-wrapper indigo navbar-fixed">
		<div class="container">
			<a href="index.php" class="brand-logo">YAKO@blogs</a>
			<a href="#" class="sidenav-trigger" data-target="mobile-links">
				<i class="material-icons">menu</i>
			</a>
			<ul class="right hide-on-med-and-down">
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="signup.php">Sign up</a></li>
				<li><a href="register.php">Log in</a></li>
				<li><span><a href="#" class="right grey-text">
					<i class="large material-icons">account_circle</i>
				</a></span></li>
        <li><a href="logout.php" class="btn red">Logout</a></li>
        <li class="white-text">
          <?php if(isset($_SESSION['login'])){ ?>
            Hello, <?php echo $_SESSION['login']; ?> !   
          <?php } ?> 
        </li>
			</ul>	
		</div>
	</nav>

	<ul class="sidenav" id="mobile-links">
		<li><span><a href="account.html" class="right grey-text">
			<i class="medium material-icons">account_circle</i>
		</a></span></li>
    <li><a href="register.php">Log in</a></li>
		<li><a href="index.php">Home</a></li>
		<li><a href="#">About</a></li>
		<li><a href="signup.php">Sign up</a></li>
		
    <li><a href="logout.php" class="btn red">Logout</a></li>
  
	</ul>