<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Update-Delete Book</title>
  </head>
  <body>
 <center>

    <h1>Book Management</h1>

    <?php
        $thumbnailErr = $bookIdErr = $booktitleErr = $bookauthorErr = $bookpublisherErr = $bookeditionErr = "";

      $thumbnail = "";
      $bookId = "";
      $booktitle = ""; 
      $bookauthor = "";
      $bookpublisher = "";
      $bookedition= ""; 

       if($_SERVER["REQUEST_METHOD"] == "POST") {

        if(empty($_POST['thumbnail'])) {
          $thumbnailErr = "Please fill up book thumbnail properly";
        }
        else {
          $thumbnail = $_POST['thumbnail'];
        }

        if(empty($_POST['bookId'])) {
          $bookIdErr = "Please fill up book book id properly";
        }
        else {
          $bookId = $_POST['bookId'];
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
        
      }

    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
      <fieldset style="margin: 0px 600px ;">
        <legend>Book Information: </legend>

        <label for="thumbnail">Book Thumbnail:</label>
        <input type="text" name="thumbnail" id="thumbnail" value="<?php echo $thumbnail;?>">
        <br>
        <p style="color:red"><?php echo $thumbnailErr; ?></p>

        <label for="bookId">Book Id:</label>
        <input type="text" name="bookId" id="bookId" value="<?php echo $bookId;?>"disabled>
        <br>
        <p style="color:red"><?php echo $bookIdErr; ?></p>

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


      </fieldset>
      <br>
      
      <input type="submit" value="Update Book" class="updateBookBtn">
      <input type="submit" value="Delete Book" class="deleteBookBtn">

      </form>
      <br>
     </center>
    </body>
</html>