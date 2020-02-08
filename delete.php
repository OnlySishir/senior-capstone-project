<?php
    include('functions.php');
    $id = $_GET['id'];
    
    $query = "DELETE FROM `accounts` WHERE `accounts`.`id` = '$id';";
        if(performQuery($query)){
            header('location:allusers.php');
        }else{
            echo "Unknown error occured. Please try again.";
        }

?>
