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

        <!-- Bootstrap CSS -->
        <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet" />


  </head>
    	
<body class="text-center">
     <!-- Nav Bar Start -->
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <a class="navbar-brand" href="index.html">
        <img src="./img/EC_logo-Black.png" alt="Logo" />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarsExample03"
        aria-controls="navbarsExample03"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExample03">
        <form class="form-inline my-2 my-md-0">
          <input class="form-control" type="text" placeholder="Search" />
        </form>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="dropdown03"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
              >Shop
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdown03">
              <a class="dropdown-item" href="#">Shop by Category</a>
              <a class="dropdown-item" href="#">Shop by Artist</a>
              <a class="dropdown-item" href="#">Shop by Location</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signup.html">Join as an Artist/Designer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Log In</a>
          </li>
          <a class="btn btn-outline-dark" href="signup.php" role="button">
                Sign Up Free</a>
          
        </ul>
      </div>
    </nav>
    <!-- Nav Bar End -->


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
                echo 'Your account request is now pending for approval. Please wait for confirmation. Thank you.';
            }else{
                echo "<script>alert('Unknown error occured.')</script>";
            }
          }else{
            echo '<font color="red">wrong details, please try again.</font>';
        }
        }

    
    ?>
      <br><br><div class="container">
            <form method="post" class="form-signin">
              <!-- <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
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
              <label for="inputLink" class="sr-only">Website/Social link</label>
              <center><input name="link" type="text" id="inputLink" style= width:500px class="form-control" placeholder="Your website or social media Link" required><br></center>
              <label for="inputInfo" class="sr-only">Information</label>
              <center><input name="info" type="text" id="inputLink" style= width:500px class="form-control" placeholder="How did you find out about us?"><br></center>

              <center><select class="browser-default custom-select custom-select-nm mb-3" style= width:500px name="type" >
  <option selected>Select user type</option>
  <option value="ARTIST/DESIGNER">ARTIST/DESIGNER</option>
  <option value="BUSINESS/TRADE">BUSINESS/TRADE</option>
</select></center>
              <center><button name="signup" class="btn btn-lg btn-primary btn-block" style= width:500px type="submit">Sign up</button></center><br>
              <a href="login.php" class="mt-5 mb-3 text-muted" >Go back to login page</a><br><br>
            </form>
          </div>
          <p>Embrace Freebies! For a limited time, ALL Embrace Creatives members receive upgraded benefits for FREE!</p>
<p><i>By clicking the “Submit” button, you agree to our <a href = "#"> Terms and Conditions</a> and <a href = "#"> Community Guidelines</a>.</i></p>

          <!-- Footer Start -->
<div class="footer">
  <div class="contain">
    <div class="col">
      <h1>ABOUT</h1>
      <ul>
        <li><a href="about.html" class="">About EC</a></li>
        <li><a href="contact.html">Contact Us</a></li>
        <li><a href="ambassador.php">Become an Ambassador</a></li>
      </ul>
    </div>
    <div class="col">
      <h1>Company</h1>
      <ul>
      <li><a href="terms and conditions.html" class="">Privacy Policy</a></li>
        <li><a href="terms and conditions.html" class="">Terms & Conditions</a></li>
        <li><a href="Community Guidlines.html" class="">Community Guidelines</a></li>
        <li><a href="#" class="">Report Abuse</a></li>
      </ul>
    </div>
    <div class="col">
      <h1>Education</h1>
      <ul>
      <li><a href="blog-home.html" class="">Blog</a></li>
        <li><a href="#" class="">EC User Manual</a></li>
      </ul>
    </div>
    <div class="col">
      <h1>Inspiration</h1>
      <ul>
        <li><a href="#" class="">Art & Design Market</a></li>
      </ul>
    </div>
    <div class="col">
      <h1>Connections</h1>
      <ul>
        <li><a href="#" class="">Members</a></li>
        <li><a href="events.html" class="">Events</a></li>
      </ul>
    </div>
    <div class="col">
      <h1>Opportunities</h1>
      <ul>
        <li><a href="art-calls.html" class="">Art Calls</a></li>
        <li><a href="#" class="">Grants</a></li>
        <li><a href="#" class="">Advertise</a><li>
      </ul>
    </div>
    <div class="clearfix"> </div>
  </div>
</div>
<br>
<div class="container">
  <div class="row justify-content-md-center">
    <div class="copyright-footer">
      <p class="copyright color-text-a">
        &copy; Copyright
        <span class="color-a"></span> 2020 Embrace Creatives, LLC all rights reserved.Embrace Creatives is a women-owned business headquartered in metro Detroit.
      </p>
    </div>
  </div>
</div>
<!-- Footer End -->
  
      
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
  </html>