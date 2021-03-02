<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Show Salary and Festival Bonus</title>
 </head>
 <center>
<body>
<h1>All Employee's Salary and Festival Bonus</h1>
<br><br><br>

<?php
$file = fopen("salary.txt","r");

while(! feof($file))
  {
  echo fgets($file). "<br />";
  }

fclose($file);
?>

</body>
 </center>
</html>