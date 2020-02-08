<?php
    session_start(); 
    include("functions.php");
    if($_SESSION['login']!==true){
        header('location:login.php');
    }
?>

<?php 
 
 if ($_SESSION ['type'] == null)
 {
  header("Location:login.php");
 }


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EC Pending Requests</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet" />
  </head>

  </head>

  <body>

                <?php
                if(isset($_POST['logout'])){
                    session_destroy();
                    header('location:login.php');
                }
    
                ?>

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

      <section class="jumbotron jumbotron-special5">
        <div class="container">
            <?php
            $query = "select * from `requests`;";
            if(count(fetchAll($query))>0){
                foreach(fetchAll($query) as $row){

            
                    ?>
                
                    <p><b>Email Address:</b> <?php echo $row['email'] ?></p>
                      <p><?php echo $row['message'] ?></p>
                      <p><b>Website:</b> <?php echo $row['link'] ?></p>
                      <p>
                        <a href="accept.php?id=<?php echo $row['id'] ?>" class="btn btn-primary my-2">Accept</a>
                        <a href="reject.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary my-2">Reject</a>
                      </p>
                    <small><i><?php echo $row['date'] ?></i></small>
            <?php
                    }
                  }else{
                      echo "No Pending Requests.";
                  }

            ?>
     <!-- side bar -->
     <div class="sidenav">
  <a href="requests.php"><b>User Requests<b></a>
  <a href="allusers.php"><b>All Users<b></a>
</div>

<!-- side bar end -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>