<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>
</head>
<body>
<center>


	<h1>Sign Up</h1>
	
	<?php
		$shopNameErr = $shopAddressErr = $idErr = $userNameErr=  $emailErr = $passwordErr= $confirmpassErr="";

		$shopName = ""; 
		$shopAddress = ""; 
		$userName= "";
		$id = "";
		$email = "";
		$password= "";
		$confirmpass= "";

		if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_POST['shopName'])) {
				$shopNameErr = "Please fill up the shop name properly";
			}
			else {
				$shopName = $_POST['shopName'];
			}

			if(empty($_POST['shopAddress'])) {
				$shopAddressErr = "Please fill up the shop address properly";
			}
			else {
				$shopAddress = $_POST['shopAddress'];
			}

			 if(empty($_POST['email'])) {
				$emailErr = "Email is required";
			}
			else {
				$email = $_POST['email'];
			
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
				{ $emailErr = "Invalid email format"; }
		         }

            if(empty($_POST['id'])) {
                 $idErr = "Please fill up the id number properly";
                   }
               else {
               $id = $_POST['id'];
                
                }
			 if(empty($_POST['userName'])) {
				$userNameErr = "Please fill up the username properly";
			}
			else {
				$userName = $_POST['userName'];
			}
           if(empty($_POST['password'])) {
				$passwordErr = "Please fill up the password properly";
			}
			else {
				$password = $_POST['password'];
			}
           if(empty($_POST['confirmpass'])) {
        $confirmpassErr = "Please fill up the password properly";
           }
      else {
        $confirmpass = $_POST['confirmpass'];
      }
      if($confirmpass!==$password)
      {
        $confirmpassErr="Password don't match";
      }
		}
	?>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		
		<!-- Input Text Field -->
		<fieldset style="margin: 0px 600px ;">
			<legend> Basic Information :</legend>

		   <label for="shopName">Shop Name :</label>
		   <input type="text" name="shopName" id="shopName" value="<?php echo $shopName; ?>"> 
		   <p style="color:red"><?php echo $shopNameErr; ?></p>
		
		   <br>

		   <label for="shopAddress">Shop Address :</label>
		   <input type="text" name="shopAddress" id="shopAddress" value="<?php echo $shopAddress ?>">
		   <p style="color:red"><?php echo $shopAddressErr; ?></p>

           <br>

            <label for="email">Email :</label>
		   <input type="email" name="email" id="email" value="<?php echo $email ?>">
		   <p style="color:red"><?php echo $emailErr; ?></p>

		   <br>

		</fieldset>

		 <fieldset style="margin: 0px 600px ;">
			<legend> User Account Information :</legend>

			<label for="id">Id :</label>
            <input type="text" name="id" id="id" value="<?php echo $id; ?>"> 
            <p style="color:red"><?php echo $idErr; ?></p>
    
            <br>

		   <label for="userName">Username :</label>
		   <input type="text" name="userName" id="userName" value="<?php echo $userName; ?>"> 
		   <p style="color:red"><?php echo $userNameErr; ?></p>
		
		   <br>

           <label for="password">Password :</label>
		   <input type="password" name="password" id="password" value="<?php echo $password; ?>"> 
		   <p style="color:red"><?php echo $passwordErr; ?></p>
		
		   <br>

            <label for="confirmpass">Re-Type Password :</label>
            <input type="password" name="confirmpass" id="confirmpass" value="<?php echo $confirmpass; ?>"> 
            <p style="color:red"><?php echo $confirmpassErr; ?></p>
    
          <br>

		</fieldset>
			<br>
			
			 <input type="submit" value="Add" class="addAdminBtn"  style="margin: 0% 40%;">>

	      </form>
	      <br>
 <?php

				if($shopName != "" && $shopAddress != "" && $id != "" && $userName != "" && $email != "" && $password != "" && $confirmpass != "" )
				{
			
					$arr1 = array('shopName' => $shopName, 'shopAddress' => $shopAddress, 'id' => $id,'userName' => $userName, 'email' => $email, 'password' =>  $password, 'confirmpass' => $confirmpass);

		    		$json_encoded_text = json_encode($arr1); 

		    		$file1 = fopen("registrationData.txt", "a");
				    fwrite($file1, $json_encoded_text);
				    fwrite($file1, "\n");

				    fclose($file1);
				}
			?>

		</center>
    </body>
</html>