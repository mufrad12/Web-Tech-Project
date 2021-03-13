<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Book List</title>
  </head>
  <body>
 <div class="header">
      <?php include 'header.php';?>
  </div>
  
   <div class="bg">

  	<h1>My Book List</h1>

<?php

 	$f1 = fopen("bookData.txt", "r");
  	$data = fread($f1, filesize("bookData.txt"));
  	fclose($f1);
  	$data_after_newline_delimeter = explode("\n", $data);

 	 echo '<table>
              <tr>
                <th>Book Thumbnail</th>
                <th>Book Id</th>
                <th>Book Title</th>
                <th>Book Author</th>
                <th>Book Publisher</th>
                <th>Book Edition </th>
                <th>Book Price</th>
              </tr>';

  for($i = 0; $i < count($data_after_newline_delimeter) - 1; $i++)
  {
    $json_decoded = json_decode($data_after_newline_delimeter[$i], true);

      if( $json_decoded['sUname'] === $_SESSION['userNameV'])
      {
      echo "<tr>";

      echo '<td> <img src="'. $json_decoded['thumbnail'] . '"  width="200" height="200" > </td>';

      echo "<td>" . $json_decoded['id'] . "</td>";

      echo "<td>" . $json_decoded['booktitle'] . "</td>";

      echo "<td>" . $json_decoded['bookauthor'] . "</td>";

      echo "<td>" . $json_decoded['bookpublisher'] . "</td>";

      echo "<td>" . $json_decoded['bookedition'] . "</td>";

      echo "<td>" . $json_decoded['bookprice'] . "</td>";

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
        border: 1px dotted white;
        border-collapse: collapse;
        margin: auto;
      }
      th, td {
        padding: 25px;
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