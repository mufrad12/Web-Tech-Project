<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Search an Admin</title>
  </head>
  <body>
  	<div class="header">
  		<?php include 'header.php';?>
	</div>
	
  	<div class="bg">
  		<h1>Search an Admin</h1>

	    <?php
	      $srcAErr = "" ;

	      $srcA = "";
	      

	       if($_SERVER["REQUEST_METHOD"] == "POST"){

	        if(empty($_POST['srcA'])) {
	          $srcAErr = "Please fill up the admin username";
	        }
	        else {
	          $srcE = $_POST['srcA'];
	        }

	       }

	    ?>

	    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

	      <label for="srcA">Search Admin:</label>
	      <input type="search" name="srcA" id="srcA" value="<?php echo $srcA;?>" placeholder="search here">

	      <input type="submit" value="Search" class="srcAserBtn">
	      <p style="color:red"><?php echo $srcAErr; ?></p>

	    </form>
	    <br>
	</div>
	    
	<div class="footer">
  		<?php include 'footer.php';?>
	</div>
  

	<style>
		body, html {
		height: 90%;
		margin: 0;
		color: white;
		}

		.bg {
			background-image: url('http://sfwallpaper.com/images/background-wallpaper-for-website-1.jpg');
			height: 100%; 
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
		.footer{
			color: white;
			height: 7%;
			background-color: #83888A;
		}
	</style>

    </body>
</html>