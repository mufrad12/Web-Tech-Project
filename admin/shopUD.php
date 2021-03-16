<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Shop Update/Delete</title>
  </head>
  <body>

    <div class="header">
      <?php include 'header.php';?>
    </div>

    <div class="bg">

      <br>
      <h1>Shop Update/Delete</h1>

    <?php
      $srcSErr = $nameErr = $addressErr = $emailErr = $idErr = $userNameErr = $passwordErr = $conPasswordErr = "";

      $srcS = "";
      $name = ""; 
      $address = "";
      $email = "";
      $id = "";
      $userName= "";
      $password= "";
      $conPassword = "";

      $flag = 0;
      $searchKey = "";

      if(isset($_POST['src'])){
        if($_SERVER["REQUEST_METHOD"] == "POST"){

          if(empty($_POST['srcS'])) {
            $srcSErr = "Please fill up the Shop username";
          }
          else {
            $srcS = $_POST['srcS'];
          }

        }

        $f1 = fopen("../database/shopData.txt", "r");
        $data = fread($f1, filesize("../database/shopData.txt"));
        fclose($f1);
        $data_after_newline_delimeter = explode("\n", $data);
        $arr1 = array();
        $searchKey = $srcS;

        for($i = 0; $i < count($data_after_newline_delimeter) - 1; $i++) {
          $json_decoded = json_decode($data_after_newline_delimeter[$i], true);
          if($json_decoded['userName'] === $searchKey)
          {
            echo $srcS." found";
            $flag=1;
            $name = $json_decoded['shopName'];
            $address = $json_decoded['shopAddress'];
            $email = $json_decoded['email']; 
            $id = $json_decoded['id']; 
            $userName= $json_decoded['userName']; 
            $password= $json_decoded['password'];
            $conPassword = $json_decoded['confirmpass'];
          }
        }
        if($flag==0)
          echo $srcS." not found";
      }


      $f1 = fopen("../database/shopData.txt", "r");
      $data = fread($f1, filesize("../database/shopData.txt"));
      fclose($f1);
      $data_after_newline_delimeter = explode("\n", $data);
      $arr1 = array();
      $searchKey = $srcS;
      
      if((isset($_POST['update']))||(isset($_POST['delete'])))
      {

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

        $f1 = fopen("../database/shopData.txt", "r");
        $data = fread($f1, filesize("../database/shopData.txt"));
        fclose($f1);
        $data_after_newline_delimeter = explode("\n", $data);
        $arr1 = array();
        $searchKey = $userName;

        if(isset($_POST['update']))
        {

          for($i = 0; $i < count($data_after_newline_delimeter) - 1; $i++) {
            $json_decoded = json_decode($data_after_newline_delimeter[$i], true);
            if($json_decoded['userName'] === $searchKey)
            {

              $arr2 = array(
                'shopName' => $name,
                'shopAddress' => $address,
                'id' => $json_decoded['id'],
                'userName' => $json_decoded['userName'],
                'email' => $email,
                'password' => $password,
                'confirmpass' => $conPassword
              );
              array_push($arr1, $arr2);
            }

            else
            {
              array_push($arr1, $json_decoded);
            }
          }

          $f2 = fopen("../database/shopData.txt", "w");
          for($j = 0; $j < count($arr1); $j++) {
            $json_encoded = json_encode($arr1[$j]);
            fwrite($f2, $json_encoded . "\n");
          }
          fclose($f2);

        }

        if(isset($_POST['delete']))
        {

          for($i = 0; $i < count($data_after_newline_delimeter) - 1; $i++) {
            $json_decoded = json_decode($data_after_newline_delimeter[$i], true);
            if($json_decoded['userName'] !== $searchKey) {
              array_push($arr1, $json_decoded);
            }

          }
          $f2 = fopen("../database/shopData.txt", "w");
          for($j = 0; $j < count($arr1); $j++) {
            $json_encoded = json_encode($arr1[$j]);
            fwrite($f2, $json_encoded . "\n");
          }
          fclose($f2);

        }
      }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

      <label for="srcS">Search Shop:</label>
      <input type="text" name="srcS" id="srcS" value="<?php echo $srcS;?>">

      <input type="submit" name="src" value="Search" class="srcSmployeeBtn">
      <p style="color:red"><?php echo $srcSErr; ?></p>

    </form>
    <br>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
      <fieldset style="margin: 0% 40%;">
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
     
      <fieldset style="margin: 0% 40%;">

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
      
      <input type="submit" name="update" value="Update" class="updateShopBtn" style="margin-left: 40%;">
      <input type="submit" name="delete" value="Delete" class="deleteShopBtn">

      </form>
      <br>
    </div>

      <div class="footer">
        <?php include 'footer.php';?>
      </div>
      

      <style>
        body, html {
        height: 90%;
        margin: 0;
        color: white;
        }

        .bg {
          background-image: url('../images/about3.jpg');
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
      </style>

    </body>
</html>