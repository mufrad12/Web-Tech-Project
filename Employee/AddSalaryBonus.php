<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">

    <title>Update Salary and Festival Bonus</title>
    
  </head>

  <body>



  <div class="header">
      <?php include 'header.php';?>
  </div>

 <div class = "bg">

  	
	    <h1>Update Salary and Festival Bonus</h1>


	    <?php
	      $userNameErr = $salaryErr = $bonusErr = "" ;

	      
	      $userName= "";
	      $salary= "";
	      $bonus= "";



	      if($_SERVER["REQUEST_METHOD"] == "POST") {

	        if(empty($_POST['uname'])) {
	          $userNameErr = "Please fill up the username properly";
	          }


	        else {
	          $userName = $_POST['uname'];
	        }
            


            if(empty($_POST['salary'])) {
                $salaryErr = "Please fill up the salary properly";
                }


              else {
                $salary = $_POST['salary'];
              }




	        if(empty($_POST['bonus'])) {
	          $bonusErr = "Please fill up the festival bonus properly";
	          }
	        else {
	          $bonus = $_POST['bonus'];
	        }


	     }   
	    ?>





	    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	     
	     
	      <fieldset style="margin: 0px 700px ;">

	        <!-- <legend>Update Salary and Festival Bonus </legend> -->

	        <label for="uname">UserName:</label>

	        <input type="text" name="uname" id="uname" value="<?php echo $userName; ?>">
	        <br>

	        <p style="color:red"><?php echo $userNameErr; ?></p>

	        <label for="salary">Salary:</label>

	        <input type="number" name="salary" id="salary" value="<?php echo $salary; ?>">
	        <br>

	        <p style="color:red"><?php echo $salaryErr; ?></p>
	        

	        <label for="bonus">Festival Bonus:</label>

	        <input type="number" name="bonus" id="bonus" value="<?php echo $bonus ?>">
	        <br>

	        <p style="color:red"><?php echo $bonusErr; ?></p>

	      </fieldset>




			<br>



			<input type="submit" value="Confirm">
            <br>
            <br>
            <br>


            <a href="ShowSalaryBonus.php" title="">See all employee's salary and festival bonus</a>

       
            
			</form>
			<br>

			<?php




			if( $userName != "" && $salary != "" && $bonus != "")
			{
		
				$arr1 = array( 'userName' => $userName, 'salary' =>  $salary, 'bonus' => $bonus);

	    		$json_encoded_text = json_encode($arr1); 





	    		$file1 = fopen("salary.txt", "a");
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