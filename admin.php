<?php
    session_start(); 
    include("functions.php");
?>

 


<!DOCTYPE html>
<html>
<head>

    <title> Admin Account </title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet" />
  </head>

<body>
<header>
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
             <li class="nav-item">
            <a class="nav-link" href="admin.php">Admin</a>
          </li> 
           <li class="nav-item">
            <a class="nav-link" href="index.html">Home</a>
          </li> 
          <a class="btn btn-outline-dark" href="logout.php" role="button">
                Log Out</a>         
         </ul>
       </div>
       
     </nav>
     <!-- Nav Bar End -->
</header>

<!-- side bar -->
<br>
<br><br><div class="container-fluid">
  <div class="sidenav">
  <center><a href="requests.php"><b>User Requests<b></a></center>
  <center><a href="allusers.php"><b>All Users<b></a></center>  
</div>
</div>

<!-- side bar end -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
</body>
</html>
