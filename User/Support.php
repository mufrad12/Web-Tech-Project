<!DOCTYPE html>
<html>
<head>
	<title>Support</title>
</head>
<body>

	<h1>Support</h1>

	 <?php
      $userNameErr = $emailErr = $messageErr = "" ;

      $userName = "";
      $email = "";
      $message = "";

      if($_SERVER["REQUEST_METHOD"] == "POST") {

        if(empty($_POST['uname'])) {
          $userNameErr = "Please fill up the username properly";
          }
        else {
          $userName = $_POST['uname'];
        }

        if(empty($_POST['uemail'])) {
          $emailErr = "Please fill up the email properly";
        }
        else {
          $email = $_POST['uemail'];
        }

        if(empty($_POST['umessage'])) {
          $messageErr = "Please fill up the email properly";
        }
        else {
          $message = $_POST['umessage'];
        }
      }

    ?>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

		<textarea rows="2" cols="30" placeholder="Name" name="uname" ></textarea>
    
    <p style="color:red"><?php echo $userNameErr; ?></p>

		<textarea rows="2" cols="30" placeholder="Email" name="uemail" form="uemail"></textarea>
	
		<textarea rows="6" cols="64" placeholder="Message" name="umessage" form="umessage"></textarea>

		<br>

		<input type="button" value="Submit">

</body>
</html>