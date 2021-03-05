<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Search User</title>
  </head>
  <body>
    <div class="bg">

    <h1>Search User</h1>

    <?php
      $srcUErr = "" ;

      $srcU = "";
      

       if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty($_POST['srcU'])) {
          $srcUErr = "Please fill up the User username";
        }
        else {
          $srcU = $_POST['srcU'];
        }

       }

    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

      <label for="srcU">Search User:</label>
      <input type="search" name="srcU" id="srcU" value="<?php echo $srcU;?>">

      <input type="submit" value="Search" class="srcUmployeeBtn">
      <p style="color:red"><?php echo $srcUErr; ?></p>

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