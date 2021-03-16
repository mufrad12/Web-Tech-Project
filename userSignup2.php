<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>User Sign Up</title>
  </head>
  <body>

    <div class="header">
        <?php include 'header2.php';?>
    </div>

    <div class="bg">

      <h1>User Sign Up</h1>

      <?php
          $firstNameErr = $lastNameErr = $genderErr =  $dobErr = $emailErr = $userNameErr = $passwordErr = $conPasswordErr = "" ;

        $firstName = ""; 
        $lastName = "";
        $gender = "";
        $dob = "";
        $email = "";
        $userName= "";
        $password= "";
        $conPassword = "";

        if($_SERVER["REQUEST_METHOD"] == "POST") {
          if(empty($_POST['fname'])) {
            $firstNameErr = "Please fill up the first name properly";
          }
          else {
            $firstName = $_POST['fname'];
          }

          if(empty($_POST['lname'])) {
            $lastNameErr = "Please fill up the last name properly";
          }
          else {
            $lastName = $_POST['lname'];
          }

          if(empty($_POST['dob'])) {
            $dobErr = "Please fill up the date of birth properly";
          }
          else {
            $dob = $_POST['dob'];
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
          $conPasswordErr = "Recovery Email is required";
          }
          else {
            $conPassword = $_POST['conPassword'];
          
               if (!($conPassword == $password)) 
            { $conPasswordErr = "Password not matched"; }
          }

          if (empty($_POST['gender'])) {
                 $genderErr = "Gender is required"; 
          } 

          else { 
            $gender = $_POST['gender']; 
          }
          }

      ?>
      

      </form>
      <br>


      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <fieldset>
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
       
        <fieldset>

          <legend>User Account Information: </legend>
          <br>

          <label for="uname">UserName:</label>
          <input type="text" name="uname" id="uname" value="<?php echo $userName; ?>">
          <br>
          <p style="color:red"><?php echo $userNameErr; ?></p>

          <label for="pass">Password:</label>
          <input type="password" minlength='4' name="password" id="password" value="<?php echo $password; ?>">
          <br>
          <p style="color:red"><?php echo $passwordErr; ?></p>
          
          <label for="conPassword">Re-type Password:</label>
          <input type="password" minlength='4' name="conPassword" id="conPassword" value="<?php echo $conPassword ?>">
          <br>
          <p style="color:red"><?php echo $conPasswordErr; ?></p>

        </fieldset>
        <br>

        <center>

          <input type="submit" value="Submit">
          
        </center>
        

        </form>
        <br>

        <?php

        if($firstName != "" && $lastName != "" && $gender != "" && $dob != "" && $email != "" && $userName != "" && $password != "" && $conPassword != "")
        {
      
          $arr1 = array('firstName' => $firstName, 'lastName' => $lastName, 'gender' => $gender, 'dob' => $dob, 'email' => $email, 'userName' => $userName, 'password' => $password, 'conPassword' => $conPassword);

            $json_encoded_text = json_encode($arr1); 

            $file1 = fopen("database/user.txt", "a");
            fwrite($file1, $json_encoded_text);
            fwrite($file1, "\n");

            fclose($file1);

        }

        ?>
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

      fieldset{
        width: 20%;
        margin-left: auto;
        margin-right: auto;
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