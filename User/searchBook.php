<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Search Book</title>
  </head>
  <body>
   <center>
    <h1>Search Book</h1>

    <?php
      $srcErr = "";

      $src = "";

       if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty($_POST['src'])) {
          $srcErr = "Please fill up the Book ID";
        }
        else {
          $src = $_POST['src'];
        }

       }
      

    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

      <label for="src">Book ID: </label>
      <input type="search" name="src" id="src" value="<?php echo $src;?>">

      <input type="submit" value="Search" class="srcBookBtn">
      <p style="color:red"><?php echo $srcErr; ?></p>

    </form>
    <br>
  </center>
    </body>
</html>