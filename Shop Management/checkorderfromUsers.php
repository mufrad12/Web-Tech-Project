<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Customer Order List</title>
  </head>
  <body>
  <center>
    <h1>Customer Order List</h1>

    <?php
    $customerNameErr = $customerEmailErr = $customerLocationErr = $orderItemErr =  $orderPriceErr = $orderQuantityErr = "";


      $customerName = "";
      $customerEmail = "";
      $customerLocation = ""; 
      $orderItem = "";
      $orderPrice= "";
      $orderQuantity= "";


       if($_SERVER["REQUEST_METHOD"] == "POST") {

        if(empty($_POST['customerName'])) {
          $customerNameErr = "Please fill up customer name properly";
        }
        else {
          $customerName = $_POST['customerName'];
        }

        if(empty($_POST['customerEmail'])) {
        $customerEmailErr = "Customer Email is required";
        }
        else {
        $customerEmail = $_POST['customerEmail'];
      
        if (!filter_var($customerEmail, FILTER_VALIDATE_EMAIL)) 
        { $customerEmailErr = "Invalid customer email format"; }
             }

        if(empty($_POST['customerLocation'])) {
          $customerLocationErr = "Please fill up customer Location properly";
        }
        else {
          $customerLocation = $_POST['customerLocation'];
        }

        if(empty($_POST['orderItem'])) {
          $orderItemErr = "Please fill up the order item properly";
        }
        else {
          $orderItem = $_POST['orderItem'];
        }

        if(empty($_POST['orderPrice'])) {
          $orderPriceErr = "Please fill up the order price properly";
        }
        else {
          $orderPrice = $_POST['orderPrice'];
        }

         if(empty($_POST['orderQuantity'])) {
          $orderQuantityErr = "Please fill up the order quantity properly";
        }
        else {
          $orderQuantity = $_POST['orderQuantity'];
        }

      }

    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
      <fieldset style="margin: 0px 600px ;">
        <legend>Customer Information: </legend>

        <label for="customerName">Customer Name:</label>
        <input type="text" name="customerName" id="customerName" value="<?php echo $customerName;?>">
        <br>
        <p style="color:red"><?php echo $customerNameErr; ?></p>

        <label for="customerEmail">Customer Email :</label>
        <input type="email" name="customerEmail" id="customerEmail" value="<?php echo $customerEmail ?>">
        <br>
        <p style="color:red"><?php echo $customerEmailErr; ?></p>
        

        <label for="customerLocation">Customer Location:</label>
        <input type="text" name="customerLocation" id="customerLocation" value="<?php echo $customerLocation;?>">
        <br>
        <p style="color:red"><?php echo $customerLocationErr; ?></p>


        </fieldset>
    
        <fieldset style="margin: 0px 600px ;">
        <legend>Order Information: </legend>

        <label for="orderItem ">Order Id :</label>
        <input type="text" name="orderItem " id="orderItem " value="<?php echo $orderItem  ?>">
        <br>
        <p style="color:red"><?php echo $orderItemErr; ?></p>

        <label for="orderPrice">Order Price:</label>
        <input type="text" name="orderPrice" id="orderPrice" value="<?php echo $orderPrice ?>">
        <br>
        <p style="color:red"><?php echo $orderPriceErr; ?></p>


        <label for="orderQuantity">Order Quantity:</label>
        <input type="text" name="orderQuantity" id="orderQuantity" value="<?php echo $orderQuantity ?>">
        <br>
        <p style="color:red"><?php echo $orderQuantity; ?></p>


      </fieldset>
      <br>
      
      <input type="submit" value="Confirm Order" class="confirmOrderBtn">
      <input type="submit" value="Delete Order" class="deleteOrderBtn">

      </form>
      <br>
    </center>
    </body>
</html>