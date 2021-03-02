<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
  </head>
  <body>
  	<center>

	    <h1>Login</h1>

	    <?php
			$userNameErr = $passwordErr = "" ;

			$userName = "";
			$password = "";
			$msg = "";
			$flag = 0;

			$filepath = "login.txt";
			$file = fopen($filepath,'r')
			or die("unable to open file");

			if($_SERVER["REQUEST_METHOD"] == "POST") 
			{

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

				while($line = fgets($file))
				{

	                //list($firstName,$lastName,$gender,$email,$userNameV,$passwordV,$recoveryEmail) = explode( ",", $line );


	                $json_decoded_text = json_decode($line, true);

	                $userNameV= $json_decoded_text['userName'];
	                $passwordV= $json_decoded_text['password'];
	        
	                if($userNameV == $userName && $passwordV == $password)
	                {
	                    $flag++;
	                    break;
	                }       
            	}

            	if ($flag>0)
	            {
	                $msg = "Logged in";
	                echo $msg;
	                echo "<br>";
	        
	                $_SESSION['userNameV'] = $userName;
	                $_SESSION['passwordV'] = $password;
	            
	                echo "UserName: " . $_SESSION['userNameV'];
	                echo "<br>";
	                echo "Password is: " . $_SESSION['passwordV'];
	            }
	        
	            else
	            {
	                $msg = "Login Denied!!!! Try again...";
	                echo $msg;
	            }


	        }

	        session_unset();
		    session_destroy();
		    fclose($file);



	    ?>

	    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	    	
			<fieldset style="margin: 0px 700px ;">
	        <legend>Login </legend>

	        <label for="uname">UserName:</label>
	        <input type="text" name="uname" id="uname" value="<?php echo $userName; ?>">
	        <br>
	        <p style="color:red"><?php echo $userNameErr; ?></p>

	        <label for="pass">Password:</label>
	        <input type="password" name="password" id="password" value="<?php echo $password; ?>">
	        <br>
	        <p style="color:red"><?php echo $passwordErr; ?></p>
	       

			</fieldset>
			<br>

			<input type="submit" value="Login">

	    </form>

	      <p style="color:red"><?php echo $userName; ?></p>
	      <p style="color:red"><?php echo $password; ?></p>

      </center>
    </body>
</html>