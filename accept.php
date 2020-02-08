<?php
    include('functions.php');
    $id = $_GET['id'];
    $query = "select * from `requests` where `id` = '$id';";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            $password = $row['password'];
            $confirmpassword = $row['confirmpassword'];
            $postalcode = $row['postalcode'];
            $type = $row['type'];
            $link = $row['link'];
            $info = $row['info'];
            $msg = "First line of text\nSecond line of text";
            $query = "INSERT INTO `accounts` (`firstname`, `lastname`, `email`,`password`, `confirmpassword` , `postalcode`, `type`, `link`, `info`) VALUES ('$firstname', '$lastname', '$email', '$password', '$confirmpassword', '$postalcode', '$type', '$link', '$info');";
        }
        $query .= "DELETE FROM `requests` WHERE `requests`.`id` = '$id';";
        if(performQuery($query)){
            header("Location:accept.html");
        }else{
            echo "Unknown error occured. Please try again.";
        }
    }else{
        echo "Error occured.";
    }
    
?>
<br/><br/>
<button onclick="goBack()">Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>