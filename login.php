<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
  </head>
  <body >

  	<div class="header">
        <?php include 'header2.php';?>
    </div>

  	<div class="bg">

    <h1>Login</h1>

    <?php
		$userNameErr = $passwordErr = "" ;

		$userName = "";
		$password = "";
		$msg = "";
		$flag = 0;

		$filepath = "database/admin.txt";
		$file = fopen($filepath,'r')
		or die("unable to open file");

		$filepath2 = "database/shopData.txt";
		$file2 = fopen($filepath2,'r')
		or die("unable to open file");

		$filepath3 = "database/employee.txt";
		$file3 = fopen($filepath3,'r')
		or die("unable to open file");

		$filepath4 = "database/user.txt";
		$file4 = fopen($filepath4,'r')
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

                //print_r($json_decoded_text);
                //echo "<br>";

                $userNameV= $json_decoded_text['userName'];
                $passwordV= $json_decoded_text['password'];
        
                if($userNameV == $userName && $passwordV == $password)
                {
                    $flag=1;
                    break;
                }       
        	}

        	while($line = fgets($file2))
			{

                $json_decoded_text = json_decode($line, true);

                //print_r($json_decoded_text);
                //echo "<br>";

                $userNameV= $json_decoded_text['userName'];
                $passwordV= $json_decoded_text['password'];
        
                if($userNameV == $userName && $passwordV == $password)
                {
                    $flag=2;
                    break;
                }       
        	}

        	while($line = fgets($file3))
			{

                $json_decoded_text = json_decode($line, true);

                //print_r($json_decoded_text);
                //echo "<br>";

                $userNameV= $json_decoded_text['userName'];
                $passwordV= $json_decoded_text['password'];
        
                if($userNameV == $userName && $passwordV == $password)
                {
                    $flag=3;
                    break;
                }       
        	}

        	while($line = fgets($file4))
			{

                $json_decoded_text = json_decode($line, true);

                //print_r($json_decoded_text);
                //echo "<br>";

                $userNameV= $json_decoded_text['userName'];
                $passwordV= $json_decoded_text['password'];
        
                if($userNameV == $userName && $passwordV == $password)
                {
                    $flag=4;
                    break;
                }       
        	}

            	if ($flag==1 || $flag==2 || $flag==3 || $flag==4)
	            {
	                $msg = "Logged in";
	                echo $msg;
	                echo "<br>";
	        
	                $_SESSION['userNameV'] = $userName;
	                $_SESSION['passwordV'] = $password;
	            
	                echo "UserName: " . $_SESSION['userNameV'];
	                echo "<br>";
	                echo "Password is: " . $_SESSION['passwordV'];

	                if($flag==1){
	                	header("Location: admin/bookList.php");
	                }

	                elseif ($flag==2) {
	                	header("Location: shop/bookList.php");
	                }

	                elseif ($flag==3) {
	                	header("Location: employee/ShowStatement.php");
	                }

	                elseif ($flag==4) {
	                	header("Location: user/bookList.php");
	                }

	                
	            }
	        
	            else
	            {
	                $msg = "Login Denied!!!! Try again...";
	                echo $msg;
	            }
		}

		//session_unset();
	    //session_destroy();
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
      <a href="preRegister.php" title="" class="anchor">Not yet registered?</a>

	</form>
  </div>
  <div class="footer">
  	<?php include 'admin/footer.php';?>
  </div> 

	<style>
		body, html {
		height: 90%;
		margin: 0;
		color: white;
		}

		.bg {
		background-image: url('images/about3.jpg');
		min-height: 100%; 
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

		.anchor{
			color: white;
		}

	</style>

    </body>
</html>