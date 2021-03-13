<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">

    <title>Send Salary Report</title>
    
  </head>

  <body>



  <div class="header">
      <?php include 'header.php';?>
  </div>

 <div class = "bg">

  	
	    <h1>Send Salary Report</h1>


	    <?php
	      $monthErr = $salaryErr = "" ;

	      
	      $userName= $_SESSION['userNameV'];
	      $month = "";
	      $salary= "";
	   


	      if($_SERVER["REQUEST_METHOD"] == "POST") {

	        

            if(empty($_POST['month'])) {
	          $monthErr = "Please fill up the month properly";
	          }


	        else {
	          $month = $_POST['month'];
	        }


            if(empty($_POST['salary'])) {
                $salaryErr = "Please fill up the salary properly";
                }


              else {
                $salary = $_POST['salary'];
              }





	     }   
	    ?>





	    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	     
	     
	      <fieldset style="margin: 0px 700px ;">

	        <!-- <legend>Update Salary and Festival Bonus </legend> -->

	        <label for="uname">UserName:</label>
	        <input type="text" name="uname" id="uname" value="<?php echo $userName; ?>" disabled>
	        <br>




	        <label for="month">Month:</label>
	        <input type="month" name="month" id="month" value="<?php echo $month; ?>">
	        <br>
	        <p style="color:red"><?php echo $monthErr; ?></p>




	        <label for="salary">Salary:</label>

	        <input type="number" name="salary" id="salary" value="<?php echo $salary; ?>">
	        <br>

	        <p style="color:red"><?php echo $salaryErr; ?></p>
	        

	      </fieldset>




			<br>



			<input type="submit" value="Send">
            <br>
            

       
            
			</form>
			<br>

			<?php




			if( $userName != "" && $month != "" && $salary != "")
			{
		
				$arr1 = array( 'userName' => $userName, 'month' => $month, 'salary' =>  $salary);

	    		$json_encoded_text = json_encode($arr1); 





	    		$file1 = fopen("SalaryReport.txt", "a");
                echo "<br>";
			    fwrite($file1, $json_encoded_text);
                fwrite($file1, "\n");

			    fclose($file1);

			}
			
			?>
	

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
      margin: 0% 40%;
    
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