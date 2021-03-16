<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Payment Option</title>
  </head>
  <body>

    <div class="header">
      <?php include 'header.php';?>
      </div>

    <div class="bg">

    <h1>Payment Receipt</h1>
    <hr>
    
    <?php
        $firstNameErr = $lastNameErr = $addressErr = $cityErr = $stateErr = $postalErr = $dateErr = $paymentErr = $productErr = "" ;

      $firstName = ""; 
      $lastName = "";
      $address = "";
      $city = "";
      $state = "";
      $postal= "";
      $date= "";
      $payment = "";
      $product = "";

      if($_SERVER["REQUEST_METHOD"] == "POST") {

        if(empty($_POST['fname'])) {
          $firstNameErr = "Please fill up the first name properly";
        }
        else {
          $firstName = $_POST['fname'];
        }


        if(empty($_POST['lname'])) {
          $lastNameErr = "Please fill up the last name properly";
        }
        else {
          $lastName = $_POST['lname'];
        }


        if(empty($_POST['address'])) {
          $addressErr = "Please fill up street address";
          }
        else {
          $address = $_POST['address'];
        }


        if(empty($_POST['city'])) {
          $cityErr = "Please fill up the city name";
          }
        else {
          $city = $_POST['city'];
        }


        if(empty($_POST['state'])) {
          $stateErr = "Please fill up the state name";
          }
        else {
          $state = $_POST['state'];
        }


        if(empty($_POST['postal'])) {
          $postalErr = "Please fill up the postal code";
          }
        else {
          $postal = $_POST['postal'];
        }


        if(empty($_POST['date'])) {
          $dateErr = "Please fill up the date properly";
        }
        else {
          $date = $_POST['date'];
        }

        
        if(empty($_POST['payment'])) {
          $paymentErr = "Please fill up the payment Option";
        }
        else {
          $payment = $_POST['payment'];
        }


        if(empty($_POST['product'])) {
          $productErr = "Please check the products";
        }
        else {
          $product = $_POST['product'];
        }


      }

    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

        <br>
        <label for="name"><b>Name</b></label>
        <br>

        <input type="text" style="height:20px" placeholder="First Name" name="fname" id="fname" value="<?php echo $firstName;?>">
        <br>
        <p style="color:red"><?php echo $firstNameErr; ?></p>

        <input type="text" style="height:20px" placeholder="Last Name" name="lname" id="lname" value="<?php echo $lastName ?>">
        <br>
        <p style="color:red"><?php echo $lastNameErr; ?></p>
        <br>

        <label for="add"><b>Address</b></label>
        <br>

        <input type="text" style= "width:300px" placeholder="Street Address" name="address" id="address" value="<?php echo $address ?>">
        <br>
        <p style="color:red"><?php echo $addressErr; ?></p>

        <input type="text" placeholder="City" name="city" id="city" value="<?php echo $city ?>">
        <br>
        <p style="color:red"><?php echo $cityErr; ?></p>

        <input type="text" placeholder="State/Province" name="state" id="state" value="<?php echo $state ?>">
        <br>
        <p style="color:red"><?php echo $stateErr; ?></p>

        <input type="text" placeholder="Postal/Zip Code" name="postal" id="postal" value="<?php echo $postal ?>">
        <br>
        <p style="color:red"><?php echo $postalErr; ?></p>
        <br>

        <label for="date"><b>Date</b></label>
        <br>

        <input type="date" name="date" id="date" value="<?php echo $date ?>">
        <br>
        <p style="color:red"><?php echo $dateErr; ?></p>
        <br>
    
        <label for="payment"><b>Payment Method</b></label>
        <br>

        <input type="radio" name="payment"
        <?php if (isset($payment) && $payment=="card") echo "checked";?>value="card">Card
        <br> 

        <input type="radio" name="payment"
        <?php if (isset($payment) && $payment=="check") echo "checked";?> value="check">Check 
        <br>

        <input type="radio" name="payment"
        <?php if (isset($payment) && $payment=="cash") echo "checked";?> value="cash">Cash
        <br>
        <p style="color:red"><?php echo $paymentErr; ?></p>
        <br>


        <label for="product"><b>My Product</b></label>
        <br>

        <input type="checkbox" name="product"
        <?php if (isset($product) && $product=="a game of thrones") echo "checked";?> value="a game of thrones">A Game of Thrones TK.1800.00
        <br> 

        <input type="checkbox" name="product"
        <?php if (isset($product) && $product=="harry potter") echo "checked";?> value="harry potter">Harry Potter TK.2100.00 
        <br>

        <input type="checkbox" name="product"
        <?php if (isset($product) && $product=="meghpion") echo "checked";?> value="meghpion">MeghPion TK.468.00
        <br>
        <p style="color:red"><?php echo $productErr; ?></p>
        <br>      
        
        <p><b>Total: TK.4368.00</b></p>
        <br>

      <input type="submit" value="Submit">

      </form>
      <br>

      </div>

      <div class="footer">
        <?php include 'footer.php';?>
      </div>

      <style> 
      body, html {
      height: 90%;
      margin: auto;
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

      h1{
        text-align: center;
      }

      form{
        margin-left: 20px;
      }

    </style>

    </body>
</html>