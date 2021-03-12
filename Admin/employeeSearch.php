<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Search an Employee</title>
  </head>
  <body>
    <div class="header">
      <?php include 'header.php';?>
    </div>
    
    <div class="bg">

    <h1>Search an Employee</h1>

    <?php
      $srcEErr = "" ;

      $srcE = "";
      

       if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty($_POST['srcE'])) {
          $srcEErr = "Please fill up the employee username";
        }
        else {
          $srcE = $_POST['srcE'];
        }

       }

    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

      <label for="srcE">Search Employee:</label>
      <input type="search" name="srcE" id="srcE" value="<?php echo $srcE;?>">

      <input type="submit" value="Search" class="srcEmployeeBtn">
      <p style="color:red"><?php echo $srcEErr; ?></p>

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