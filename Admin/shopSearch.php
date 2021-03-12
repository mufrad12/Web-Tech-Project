<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Search Shop</title>
  </head>
  <body>
    <div class="header">
      <?php include 'header.php';?>
    </div>

    <div class="bg">

    <h1>Search Shop</h1>

    <?php
      $srcSErr = "";

      $srcS = "";
      

       if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty($_POST['srcS'])) {
          $srcSErr = "Please fill up the Shop username";
        }
        else {
          $srcS = $_POST['srcS'];
        }

       }

    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

      <label for="srcS">Search Shop:</label>
      <input type="search" name="srcS" id="srcS" value="<?php echo $srcS;?>">

      <input type="submit" value="Search" class="srcSmployeeBtn">
      <p style="color:red"><?php echo $srcSErr; ?></p>

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