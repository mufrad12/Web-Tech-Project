<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
  </head>
  <body>

    <h1>Login</h1>

    <?php
      $userNameErr = $passwordErr = "" ;

      $userName = "";
      $password = "";
      $rEmail = "";

      if($_SERVER["REQUEST_METHOD"] == "POST") {

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
      }

    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
      <fieldset>
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
      <a href="#" title="">Not yet registered?</a>

      </form>

      

    </body>
</html>