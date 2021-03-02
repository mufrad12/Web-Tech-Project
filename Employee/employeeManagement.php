<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Edit Employee Profile</title>
  </head>
  <body>
  	<center>
  		
	    <h1>Edit Employee Profile</h1>

	    <?php
	      $firstNameErr = $lastNameErr = $genderErr =  $emailErr = $userNameErr = $passwordErr = $rEmailErr = "" ;

	      $firstName = ""; 
	      $lastName = "";
	      $gender = "";
	      $email = "";
	      $userName= "";
	      $password= "";
	      $rEmail= "";

	      if($_SERVER["REQUEST_METHOD"] == "POST") {

	        if(empty($_POST['fname'])) {
	          $firstNameErr = "Please fill up the first name properly";
	        }
	        else {
	          $firstName = $_POST['fname'];
	        }

	        if(empty($_POST['lname'])) {
	          $lastNameErr = "Please fill up the last name properly";
	        }
	        else {
	          $lastName = $_POST['lname'];
	        }

	        if(empty($_POST['email'])) {
	          $emailErr = "Please enter your email";
	        }
	        else {
	          $email = $_POST['email'];

	          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	            { 
	              $emailErr = "Invalid email format"; 
	            }
	        }

	        if(empty($_POST['uname'])) {
	          $userNameErr = "Please fill up the username properly";
	          }
	        else {
	          $userName = $_POST['uname'];
	        }

	        if(empty($_POST['password'])) {
	          $passwordErr = "Please fill up the password properly";
	        }
	        else {
	          $password = $_POST['password'];
	        }

	        if(empty($_POST['remail'])) {
	        $rEmailErr = "Recovery Email is required";
	        }
	        else {
	          $rEmail = $_POST['remail'];
	        
	             if (!filter_var($rEmail, FILTER_VALIDATE_EMAIL)) 
	          { $rEmailErr = "Invalid recovery email format"; }
	        }

	        if (empty($_POST['gender'])) {
	               $genderErr = "Gender is required"; 
	        } 

	        else { 
	          $gender = $_POST['gender']; 
	        }
	        
	      }

	    ?>

	    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	      <fieldset style="margin: 0px 700px ;">
	        <legend>Basic Information: </legend>

	        <label for="fname">FirstName:</label>
	        <input type="text" name="fname" id="fname" value="<?php echo $firstName;?>">
	        <br>
	        <p style="color:red"><?php echo $firstNameErr; ?></p>

	        <label for="lname">LastName:</label>
	        <input type="text" name="lname" id="lname" value="<?php echo $lastName ?>">
	        <br>
	        <p style="color:red"><?php echo $lastNameErr; ?></p>

	        <label for="gender">Choose Gender:</label>

	        <input type="radio" name="gender" 
	        <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male 

	        <input type="radio" name="gender" 
	        <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female 

	        <input type="radio" name="gender" 
	        <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other
	        <p style="color:red"><?php echo $genderErr; ?></p>

	        <label for="email">Email:</label>
	        <input type="email" name="email" id="email" placeholder="...@gmail.com" value="<?php echo $email ?>">
	        <br>
	        <p style="color:red"><?php echo $emailErr; ?></p>

	      </fieldset>
	      <br>
	     
	      <fieldset style="margin: 0px 700px ;">

	        <legend>User Account Information: </legend>

	        <label for="uname">UserName:</label>
	        <input type="text" name="uname" id="uname" value="<?php echo $userName; ?>">
	        <br>
	        <p style="color:red"><?php echo $userNameErr; ?></p>

	        <label for="pass">Password:</label>
	        <input type="password" name="password" id="password" value="<?php echo $password; ?>">
	        <br>
	        <p style="color:red"><?php echo $passwordErr; ?></p>
	        
	        <label for="remail">Recovery Email Address:</label>
	        <input type="email" name="remail" id="remail" placeholder="...@gmail.com" value="<?php echo $rEmail ?>">
	        <br>
	        <p style="color:red"><?php echo $rEmailErr; ?></p>

	      </fieldset>
			<br>

			<input type="submit" value="Confirm">

			</form>
			<br>

			<?php

			if($firstName != "" && $lastName != "" && $gender != "" && $email != "" && $userName != "" && $password != "" && $rEmail != "")
			{
		
				$arr1 = array('firstName' => $firstName, 'lastName' => $lastName, 'gender' => $gender, 'email' => $email, 'userName' => $userName, 'password' =>  $password, 'rEmail' => $rEmail);

	    		$json_encoded_text = json_encode($arr1); 

	    		$file1 = fopen("login.txt", "w");
			    fwrite($file1, $json_encoded_text);

			    fclose($file1);

			}

			$file2 = fopen("login.txt", "r");
	        $read = fread($file2, filesize("login.txt"));
	        fclose($file2);

			$json_decoded_text = json_decode($read, true);

	        echo $json_decoded_text['firstName'];
	        echo "<br>";
	        echo $json_decoded_text['lastName'];
	        echo "<br>";
	        echo $json_decoded_text['gender'];
	        echo "<br>";
	        echo $json_decoded_text['email'];
	        echo "<br>";
	        echo $json_decoded_text['userName'];
	        echo "<br>";
	        echo $json_decoded_text['password'];
	        echo "<br>";
	        echo $json_decoded_text['rEmail'];
	        echo "<br>";
			
			?>
		</center>

    </body>
</html>