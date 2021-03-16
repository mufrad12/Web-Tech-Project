<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Orders</title>
  </head>
  <body>

    <div class="header">
        <?php include 'header.php';?>
    </div>

    <div class="bg">

      <br>
    	<h1>Customer Orders</h1>

      <?php
      
        $userErr = "" ;


        $user = "";
        $flag = 0; 
        $f = 0;

        if(isset($_POST['cart'])){
          if($_SERVER["REQUEST_METHOD"] == "POST"){

            if(empty($_POST['user'])) {
              $userErr = "Please fill a valid user username";
            }
            else {
              $user = $_POST['user'];
              $f = 1;
            }
          }

          $f1 = fopen("../database/cart.txt", "r");
          $data = fread($f1, filesize("cart.txt"));
          fclose($f1);
          $data_after_newline_delimeter = explode("\n", $data);
          $arr1 = array();
          $searchKey = $user;

          for($i = 0; $i < count($data_after_newline_delimeter) - 1; $i++) {
            $json_decoded = json_decode($data_after_newline_delimeter[$i], true);
            if($json_decoded['userUName'] !== $searchKey) {
              array_push($arr1, $json_decoded);
            }

          }
          $f2 = fopen("../database/cart.txt", "w");
          for($j = 0; $j < count($arr1); $j++) {
            $json_encoded = json_encode($arr1[$j]);
            fwrite($f2, $json_encoded . "\n");
          }
          fclose($f2);


        }

      ?>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

      <label for="crtB">Delete Cart:</label>
      <input type="text" name="user" id="user" value="<?php echo $user;?>">

      <input type="submit" name="cart" value="Delete from Cart" class="srcDCartBtn">
      <p style="color:red"><?php echo $userErr; ?></p>

      </form>
      <br>

      <?php

        $f1 = fopen("../database/cart.txt", "r");
        $data = fread($f1, filesize("../database/cart.txt"));
        fclose($f1);
        $data_after_newline_delimeter = explode("\n", $data);

        echo '<table>
                    <tr>
                      <th>Book ID</th>
                      <th>User Username</th>
                      <th>Shop Username</th>
                      <th>Price</th>
                    </tr>';

        for($i = 0; $i < count($data_after_newline_delimeter) - 1; $i++)
        {
          $json_decoded = json_decode($data_after_newline_delimeter[$i], true);

           echo "<tr>";

            echo "<td>" . $json_decoded['id'] . "</td>";

            echo "<td>" . $json_decoded['userUName'] . "</td>";

            echo "<td>" . $json_decoded['shopUName'] . "</td>";

            echo "<td>" . $json_decoded['price'] . "</td>";
            echo "</tr>";

            }

          echo "</table>";
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

      table, th, td 
      {
        border: 1px solid white;
        border-collapse: collapse;
        margin: auto;
      }
      th, td {
        padding: 15px;
        width: 150px;
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