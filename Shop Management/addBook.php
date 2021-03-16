<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Add Book </title>
  </head>
  <body>
     <div class="header">
      <?php include 'header.php';?>
  </div>

    <div class="bg">
 
    <h1>Book Management</h1>

    <?php
      $thumbnailErr =  $idErr = $booktitleErr = $bookauthorErr = $bookpublisherErr = $bookeditionErr = $bookpriceErr ="";

      $thumbnail = "";
      $id = "";
      $booktitle = ""; 
      $bookauthor = "";
      $bookpublisher = "";
      $bookedition= "";
      $bookprice= "";
      $flag = 0;
      $sUname = $_SESSION['userNameV'];



    
      if($_SERVER["REQUEST_METHOD"] == "POST") {

        if(empty($_POST['thumbnail'])) {
          $thumbnailErr = "Please fill up book thumbnail properly";
        }
        else {
          $thumbnail = $_POST['thumbnail'];
        }

         if(empty($_POST['id'])) {
          $idErr = "Please fill up id properly";
        }
        else {
          $id = $_POST['id'];
        }

        if(empty($_POST['booktitle'])) {
          $booktitleErr = "Please fill up book title properly";
        }
        else {
          $booktitle = $_POST['booktitle'];
        }

        if(empty($_POST['bookauthor'])) {
          $bookauthorErr = "Please fill up the book author properly";
        }
        else {
          $bookauthor = $_POST['bookauthor'];
        }

        if(empty($_POST['bookpublisher'])) {
          $bookpublisherErr = "Please fill up the book publisher properly";
        }
        else {
          $bookpublisher = $_POST['bookpublisher'];
        }

        if(empty($_POST['bookedition'])) {
          $bookeditionErr = "Please fill up the book edition properly";
          }
        else {
          $bookedition = $_POST['bookedition'];
        }

        if(empty($_POST['bookprice'])) {
          $bookpriceErr = "Please fill up the book price properly";
          }
        else {
          $bookprice = $_POST['bookprice'];
        }
        
      }

    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
         
        <fieldset style="margin: 0% 40%;">
        <legend>Book Information: </legend>

        <label for="thumbnail">Book Thumbnail:</label>
        <input type="text" name="thumbnail" id="thumbnail" value="<?php echo $thumbnail;?>">
        <br>
        <p style="color:red"><?php echo $thumbnailErr; ?></p>

       <label for="id">Book Id:</label>
        <input type="text" name="id" id="id" value="<?php echo $id;?>">
        <br>
        <p style="color:red"><?php echo $idErr; ?></p>

        <label for="booktitle">Book Title:</label>
        <input type="text" name="booktitle" id="booktitle" value="<?php echo $booktitle;?>">
        <br>
        <p style="color:red"><?php echo $booktitleErr; ?></p>

        <label for="bookauthor">Book Author:</label>
        <input type="text" name="bookauthor" id="bookauthor" value="<?php echo $bookauthor ?>">
        <br>
        <p style="color:red"><?php echo $bookauthorErr; ?></p>

        <label for="bookpublisher">Book Publisher:</label>
        <input type="text" name="bookpublisher" id="bookpublisher" value="<?php echo $bookpublisher ?>">
        <br>
        <p style="color:red"><?php echo $bookpublisherErr; ?></p>

        <label for="bookedition">Book Edition:</label>
        <input type="text" name="bookedition" id="bookedition" value="<?php echo $bookedition ?>">
        <br>
        <p style="color:red"><?php echo $bookeditionErr; ?></p>

        <label for="bookprice">Book Price:</label>
        <input type="text" name="bookprice" id="bookprice" value="<?php echo $bookprice ?>">
        <br>
        <p style="color:red"><?php echo $bookpriceErr; ?></p>

      </fieldset>
      <br>
      
      <input type="submit" value="Add" class="addBookBtn"  style="margin: 0% 40%;">
      
      </form>
      <br>

      <?php

      if($thumbnail != "" && $id != "" && $booktitle != "" && $bookauthor != "" && $bookpublisher != "" && $bookedition != "" && $bookprice != "")
      {
    
        $arr1 = array('thumbnail' => $thumbnail, 'id' => $id, 'booktitle' => $booktitle, 'bookauthor' => $bookauthor, 'bookpublisher' => $bookpublisher, 'bookedition' =>  $bookedition, 'bookprice' => $bookprice,'sUname' => $sUname );

            $json_encoded_text = json_encode($arr1); 
            
            $file1 = fopen("bookData.txt", "a");
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
        margin: 0px;
        color: white;
        }

        .bg {
          background-image: url('about3.jpg');
          height: 100%; 
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