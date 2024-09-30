<?php 

include_once 'private/private.php';

$getidsresprog=$_POST['id'];

$delete=mysqli_query($db,"DELETE FROM `programme` WHERE `p_id`='$getidsresprog'");
if ($delete) {
    echo "success";
} else {
    echo "failure";
}



?>

