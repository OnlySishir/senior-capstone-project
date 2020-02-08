<?php
    session_start(); 
    include("functions.php");
?>

<?php 
 
 if ($_SESSION ['type'] == null)
 {
  header("Location:login.php");
 }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>User lists</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
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

<body>
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

     
     <br><table class="table table-striped" align="center" border="1px" style="width:1000px; line-height:50px;" >
    <!-- <tr>
        <th colspan="4"><h2><User lists</h2></th>
    </tr> -->
    <tr align="center" border="1px" style="width:800px; line-height:20px;" >
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email Address</th>
        <th>Type</th>
        <th>Delete</th>
    </tr>

    <?php
        $query = "select * from `accounts`;";
        if(count(fetchAll($query))>0){
            foreach(fetchAll($query) as $row){

    ?>
        <div class="container">
<tr align="center" border="1px" style="width:800px; line-height:15px;">
        <td><?php echo $row['firstname'] ?></td>
        <td><?php echo $row['lastname'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['type'] ?></td>
        <td><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>

</tr>
</div>

<?php
       }    
   } else { ?>

    <tr>
        <td colspan="4"> <?php echo "No User Found."; ?> </td>
    </tr>
    <?php } ?>

</table>

<div class="sidenav">
  <center><a href="requests.php"><b>User Requests<b></a></center>
  <center><a href="allusers.php"><b>All Users<b></a></center>
</div>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>