<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Add In Statements</title>
  </head>

  <body>

  <div class="header">
      <?php include 'header.php';?>
  </div>


  <div class="bg">
  		

	    <h1>Add In Statements </h1>




	    <?php
	      $dateErr = $expenditureErr = $ammountErr = "" ;

	      

	      $date= "";
	      $expenditure= "";
	      $ammount= "";


	if($_SERVER["REQUEST_METHOD"] == "POST") {


	        if(empty($_POST['date'])) {
	          $dateErr = "Please fill up the date properly";
	          }


	        else {
	          $date = $_POST['date'];
	        }
            

            if(empty($_POST['expenditure'])) {
                $expenditureErr = "Please fill up the expenditure properly";
                }


              else {
                $expenditure = $_POST['expenditure'];
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

	        <!-- <legend>Add Income Statement</legend> -->

	        


	        <label for="date">Date:</label>
	        
	        <input type="date" name="date" id="date" value="<?php echo $date; ?>">

	        <br>
	        
	        <p style="color:red"><?php echo $dateErr; ?></p>




	        <label for="expenditure">Expenditure:</label>

	        <input type="text" name="expenditure" id="expenditure" value="<?php echo $expenditure; ?>">

	        <br>

	        <p style="color:red"><?php echo $expenditureErr; ?></p>

	        
	        
	        <label for="ammount">Ammount:</label>

	        <input type="number" name="ammount" id="ammount" placeholder="put (-) for expenses" value="<?php echo $ammount ?>" >

	        <br>

	        <p style="color:red"><?php echo $ammountErr; ?></p>

	      </fieldset>



			<br>




			<input type="submit" value="Update">

            <br>
            <br>
            <br>
            <a href="ShowStatement.php" title="">Show Full Statement</a>

			</form>

			<br>



			<?php



			if( $date!= "" && $expenditure != "" && $ammount != "")
			{
		
				$arr1 = array( 'date' => $date, 'expenditure' =>  $expenditure, 'ammount' => $ammount);

	    		$json_encoded_text = json_encode($arr1); 


	    		$file1 = fopen("statement.txt", "a");
                
                echo "<br>";

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
		        margin: 0;
		        color: white;
		        }

		        .bg {
		          background-image: url('bg.jpg');
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