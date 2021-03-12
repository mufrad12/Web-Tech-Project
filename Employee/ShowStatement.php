<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Show Salary and Festival Bonus</title>
 </head>

	<body> 
	 	<div class="header">
			<?php include 'header.php';?>
	  	</div>

		<div class="bg">
			<h1>Full Income Statement</h1>
			<br><br><br>

			<?php

			  $f1 = fopen("statement.txt", "r");
			  $data = fread($f1, filesize("statement.txt"));
			  fclose($f1);

			  $data_after_newline_delimeter = explode("\n", $data);

			  echo '<table>
			              
			            <tr>
			                <th>Date</th>

			                <th>Expenditure</th>

			                <th>Ammount</th>
			            </tr>';

			  for($i = 0; $i < count($data_after_newline_delimeter) - 1; $i++)
			  {
			    $json_decoded = json_decode($data_after_newline_delimeter[$i], true);

			     echo "<tr>";

			      echo "<td>" . $json_decoded['date'] . "</td>";

			      echo "<td>" . $json_decoded['expenditure'] . "</td>";

			      echo "<td>" . $json_decoded['ammount'] . "</td>";

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

				}

				.bg {
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