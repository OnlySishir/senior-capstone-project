<?php
    session_start(); 
    if ($_SESSION ['type'] == 'ADMIN')
    {
      header("Location:admin.php");
    }
    elseif ($_SESSION ['type'] == 'ARTIST/DESIGNER') {
      header("Location:artist-home.php");
    }
    elseif ($_SESSION ['type'] == 'BUSINESS/TRADE') {
        header("Location:business home.php");
    }
    include("functions.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title> Home </title>
</head> 
<body>

<h1>Welcome</h1>
</body>
</html>

