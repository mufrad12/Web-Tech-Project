<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
  </head>
  <body>

<h1>Contact Us</h1>


<?php
		$nameErr = $numberErr= $subjectErr=  $emailErr="";

		$name = ""; 
		$number = ""; 
		$subject= "";
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

			 if(empty($_POST['subject'])) {
				$subjectErr = "Please fill up the subject properly";
			}
			else {
				$subject = $_POST['subject'];
			}
		}
	?>


<table style="width:100%;max-width:550px;border:1;" cellpadding="8" cellspacing="0">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	 
           
	<tr> 
		<td>
			<label for="name">Name :</label>

		</td> 

		<td>
			<input type="text" id="name" name="name" style="width:250px;" value="<?php echo $name; ?>" >
			<p style="color:red"><?php echo $nameErr; ?></p>
		</td> 
	</tr> 

	<tr> 
		<td>
			<label for="number">Phone number:</label>
		</td> 
		<td>
			<input name="number" type="text" style="width:250px;" value="<?php echo $number; ?>" >
			<p style="color:red"><?php echo $numberErr; ?></p>
		</td> 
	</tr> 

	<tr> 
		<td>
			<label for="email">Email address:</label>
		</td> 
		<td>
			<input name="email" type="text" style="width:250px;" value="<?php echo $email; ?>" >
			<p style="color:red"><?php echo $emailErr; ?></p>
		</td> 
	</tr> 

	<tr> 
		<td>
			<label for="subject">Comments:</label>
		</td> 
		<td>
			<textarea name="subject" rows="7" cols="40" style="width:350%;max-width:550px;" value="<?php echo $subject; ?>" >

			</textarea>

	</td>
	</tr> 
     
     <tr> 
		<td>
			

		</td> 

		<td>
			<input type="submit" value="Submit">
		</td> 
	</tr> 

	
	</form>
		</table>
      
		

		</body>
</html>
