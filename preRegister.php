<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
  </head>
  <body >

  	<div class="header">
        <?php include 'header2.php';?>
    </div>

  	<div class="bg">

      <br>
    	<h1>Register as a</h1>

      <?php
          $typeErr =  "" ;

        $type = "";

    	if($_SERVER["REQUEST_METHOD"] == "POST") {
          
          if (empty($_POST['type'])) {
                 $typeErr = "type is required"; 
          } 

          else { 
            $type = $_POST['type']; 

            if($type == "shop")
            {
              header("Location: shopSignup.php");
            }

            else if($type == "user")
            {
              header("Location: userSignup.php");
            }

          }

      }


      ?>

    	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <fieldset>

          <label for="type">Choose type:</label>

          <input type="radio" name="type" 
          <?php if (isset($type) && $type=="shop") echo "checked";?> value="shop">Shop 

          <input type="radio" name="type" 
          <?php if (isset($type) && $type=="user") echo "checked";?> value="user">User 

          <p style="color:red"><?php echo $typeErr; ?></p>

        </fieldset>
        <center>

          <input type="submit" value="Submit">
          
        </center>
        

        </form>


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
		background-image: url('images/about3.jpg');
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

    fieldset{
      width: 12%;
      margin: auto;
    }

	</style>

    </body>
</html>