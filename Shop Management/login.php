<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Shop Login</title>
  </head>
  <body>

    <h1>Shop Login</h1>

    <?php
      $userNameErr = $passwordErr = "" ;

      $userName = "";
      $password = "";

       if($_SERVER["REQUEST_METHOD"] == "POST") {

        if(empty($_POST['userName'])) {
          $userNameErr = "Please fill up user name properly";
        }
        else {
          $userName = $_POST['userName'];
        }

        if(empty($_POST['password'])) {
          $passwordErr = "Please fill up password properly";
        }
        else {
          $password = $_POST['password'];
        }
      }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
      <fieldset>
        <legend>Login Information</legend>

        <label for="userName">UserName:</label>
        <input type="text" name="userName" id="userName" value="<?php echo $userName; ?>">
        <br>
        <p style="color:red"><?php echo $userNameErr; ?></p>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="<?php echo $password; ?>">
        <br>
        <p style="color:red"><?php echo $passwordErr; ?></p>
       

      </fieldset>
      <br>
      
      <input type="submit" value="Login">

      </form>
      <br>

    </body>
</html>