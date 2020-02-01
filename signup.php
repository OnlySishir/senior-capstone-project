<?php
    session_start(); 
    include("functions.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <title>EC signup page</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  </head>
    <?php
        if(isset($_POST['signup'])){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmpassword = $_POST['confirmpassword'];
            $postalcode = $_POST['postalcode'];
            $type = $_POST['type'];
            $link = $_POST['link'];
            $info = $_POST['info'];
            $message = "$lastname $firstname would like to request an account.";
            if ($_POST['password'] == $_POST['confirmpassword']) {
              $query = "INSERT INTO `requests` (`id`, `firstname`, `lastname`, `email`, `password`,  `confirmpassword` , `postalcode`, `type`, `link`, `info`, `message`, `date`) VALUES (NULL, '$firstname', '$lastname', '$email', '$password', '$confirmpassword' , '$postalcode' , '$type', '$link', '$info', '$message', CURRENT_TIMESTAMP)";
            if(performQuery($query)){
                echo "<script>alert('Your account request is now pending for approval. Please wait for confirmation. Thank you.')</script>";
            }else{
                echo "<script>alert('Unknown error occured.')</script>";
            }
          }else{
            echo "<script>alert('wrong details, please try again.')</script>";
        }
        }

    
    ?>

    	
<body class="text-center">
<header>
  <div align= "left">
        <img src="./img/EC_logo-Black.png" alt="Logo" />
  </div>
      </header>
      <div class="container">
            <form method="post" class="form-signin">
              <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
              <h1 class="h3 mb-3 font-weight-normal">Register</h1>
              <label for="inputFirstname" class="sr-only">Firstname</label>
              <center><input name="firstname" type="text" id="inputFirstname" style= width:500px class="form-control" placeholder="Firstname" required autofocus></center><br>
                <label for="inputLastname" class="sr-only">Lastname</label>
              <center><input name="lastname" type="text" id="inputLastname" style= width:500px class="form-control" placeholder="Lastname" required autofocus><br></center>
                <label for="inputEmail" class="sr-only">Email address</label>
              <center><input name="email" type="email" id="inputEmail" style= width:500px class="form-control" placeholder="Email address" required autofocus><br></center>
              <label for="inputPassword" class="sr-only">Password</label>
              <center><input name="password" type="password" id="inputPassword" style= width:500px class="form-control" placeholder="Password" required><br></center>
              <label for="inputCPassword" class="sr-only">Confirm Password</label>
              <center><input name="confirmpassword" type="password" id="inputCPassword" style= width:500px class="form-control" placeholder="Confirm Password" required><br></center>
              <label for="inputPostalCode" class="sr-only">Postal Code</label>
              <center><input name="postalcode" type="number" id="inputPostalcode" style= width:500px class="form-control" placeholder="Postal Code" required><br></center>
              <label for="inputLink" class="sr-only">Link</label>
              <center><input name="link" type="text" id="inputLink" style= width:500px class="form-control" placeholder="Link" required><br></center>
              <label for="inputInfo" class="sr-only">Information</label>
              <center><input name="info" type="text" id="inputLink" style= width:500px class="form-control" placeholder="How did you find out about us?"><br></center>

              <center><select class="browser-default custom-select custom-select-lg mb-3" style= width:500px>
  <option selected>Select user type</option>
  <option value="ARTIST/DESIGNER">ARTIST/DESIGNER</option>
  <option value="BUSINESS/TRADE">BUSINESS/TRADE</option>
</select></center>
              <center><button name="signup" class="btn btn-lg btn-primary btn-block" style= width:500px type="submit">Sign up</button></center>
              <a href="login.php" class="mt-5 mb-3 text-muted">Go back to login page</a>
            </form>
          </div>
  
      
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
  </html>