<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Customer Order Information</title>
 </head>

	<body>
	 
	 	<div class="header">
			<?php include 'header.php';?>
	  	</div>

		<div class="bg">
			<br>
			<h1>Customer Order Information</h1>
			<br>

			<?php

			$sid=$_SESSION['userNameV'];

		
			  $f1 = fopen("cart.txt", "r");
			  $data = fread($f1, filesize("cart.txt"));
			  fclose($f1);

			  $data_after_newline_delimeter = explode("\n", $data);

			  echo '<table>
			              
			            <tr>
			                <th>Book Id</th>

			                <th>User Username</th>

			                <th>Shop Username</th>

			                <th>Book Price</th>
			            </tr>';

			  for($i = 0; $i < count($data_after_newline_delimeter) - 1; $i++)
			  {
			    $json_decoded = json_decode($data_after_newline_delimeter[$i], true);

			    if( $json_decoded['shopUName'] === $_SESSION['userNameV'])
			    {

			     echo "<tr>";

			      echo "<td>" . $json_decoded['id'] . "</td>";

			      echo "<td>" . $json_decoded['userUName'] . "</td>";

			      echo "<td>" . $json_decoded['shopUName'] . "</td>";

			      echo "<td>" . $json_decoded['price'] . "</td>";

			      echo "</tr>";
					}
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
					background-image: url('about3.jpg');
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
	                border: 1px solid white;
	                border-collapse: collapse;
	                margin:auto;
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