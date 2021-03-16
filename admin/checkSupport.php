<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Support</title>
  </head>
  <body>

    <div class="header">
        <?php include 'header.php';?>
    </div>

    <div class="bg">

      <br>
    	<h1>Check Support</h1>

      <?php

        $f1 = fopen("../database/support.txt", "r");
        $data = fread($f1, filesize("../database/support.txt"));
        fclose($f1);
        $data_after_newline_delimeter = explode("\n", $data);

        echo '<table>
                    <tr>
                      <th>Name</th>
                      <th>Contact No.</th>
                      <th>Email</th>
                      <th>Message</th>
                    </tr>';

        for($i = 0; $i < count($data_after_newline_delimeter) - 1; $i++)
        {
          $json_decoded = json_decode($data_after_newline_delimeter[$i], true);

           echo "<tr>";

            echo "<td>" . $json_decoded['name'] . "</td>";

            echo "<td>" . $json_decoded['number'] . "</td>";

            echo "<td>" . $json_decoded['email'] . "</td>";

            echo "<td>" . $json_decoded['subject'] . "</td>";
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
        background-image: url('../images/about3.jpg');
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
        border: 1px solid white;
        border-collapse: collapse;
        margin: auto;
      }
      th, td {
        padding: 15px;
        width: 150px;
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