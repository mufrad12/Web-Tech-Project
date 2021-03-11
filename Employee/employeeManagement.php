<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Update and Delete Profile</title>
  </head>
  <body>
  <div class="header">
      <?php include 'header.php';?>
  </div>
    <h1>Update and Delete Profile</h1>

    <?php
      $firstNameErr = $lastNameErr = $genderErr =  $dobErr = $emailErr = $idErr = $userNameErr = $passwordErr = $conPasswordErr = "" ;
    
      $firstName = ""; 
      $lastName = "";
      $gender = "";
      $dob = "";
      $email = "";
      $id = "";
      $userName= "";
      $password= "";
      $conPassword = "";
    

      if((isset($_POST['update']))||(isset($_POST['delete'])))
        {

         if($_SERVER["REQUEST_METHOD"] == "POST") 
         {
        
          if(empty($_POST['firstName'])) 
          {
        $firstNameErr = "Please fill up the first name properly";
      }
      else {
        $firstName = $_POST['firstName'];
      }

      if(empty($_POST['lastName'])) {
        $lastNameErr = "Please fill up the last name properly";
      }
      else {
        $lastName = $_POST['lastName'];
      }

            if(empty($_POST['id'])) {
        $idErr = "Please fill up the id number properly";
      }
      else {
        $id = $_POST['id'];
      }

       if(empty($_POST['email'])) {
        $emailErr = "Email is required";
      }
      else {
        $email = $_POST['email'];
      
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        { $emailErr = "Invalid email format"; }
             }

       if(empty($_POST['userName'])) {
        $userNameErr = "Please fill up the userName properly";
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
           if(empty($_POST['conPassword'])) {
        $conPasswordErr = "Please fill up the password properly";
      }
      else {
        $conPassword = $_POST['conPassword'];
      }
      if($conPassword!==$conPassword)
      {
        $conPasswordErr="Password don't match";
      }

    }


          $f1 = fopen("login.txt", "r");
          $data = fread($f1, filesize("login.txt"));
          fclose($f1);
          $data_after_newline_delimeter = explode("\n", $data);
          $arr1 = array();

        if(isset($_POST['update']))
    {

      $f2 = fopen("login.txt", "w");
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
      $f2 = fopen("login.txt", "w");
      for($j = 0; $j < count($arr1); $j++) {
        $json_encoded = json_encode($arr1[$j]);
        fwrite($f2, $json_encoded . "\n");
      }
      fclose($f2);

    }

  
  }
    ?>
    

    </form>
    
      <br>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" align="center">
      <fieldset style="margin: 0px 700px ;">
        <legend>Basic Information: </legend>
        <br>

        <label for="fname">FirstName:</label>
        <input type="text" name="fname" id="fname" value="<?php echo $firstName;?>">
        <br>
        <p style="color:red"><?php echo $firstNameErr; ?></p>

        <label for="lname">LastName:</label>
        <input type="text" name="lname" id="lname" value="<?php echo $lastName ?>">
        <br>
        <p style="color:red"><?php echo $lastNameErr; ?></p>


        <label for="gender">Choose Gender:</label>

        <input type="radio" name="gender" 
        <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male 

        <input type="radio" name="gender" 
        <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female 

        <input type="radio" name="gender" 
        <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other
        <p style="color:red"><?php echo $genderErr; ?></p>

        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" id="dob" value="<?php echo $dob ?>">
        <br>
        <p style="color:red"><?php echo $dobErr; ?></p>


        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="...@gmail.com" value="<?php echo $email ?>">
        <br>
        <p style="color:red"><?php echo $emailErr; ?></p>

      </fieldset>
      <br>
     
      <fieldset style="margin: 0px 700px ;">

        <legend>User Account Information: </legend>
        <br>

        <label for="id">Id :</label>
       <input type="text" name="id" id="id" value="<?php echo $id; ?>"> 
       <p style="color:red"><?php echo $idErr; ?></p>

        <label for="uname">UserName:</label>
        <input type="text" name="uname" id="uname" value="<?php echo $userName; ?>">
        <br>
        <p style="color:red"><?php echo $userNameErr; ?></p>

        <label for="pass">Password:</label>
        <input type="password" name="password" id="password" value="<?php echo $password; ?>">
        <br>
        <p style="color:red"><?php echo $passwordErr; ?></p>
        
        <label for="conPassword">Re-type Password:</label>
        <input type="password" name="conPassword" id="conPassword" value="<?php echo $conPassword ?>">
        <br>
        <p style="color:red"><?php echo $conPasswordErr; ?></p>

      </fieldset>
      <br>
      
      <input type = "submit" value = "Update Profile" class = "updateUserBtn">
      <input type = "submit" value = "Delete Profile" class = "deleteUserBtn">

      </form>
      <br>
    <div class="footer">
      <?php include 'footer.php';?>
      </div>
    </body>
</html>