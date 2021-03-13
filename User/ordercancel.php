<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Order Cancelation</title>
  </head>
  <body>

    <h1>Order Cancelation</h1>

    <?php
        $srcOErr = $idErr= "";

        $srcO = "";
        $id = "";
        $flag = 0;
        $searchKey = "";
        

        if(isset($_POST['src'])){
          if($_SERVER["REQUEST_METHOD"] == "POST"){

          if(empty($_POST['srcO'])) {
            $srcOErr = "Please fill up the book id";
          }
          else {
            $srcO = $_POST['srcO'];
          }
          
         }

         $f1 = fopen("registrationData.txt", "r");
      $data = fread($f1, filesize("registrationData.txt"));
      fclose($f1);
      $data_after_newline_delimeter = explode("\n", $data);
      $arr1 = array();
      $searchKey = $srcO;

      for($i = 0; $i < count($data_after_newline_delimeter) - 1; $i++) {
        $json_decoded = json_decode($data_after_newline_delimeter[$i], true);
        if($json_decoded['id'] === $searchKey)
        {
          echo $srcO." found";
          $flag=1;
          $id = $json_decoded['id']; 
        }
          }
          if($flag==0)
          echo $srcO." not found";
      }

        if($_SERVER["REQUEST_METHOD"] == "POST") {

        if(empty($_POST['id'])) {
          $idErr = "Please fill up the id properly";
        }
        else {
          $id = $_POST['id'];
        }
      
    <br>
    <form>
      <fieldset>
        <br>

        <label for="id"><b>Order ID:</b></label>
        <input type="number" style="height:25px" name="id" id="id" value="">
        <br>
        <br>
        </fieldset>

        <p>Do you want to cancel or postpone your Order?</p>
        <input type="radio" name="ordercancel"> I want to cancel my order.

      </form>
      <br>
    </body>
</html>