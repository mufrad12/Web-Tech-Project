<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Employee List</title>
  </head>
  <body>

    <div class="header">
        <?php include 'header.php';?>
    </div>

    <div class="bg">
 
      <h1>Employee List</h1>

      <?php

        $f1 = fopen("employee.txt", "r");
        $data = fread($f1, filesize("employee.txt"));
        fclose($f1);
        $data_after_newline_delimeter = explode("\n", $data);

        echo '<table>
                    <tr>
                      <th>ID</th>
                      <th>User Name</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Gender</th>
                      <th>Date of Birth</th>
                      <th>Email</th>
                    </tr>';

        for($i = 0; $i < count($data_after_newline_delimeter) - 1; $i++)
        {
          $json_decoded = json_decode($data_after_newline_delimeter[$i], true);

           echo "<tr>";

            echo "<td>" . $json_decoded['id'] . "</td>";

            echo "<td>" . $json_decoded['userName'] . "</td>";

            echo "<td>" . $json_decoded['firstName'] . "</td>";

            echo "<td>" . $json_decoded['lastName'] . "</td>";

            echo "<td>" . $json_decoded['gender'] . "</td>";

            echo "<td>" . $json_decoded['dob'] . "</td>";

            echo "<td>" . $json_decoded['email'] . "</td>";

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
        margin: 0% 30%;
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