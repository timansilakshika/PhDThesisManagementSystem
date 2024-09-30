<?php 

include_once 'private/private.php';

$getidsresprog=$_POST['id'];

$delete=mysqli_query($db,"DELETE FROM `users` WHERE `u_id`='$getidsresprog'");
if ($delete) {
    echo "success";
} else {
    echo "failure";
}



?>

