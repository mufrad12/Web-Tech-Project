<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Shop Update</title>
  </head>
  <body>
 <div class="header">
      <?php include 'header.php';?>
  </div>

    <div class="bg">

    <h1>My Profile</h1>
 
    <?php
    echo $_SESSION['userNameV'];
      $srcAErr = $shopNameErr = $shopAddressErr = $idErr = $userNameErr=  $emailErr = $passwordErr= $confirmpassErr="";


		    $srcA = "";
        $shopName = ""; 
        $shopAddress = "";
        $id = "";
        $userName= "";
        $email = "";
        $password= "";
        $confirmpass= "";
        $flag = 0;
	      $searchKey = $_SESSION['userNameV'];

	 

	    $f1 = fopen("shopData.txt", "r");
			$data = fread($f1, filesize("shopData.txt"));
			fclose($f1);
			$data_after_newline_delimeter = explode("\n", $data);
			$arr1 = array();

			for($i = 0; $i < count($data_after_newline_delimeter) - 1; $i++) {
				$json_decoded = json_decode($data_after_newline_delimeter[$i], true);
				if($json_decoded['userName'] === $searchKey)
				{
					$flag=1;
					$shopName = $json_decoded['shopName']; 
					$shopAddress = $json_decoded['shopAddress']; 
					$email = $json_decoded['email']; 
					$id = $json_decoded['id']; 
					$userName= $json_decoded['userName']; 
					$password= $json_decoded['password']; 
					$confirmpass = $json_decoded['confirmpass']; 
				}
	    }


		if((isset($_POST['update']))||(isset($_POST['delete'])))
	      {

      	 if($_SERVER["REQUEST_METHOD"] == "POST") 
      	 {
      	
      		if(empty($_POST['shopName'])) 
      		{
        $shopNameErr = "Please fill up the shop name properly";
      }
      else {
        $shopName = $_POST['shopName'];
      }

      if(empty($_POST['shopAddress'])) {
        $shopAddressErr = "Please fill up the shop address properly";
      }
      else {
        $shopAddress = $_POST['shopAddress'];
      }

            if(empty($_POST['id'])) {
        $idErr = "Please fill up the id number properly";
      }
      else {
        $id = $_POST['id'];
      }

       if(empty($_POST['email'])) {
        $emailErr = "Email is required";
      }
      else {
        $email = $_POST['email'];
      
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        { $emailErr = "Invalid email format"; }
             }

       if(empty($_POST['userName'])) {
        $userNameErr = "Please fill up the userName properly";
      }
      else {
        $userName = $_POST['userName'];
      }
           if(empty($_POST['password'])) {
        $passwordErr = "Please fill up the password properly";
      }
      else {
        $password = $_POST['password'];
      }
           if(empty($_POST['confirmpass'])) {
        $confirmpassErr = "Please fill up the password properly";
      }
      else {
        $confirmpass = $_POST['confirmpass'];
      }
      if($confirmpass!==$confirmpass)
      {
        $confirmpassErr="Password don't match";
      }

    }


	  $f1 = fopen("shopData.txt", "r");
		$data = fread($f1, filesize("shopData.txt"));
		fclose($f1);
		$data_after_newline_delimeter = explode("\n", $data);
		$arr1 = array();
		$searchKey = $userName;

		if(isset($_POST['update']))
		{

			for($i = 0; $i < count($data_after_newline_delimeter) - 1; $i++) {
				$json_decoded = json_decode($data_after_newline_delimeter[$i], true);
				if($json_decoded['userName'] === $searchKey)
				{

					$arr2 = array(
						'shopName' => $shopName,
						'shopAddress' => $shopAddress,
						'email' => $email,
						'id' => $json_decoded['id'],
						'userName' => $json_decoded['userName'],
						'password' => $password,
						'confirmpass' => $confirmpass
					);
					array_push($arr1, $arr2);
				}

				else
				{
					array_push($arr1, $json_decoded);
				}
			}

			$f2 = fopen("shopData.txt", "w");
			for($j = 0; $j < count($arr1); $j++) {
				$json_encoded = json_encode($arr1[$j]);
				fwrite($f2, $json_encoded . "\n");
			}
			fclose($f2);

		}

		if(isset($_POST['delete']))
		{

			for($i = 0; $i < count($data_after_newline_delimeter) - 1; $i++) {
				$json_decoded = json_decode($data_after_newline_delimeter[$i], true);
				if($json_decoded['userName'] !== $searchKey) {
					array_push($arr1, $json_decoded);
          header("Location: login.php");
				}

			}
			$f2 = fopen("shopData.txt", "w");
			for($j = 0; $j < count($arr1); $j++) {
				$json_encoded = json_encode($arr1[$j]);
				fwrite($f2, $json_encoded . "\n");
			}
			fclose($f2);

		}

  }
  
?>

  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

    <fieldset style="margin: 0% 40%;">
      <legend> Basic Information :</legend>

       <label for="shopName">Shop Name :</label>
       <input type="text" name="shopName" id="shopName" value="<?php echo $shopName; ?>"> 
       <p style="color:red"><?php echo $shopNameErr; ?></p>
    
       <br>

       <label for="shopAddress">Shop Address :</label>
       <input type="text" name="shopAddress" id="shopAddress" value="<?php echo $shopAddress ?>">
       <p style="color:red"><?php echo $shopAddressErr; ?></p>

      <br>

       <label for="email">Email :</label>
       <input type="email" name="email" id="email" value="<?php echo $email ?>">
       <p style="color:red"><?php echo $emailErr; ?></p>

       <br>

    </fieldset>

    <fieldset style="margin: 0% 40%;">
      <legend> User Account Information :</legend>

       <label for="id">Id :</label>
       <input type="text" name="id" id="id" value="<?php echo $id; ?>"> 
       <p style="color:red"><?php echo $idErr; ?></p>
    
       <br>

       <label for="userName">Username :</label>
       <input type="text" name="userName" id="userName" value="<?php echo $userName; ?>"> 
       <p style="color:red"><?php echo $userNameErr; ?></p>
    
       <br>
  
       <label for="password">Password :</label>
       <input type="password" name="password" id="password" value="<?php echo $password; ?>"> 
       <p style="color:red"><?php echo $passwordErr; ?></p>
    
       <br>

        <label for="confirmpass">Re-Type Password :</label>
       <input type="password" name="confirmpass" id="confirmpass" value="<?php echo $confirmpass; ?>"> 
       <p style="color:red"><?php echo $confirmpassErr; ?></p>

    </fieldset>
      <br>

 <input type="submit" name="update" value="Update" class="updateshopBtn" style="margin-left: 45%;">
      <input type="submit" name="delete" value="Delete" class="deleteshopBtn">

      </form>
      <br>
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
      </style>

    </body>
</html>