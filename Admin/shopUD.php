<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Shop Update/Delete</title>
  </head>
  <body>
    <div class="bg">

    <h1>Shop Update/Delete</h1>

    <?php
      $nameErr = $addressErr = $emailErr = $idErr = $userNameErr = $passwordErr = $conPasswordErr = "";

      $name = ""; 
      $address = "";
      $email = "";
      $id = "";
      $userName= "";
      $password= "";
      $conPassword = "";
      

      if($_SERVER["REQUEST_METHOD"] == "POST") {

        if(empty($_POST['id'])) {
          $idErr = "Please fill up the id properly";
        }
        else {
          $id = $_POST['id'];
        }

        if(empty($_POST['name'])) {
          $nameErr = "Please fill up the name properly";
        }
        else {
          $name = $_POST['name'];
        }

        if(empty($_POST['address'])) {
          $addressErr = "Please fill up the address properly";
        }
        else {
          $address = $_POST['address'];
        }

        if(empty($_POST['email'])) {
          $emailErr = "Please enter an email";
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

        if(empty($_POST['conPassword'])) {
        $conPasswordErr = "Re enterint password is required";
        }
        else {
          $conPassword = $_POST['conPassword'];
        
             if (!($conPassword == $password))
          { $conPasswordErr = "Password not matched"; }
        }
        
      }

    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
      <fieldset>
        <legend>Basic Information: </legend>

        <label for="name">Shop Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $name;?>">
        <br>
        <p style="color:red"><?php echo $nameErr; ?></p>

        <label for="address">Address:</label>
        <input type="text" name="address" id="address" value="<?php echo $address ?>">
        <br>
        <p style="color:red"><?php echo $addressErr; ?></p>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="...@gmail.com" value="<?php echo $email ?>">
        <br>
        <p style="color:red"><?php echo $emailErr; ?></p>

      </fieldset>
      <br>
     
      <fieldset>

        <legend>Shop Account Information: </legend>

        <label for="id">ID:</label>
        <input type="text" name="id" id="id" value="<?php echo $id;?>">
        <br>
        <p style="color:red"><?php echo $idErr; ?></p>

        <label for="uname">UserName:</label>
        <input type="text" name="uname" id="uname" value="<?php echo $userName; ?>">
        <br>
        <p style="color:red"><?php echo $userNameErr; ?></p>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="<?php echo $password; ?>">
        <br>
        <p style="color:red"><?php echo $passwordErr; ?></p>
        
        <label for="conPassword">Re-type Password:</label>
        <input type="password" name="conPassword" id="conPassword" value="<?php echo $conPassword ?>">
        <br>
        <p style="color:red"><?php echo $conPasswordErr; ?></p>

      </fieldset>
      <br>
      
      <input type="submit" value="Update" class="updateShopBtn">
      <input type="submit" value="Delete" class="deleteShopBtn">

      </form>
      <br>
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
          background-image: url('http://sfwallpaper.com/images/background-wallpaper-for-website-1.jpg');
          height: 100%; 
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
        }
        .footer{
          color: white;
          height: 7%;
          background-color: #83888A;    }
      </style>

    </body>
</html>