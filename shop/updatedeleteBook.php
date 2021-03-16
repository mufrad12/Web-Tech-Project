<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Update-Delete Book</title>
  </head>
  <body>
  	<div class="header">
      <?php include 'header.php';?>
  </div>
     
    <div class="bg">

    <h1>Book Update/Delete</h1>

    <?php
       $srcAErr = $thumbnailErr =  $idErr = $booktitleErr = $bookauthorErr = $bookpublisherErr = $bookeditionErr = $bookpriceErr ="";

      $srcA = "";
      $thumbnail = "";
      $id = "";
      $booktitle = ""; 
      $bookauthor = "";
      $bookpublisher = "";
      $bookedition= "";
      $bookprice= "";
      $flag = 0;
      $searchKey = "";

      if(isset($_POST['src'])){
          if($_SERVER["REQUEST_METHOD"] == "POST"){

          if(empty($_POST['srcA'])) {
            $srcAErr = "Please fill up the book userName";
          }
          else {
            $srcA = $_POST['srcA'];
          }
          
         }

      $f1 = fopen("../database/bookData.txt", "r");
      $data = fread($f1, filesize("../database/bookData.txt"));
      fclose($f1);
      $data_after_newline_delimeter = explode("\n", $data);
      $arr1 = array();
      $searchKey = $srcA;

      for($i = 0; $i < count($data_after_newline_delimeter) - 1; $i++) {
        $json_decoded = json_decode($data_after_newline_delimeter[$i], true);
        if($json_decoded['id'] === $searchKey && $json_decoded['sUname'] === $_SESSION['userNameV'])
        {
          echo $srcA." found";
          $flag=1;
          $thumbnail = $json_decoded['thumbnail']; 
          $id = $json_decoded['id']; 
          $booktitle = $json_decoded['booktitle']; 
          $bookauthor = $json_decoded['bookauthor']; 
          $bookpublisher= $json_decoded['bookpublisher']; 
          $bookedition= $json_decoded['bookedition']; 
          $bookprice = $json_decoded['bookprice']; 
        }
          }
          if($flag==0)
          echo $srcA." not found";
      }

      if((isset($_POST['update']))||(isset($_POST['delete'])))
        {

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

        $f1 = fopen("../database/bookData.txt", "r");
        $data = fread($f1, filesize("../database/bookData.txt"));
        fclose($f1);
        $data_after_newline_delimeter = explode("\n", $data);
        $arr1 = array();
        $searchKey = $id;

      if(isset($_POST['update']))
        {

      for($i = 0; $i < count($data_after_newline_delimeter) - 1; $i++) {
        $json_decoded = json_decode($data_after_newline_delimeter[$i], true);
        if($json_decoded['id'] === $searchKey && $json_decoded['sUname'] === $_SESSION['userNameV'])
        {

          $arr2 = array(
            'thumbnail' => $thumbnail,
            'booktitle' => $booktitle,
            'bookauthor' => $bookauthor,
            'id' => $json_decoded['id'],
            'bookpublisher' => $bookpublisher,
            'bookedition' => $bookedition,
            'bookprice' => $bookprice
          );
          array_push($arr1, $arr2);
        }

        else
        {
          array_push($arr1, $json_decoded);
        }
      }

      $f2 = fopen("../database/bookData.txt", "w");
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
        if($json_decoded['id'] !== $searchKey && $json_decoded['sUname'] === $_SESSION['userNameV']) {
          array_push($arr1, $json_decoded);
        }

      }
      $f2 = fopen("../database/bookData.txt", "w");
      for($j = 0; $j < count($arr1); $j++) {
        $json_encoded = json_encode($arr1[$j]);
        fwrite($f2, $json_encoded . "\n");
      }
      fclose($f2);

    }

  }

?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

     <label for="srcA">Search Book:</label>
        <input type="search" name="srcA" id="srcA" value="<?php echo $srcA;?>" placeholder="search here">

        <input type="submit" name="src" value="Search" class="srcAserBtn">
        <p style="color:red"><?php echo $srcAErr; ?></p>

      </form>
      <br>


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
      
       <input type="submit" name="update" value="Update" class="updateBookBtn" style="margin-left: 40%;">
      <input type="submit" name="delete" value="Delete" class="deleteBookBtn">

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