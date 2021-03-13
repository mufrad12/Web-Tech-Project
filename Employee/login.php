<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
  </head>
  <body >

  	<div class="bg">

    <h1>Login</h1>

    <?php
		$userNameErr = $passwordErr = "" ;

		$userName = "";
		$password = "";
		$msg = "";
		$flag = 0;

		$filepath = "../Admin/employee.txt";
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

	                $json_decoded_text = json_decode($line, true);

	                print_r($json_decoded_text);
	                echo "<br>";

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

	                header("Location: employeeManagement.php");
	            }
	        
	            else
	            {
	                $msg = "Login Denied!!!! Try again...";
	                echo $msg;
	            }
		}

	    fclose($file);

    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
      <fieldset style="margin: 0% 40%;">
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
      
      <input type="submit" value="Login" style="margin-left: 40%;">
      	
      </style>

	</form>
  </div>
  <div class="footer">
  	<?php include 'footer.php';?>
  </div> 

	<style>
		body, html {
		height: 95%;
		margin: 0;
		color: white;
		}

		.bg {
			background-image: url('bg.jpg');
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
		legend{
          text-align: center;
          font-weight: bold;
        }
        h1{
        	text-align: center;
        }

	</style>

    </body>
</html>