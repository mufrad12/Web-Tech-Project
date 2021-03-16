<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Book List</title>
  </head>
  <body>

    <div class="header">
        <?php include 'header.php';?>
    </div>

    <div class="bg">



      <br>
    	<h1>Book List</h1>
      <br>

      <?php
      
        $bookIdErr = "" ;


        $bookId = "";
        $userUName = $_SESSION['userNameV'];
        $shopUName = "";
        $price = "";
        $flag = 0; 
        $f = 0;

        if(isset($_POST['cart'])){
        if($_SERVER["REQUEST_METHOD"] == "POST"){

          if(empty($_POST['crtB'])) {
            $bookIdErr = "Please fill a valid Book ID";
          }
          else {
            $bookId = $_POST['crtB'];
            $f = 1;
          }

        }

<<<<<<< HEAD
        $f1 = fopen("../database/bookData.txt", "r");
        $data = fread($f1, filesize("../database/bookData.txt"));
=======
        $f1 = fopen("bookData.txt", "r");
        $data = fread($f1, filesize("bookData.txt"));
>>>>>>> a9d7fed09f8ddd5f97a1e70ffd507e4b64797313
        fclose($f1);
        $data_after_newline_delimeter = explode("\n", $data);
        $arr1 = array();

        for($i = 0; $i < count($data_after_newline_delimeter) - 1; $i++) {
          $json_decoded = json_decode($data_after_newline_delimeter[$i], true);
          if($json_decoded['id'] === $bookId)
          {
            $flag=1;

            $bookId = $json_decoded['id']; 
            $shopUName = $json_decoded['sUname'];
            $price = $json_decoded['bookprice'];
          }
        }

        if($flag==0)
          echo $bookId." not found";

        else if($flag == 1)
        {
          $arr2 = array(
            'id' => $bookId,
            'userUName' => $userUName,
            'shopUName' => $shopUName,
            'price' => $price
          );
          array_push($arr1, $arr2);

<<<<<<< HEAD
          $f2 = fopen("../database/cart.txt", "a");
=======
          $f2 = fopen("cart.txt", "a");
>>>>>>> a9d7fed09f8ddd5f97a1e70ffd507e4b64797313
         
            
          $json_encoded = json_encode($arr1[0]);
          fwrite($f2, $json_encoded . "\n");
          
          fclose($f2);
        }
          

        }

      ?>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

      <label for="crtB">Cart Book:</label>
      <input type="text" name="crtB" id="crtB" value="<?php echo $bookId;?>">

      <input type="submit" name="cart" value="Add to Cart" class="srcBmployeeBtn">
      <p style="color:red"><?php echo $bookIdErr; ?></p>

    </form>
    <br>

      <?php

<<<<<<< HEAD
        $f1 = fopen("../database/bookData.txt", "r");
        $data = fread($f1, filesize("../database/bookData.txt"));
=======
        $f1 = fopen("bookData.txt", "r");
        $data = fread($f1, filesize("bookData.txt"));
>>>>>>> a9d7fed09f8ddd5f97a1e70ffd507e4b64797313
        fclose($f1);
        $data_after_newline_delimeter = explode("\n", $data);

        echo '<table>
                    <tr>
                      <th>Book Thumbnail</th>
                      <th>Book Id</th>
                      <th>Book Title</th>
                      <th>Book Author</th>
                      <th>Book Publisher</th>
                      <th>Book Edition </th>
                      <th>Book Price</th>
                      <th>Book Store Name </th>
                    </tr>';

        for($i = 0; $i < count($data_after_newline_delimeter) - 1; $i++)
        {
          $json_decoded = json_decode($data_after_newline_delimeter[$i], true);

           echo "<tr>";

<<<<<<< HEAD
           echo '<td> <img src="../images/'. $json_decoded['thumbnail'] . '" alt="The Adventures of Sherlock Holmes" width="200" height="200" > </td>';
=======
           echo '<td> <img src="'. $json_decoded['thumbnail'] . '" alt="The Adventures of Sherlock Holmes" width="200" height="200" > </td>';
>>>>>>> a9d7fed09f8ddd5f97a1e70ffd507e4b64797313

            echo "<td>" . $json_decoded['id'] . "</td>";

            echo "<td>" . $json_decoded['booktitle'] . "</td>";

            echo "<td>" . $json_decoded['bookauthor'] . "</td>";

            echo "<td>" . $json_decoded['bookpublisher'] . "</td>";

            echo "<td>" . $json_decoded['bookedition'] . "</td>";

            echo "<td>" . $json_decoded['bookprice'] . "</td>";

            echo "<td>" . $json_decoded['sUname'] . "</td>";

            echo "</tr>";

            }

          echo "</table>";
          echo "<br>"
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
<<<<<<< HEAD
        background-image: url('../images/about3.jpg');
=======
        background-image: url('about3.jpg');
>>>>>>> a9d7fed09f8ddd5f97a1e70ffd507e4b64797313
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

      table, th, td 
      {
        border: 1px solid white;
        border-collapse: collapse;
        margin: 0% 20%;
      }
      th, td {
        padding: 15px;
      }

      th {
        text-align: center;
      }

      td {
        text-align: center;
      }

    </style>

    </body>
</html>