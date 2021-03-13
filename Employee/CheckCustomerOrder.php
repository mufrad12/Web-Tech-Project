<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Search Order</title>
  </head>
  <body>
    <div class="header">
      <?php include 'header.php';?>
    </div>

    <div class="bg">

    <h1>Search Order</h1>

    <?php
      $srcOErr = "";

      $srcO = "";
      

       if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty($_POST['srcO'])) {
          $srcOErr = "Please fill up the Order ID";
        }
        else {
          $srcO = $_POST['srcO'];
        }

       }

    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

      <label for="srcO">Search Order:</label>
      <input type="search" name="srcO" id="srcO" value="<?php echo $srcO;?>">

      <input type="submit" value="Search" class="srcOmployeeBtn">
      <p style="color:red"><?php echo $srcOErr; ?></p>

    </form>
    <br>


<form >
    <fieldset style="text-align: center">
      <legend> Order Details:</legend>

       <label for="orderId">Order ID :</label> 
       <input type="text" disabled> 
      <br>
      
       <br>
       <label for="shopId">Shop ID :</label>
       <input type="text" disabled> 
      <br>
       <br>

       <label for="userId">User ID :</label>
       <input type="text" disabled> 
      <br>
       <br>
      

       <label for="ammount">Ammount :</label>
       <input type="text" disabled> 
      <br>
    
       <br>
  
       
    </fieldset>

  </div>


  <div class="mid">

       

  </div>

    <div class="footer">
      <?php include '..\Admin\footer.php';?>
    </div>
    

   <style>
        body, html {
        height: 90%;
        margin: 0;
        color: white;
        }

        .bg {
          background-image: url('bg.jpg');
          min-height: 100%; 
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          margin: 40;
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