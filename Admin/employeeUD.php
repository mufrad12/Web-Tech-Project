<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Employee Update/Delete</title>
  </head>
  <body>
    
    <div class="header">
      <?php include 'header.php';?>
  </div>

    <div class="bg">

      <h1>Employee Update/Delete</h1>

      <?php
        $srcEErr = $firstNameErr = $lastNameErr = $genderErr = $dobErr =  $emailErr = $idErr = $userNameErr = $passwordErr = $conPasswordErr = "" ;


        $srcE = "";
        $firstName = ""; 
        $lastName = "";
        $gender = "";
        $dob = "";
        $email = "";
        $id = "";
        $userName= "";
        $password= "";
        $conPassword = "";
        $flag = 0;
        $searchKey = "";

        if(isset($_POST['src'])){
          if($_SERVER["REQUEST_METHOD"] == "POST"){

          if(empty($_POST['srcE'])) {
            $srcEErr = "Please fill up the Employee username";
          }
          else {
            $srcE = $_POST['srcE'];
          }

         }


          $f1 = fopen("employee.txt", "r");
          $data = fread($f1, filesize("employee.txt"));
          fclose($f1);
          $data_after_newline_delimeter = explode("\n", $data);
          $arr1 = array();
          $searchKey = $srcE;

          for($i = 0; $i < count($data_after_newline_delimeter) - 1; $i++) {
            $json_decoded = json_decode($data_after_newline_delimeter[$i], true);
            if($json_decoded['userName'] === $searchKey)
            {
              echo $srcE." found";
              $flag=1;
              $firstName = $json_decoded['firstName']; 
              $lastName = $json_decoded['lastName'];
              $gender = $json_decoded['gender'];
              $dob = $json_decoded['dob'];
              $email = $json_decoded['email']; 
              $id = $json_decoded['id']; 
              $userName= $json_decoded['userName']; 
              $password= $json_decoded['password']; 
              $conPassword = $json_decoded['conPassword']; 
            }
              }
              if($flag==0)
              echo $srcE." not found";
      }


        if((isset($_POST['update']))||(isset($_POST['delete'])))
        {

            if($_SERVER["REQUEST_METHOD"] == "POST") {

            if(empty($_POST['id'])) {
              $idErr = "Please fill up the id properly";
            }
            else {
              $id = $_POST['id'];
            }

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

        $f1 = fopen("employee.txt", "r");
        $data = fread($f1, filesize("employee.txt"));
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
                'firstName' => $firstName,
                'lastName' => $lastName,
                'gender' => $gender,
                'dob' => $dob,
                'email' => $email,
                'id' => $json_decoded['id'],
                'userName' => $json_decoded['userName'],
                'password' => $password,
                'conPassword' => $conPassword
              );
              array_push($arr1, $arr2);
            }

            else
            {
              array_push($arr1, $json_decoded);
            }
          }

          $f2 = fopen("employee.txt", "w");
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
          $f2 = fopen("employee.txt", "w");
          for($j = 0; $j < count($arr1); $j++) {
            $json_encoded = json_encode($arr1[$j]);
            fwrite($f2, $json_encoded . "\n");
          }
          fclose($f2);

        }

        }
        
      ?>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

        <label for="srcE">Search Employee:</label>
        <input type="search" name="srcE" id="srcE" value="<?php echo $srcE;?>" placeholder="search here">

        <input type="submit" name="src" value="Search" class="srcEserBtn">
        <p style="color:red"><?php echo $srcEErr; ?></p>

      </form>
      <br>


      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <fieldset style="margin: 0% 40%;">
          <legend>Basic Information: </legend>



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
       
        <fieldset style="margin: 0% 40%;">

          <legend>Employee Account Information: </legend>

          <label for="id">ID:</label>
          <input type="text" name="id" id="id" value="<?php echo $id;?>" >
          <br>
          <p style="color:red"><?php echo $idErr; ?></p>

          <label for="uname">UserName:</label>
          <input type="text" name="uname" id="uname" value="<?php echo $userName; ?>" >
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

      <input type="submit" name="update" value="Update" class="updateEmployeeBtn" style="margin-left: 40%;">
      <input type="submit" name="delete" value="Delete" class="deleteEmployeeBtn">

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
          background-image: url('http://sfwallpaper.com/images/background-wallpaper-for-website-1.jpg');
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