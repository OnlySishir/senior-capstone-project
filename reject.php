<?php
    include('functions.php');
    $id = $_GET['id'];
    
    $query = "DELETE FROM `requests` WHERE `requests`.`id` = '$id';";
        if(performQuery($query)){
            header("Location:reject.html");
        }else{
            echo "Unknown error occured. Please try again.";
        }

?>
<br/><br/>
<button onclick="goBack()">Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>