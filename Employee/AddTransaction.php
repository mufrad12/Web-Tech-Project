<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Add In Transaction</title>
  </head>

  <body>

  <div class="header">
      <?php include 'header.php';?>
  </div>


  <div class="bg">
  		

	    <h1>Add In Transaction </h1>




	    <?php
	      $productIdErr = $shopUNameErr = $userUNameErr = $ammountErr = "" ;

	      

	      $productId= "";
	      $shopUName= "";
	      $userUName= "";
	      $ammount= "";


	if($_SERVER["REQUEST_METHOD"] == "POST") {


	        if(empty($_POST['productId'])) {
	          $productIdErr = "Please fill up the Product Id properly";
	          }


	        else {
	          $productId = $_POST['productId'];
	        }
            

            if(empty($_POST['shopUName'])) {
                $shopUNameErr = "Please fill up the Shop Username properly";
                }


              else {
                $shopUName = $_POST['shopUName'];
              }


              if(empty($_POST['userUName'])) {
                $userUNameErr = "Please fill up the User Username properly";
                }


              else {
                $userUName = $_POST['userUName'];
              }


	        if(empty($_POST['ammount'])) {
	          $ammountErr = "Please fill up the ammount properly";
	          }


	        else {
	          $ammount = $_POST['ammount'];
	        }

	     }

	?>

	    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	     


	     
	      <fieldset style="margin: 0px 700px ;">

	        <!-- <legend>Add Transaction History</legend> -->

	        


	        <label for="productId">Product Id:</label>
	        
	        <input type="text" name="productId" id="productId" value="<?php echo $productId; ?>">

	        <br>
	        
	        <p style="color:red"><?php echo $productIdErr; ?></p>




	        <label for="shopUName">Shop Username:</label>

	        <input type="text" name="shopUName" id="shopUName" value="<?php echo $shopUName; ?>">

	        <br>

	        <p style="color:red"><?php echo $shopUNameErr; ?></p>

	        
	        
	          <label for="userUName">User Username:</label>

	        <input type="text" name="userUName" id="userUName" value="<?php echo $userUName; ?>">

	        <br>

	        <p style="color:red"><?php echo $userUNameErr; ?></p>

	        




	        <label for="ammount">ammount:</label>

	        <input type="number" name="ammount" id="ammount" value="<?php echo $ammount ?>" >

	        <br>

	        <p style="color:red"><?php echo $ammountErr; ?></p>

	      </fieldset>



			<br>




			<input type="submit" value="Upload">

            <br>
            <br>
            <br>
            <a href="../employee/ShowTransaction.php" title="">Show Full Transaction History</a>

			</form>

			<br>



			<?php



			if( $productId!= "" && $shopUName != "" && $userUName != "" && $ammount != "")
			{
		
				$arr1 = array( 'productId' => $productId, 'shopUName' =>  $shopUName, 'userUName' => $userUName, 'ammount' => $ammount);

	    		$json_encoded_text = json_encode($arr1); 


	    		$file1 = fopen("../database/transaction.txt", "a");
                
                echo "<br>";

			    fwrite($file1, $json_encoded_text);
                
                fwrite($file1, "\n");

			    fclose($file1);

			}
			
		?>


  </div>




	<div class="footer">


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
		          text-align: center;
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
      border: 1px solid black;
      border-collapse: collapse;
      margin: 0% 50%;
    
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