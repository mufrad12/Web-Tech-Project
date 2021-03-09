<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
  </head>
  <body>
<div class="header">
      <?php include 'header.php';?>
  </div>
<h1>Contact Us</h1>


<?php
		$nameErr = $numberErr= $emailErr="";

		$name = ""; 
		$number = ""; 
		$email = "";


		if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_POST['name'])) {
				$nameErr = "Please fill up the name properly";
			}
			else {
				$name = $_POST['name'];
			}

			if(empty($_POST['number'])) {
				$numberErr = "Please fill up the mobile number properly";
			}
			else {
				$number = $_POST['number'];
			}

			 if(empty($_POST['email'])) {
				$emailErr = "Email is required";
			}
			else {
				$email = $_POST['email'];
			
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
				{ $emailErr = "Invalid email format"; }
		         }
		     }

	?>



<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

	

			<label for="name">Name :</label>
			<input type="text" id="name" name="name" style="width:250px;margin-left: 80px;vertical-align: middle;" value="<?php echo $name; ?>" >
			<p style="color:red"><?php echo $nameErr; ?></p>
	

			<label for="number">Phone number:</label>
			<input name="number" type="text" style="width:250px;margin-left: 30px;vertical-align: middle;" value="<?php echo $number; ?>" >
			<p style="color:red"><?php echo $numberErr; ?></p>


			<label for="email">Email address:</label>
			<input name="email" type="text" style="width:250px;margin-left: 30px;vertical-align: middle;" value="<?php echo $email; ?>" >
			<p style="color:red"><?php echo $emailErr; ?></p>
 

			<label for="subject">Comments:</label>

			<textarea name="subject" rows="7" cols="40" style="width:650px;margin-left: 50px;vertical-align: middle;" 
			value="<?php echo $subject; ?>" >


			</textarea>
			<br>
            <br>
			<input type="submit" value="Submit" style="width:100px;margin-left: 125px;vertical-align: middle;">

	
	</form>
	<br>
      <?php

         if ($name!=""  && $number!="" &&  $email!="" )
				{ echo "<b> The form is submitted </b> ";}
		   ?>

		</body>
</html>
