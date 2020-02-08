<?php  
 session_start();  
 include("functions.php");
 ?>

 
<!doctype html>
<head>
<html lang="en">
<meta charset="utf-8" />
<title>EC Login </title>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

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
            <a class="nav-link" href="signup.php">Join as an Artist/Designer</a>
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
      <div class="container">
            <form method="post" class="form-signin">

              <br><h1 class="h3 mb-3 font-weight-normal">Welcome</h1>
              <label for="inputEmail" class="sr-only">Email address</label>
              <center><input name="email" type="email" id="inputEmail" style= width:500px class="form-control" placeholder="Email address" required autofocus><br></center>
              <label for="inputPassword" class="sr-only">Password</label>
              <center><input name="password" type="password" id="inputPassword" style= width:500px class="form-control" placeholder="Password" required><br></center>
              <center><button name="signin" class="btn btn-lg btn-primary btn-block" style= width:500px type="submit">Login</button></center><br>
    <?php
      
      if(isset($_POST['signin'])){
          $password = $_POST['password'];
          $email = $_POST['email'];
          $query = "SELECT * from `accounts`";
          $_SESSION['login'] = false;
          $users = fetchAll($query);
          if (count($users) > 0) { //this is to catch unknown error.
              foreach ($users as $row){
                  if($row['email']==$email&&$row['password']==$password){
                      $_SESSION['login'] = true;
                      $_SESSION['type'] = $row['type'];
                      break;
                  }
              }
              if ($_SESSION['login']) {
                  header('location:home.php');
              }
              else {
                  echo "<script>alert('Wrong login details.')</script>";
              }
            }
            
          }
    ?>
              <br><class="mt-5 mb-3 text-muted">Don't have an account? <a href="signup.php">register here</a><br><br>
              </form>
          </div>

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