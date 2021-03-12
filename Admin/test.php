<?php

    $filepath = "admin.txt";
    $file = fopen($filepath,'r')
    or die("unable to open file");

  // JSON string
  $someJSON = '[{"name":"Jonathan Suh","gender":"male"},{"name":"William Philbin","gender":"male"},{"name":"Allison McKinnery","gender":"female"}]';

  // Convert JSON string to Array
  //$someJSON = '['.fread($file, filesize("admin.txt")).']';
  $someArray = json_decode($someJSON, true);
   print_r($someArray);
  echo "<br>"; 
  //for($i=0;$i<1;$i++) 
  {
    echo $someArray[0]["name"]; // Access Array data
    echo "<br>";
  }     
    
?>