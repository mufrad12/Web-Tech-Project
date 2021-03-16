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
  
  	<center>
  	<h1>Book List</h1>

     

<?php
$a="abcd";

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

     echo "<tr>";

     echo '<td> <img src="'. $json_decoded['thumbnail'] . '" alt="The Adventures of Sherlock Holmes" width="200" height="200" > </td>';

      echo "<td>" . $json_decoded['id'] . "</td>";

      echo "<td>" . $json_decoded['booktitle'] . "</td>";

      echo "<td>" . $json_decoded['bookauthor'] . "</td>";

      echo "<td>" . $json_decoded['bookpublisher'] . "</td>";

      echo "<td>" . $json_decoded['bookedition'] . "</td>";

      echo "<td>" . $json_decoded['bookprice'] . "</td>";

      echo "</tr>";

      }

    echo "</table>";

?>

     </center>

     <style> table, th, td 
     {
      border: 1px solid black;
      border-collapse: collapse;
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