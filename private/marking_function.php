<?php 

include_once 'db.php';


if (isset($_POST['submitmark'])) {
	$osp1=$_POST['osp'];
	$iab1=$_POST['iab'];
	$br1=$_POST['br'];
	$rasr1=$_POST['rasr'];
	$sd1=$_POST['sd'];
	$iac1=$_POST['iac'];
	$tes1=$_POST['tes'];
	$ceac1=$_POST['ceac'];
	$rc1=$_POST['rc'];

	$osp=$osp1*5/100;
	$iab=$iab1*10/100;
	$br=$br1*10/100;
	$rasr=$rasr1*15/100;
	$sd=$sd1*15/100;
	$iac=$iac1*15/100;
	$tes=$tes1*15/100;
	$ceac=$ceac1*10/100;
	$rc=$rc1*5/100;

	$totalobtmk=$osp+$iab+$br+$rasr+$sd+$iac+$tes+$ceac+$rc;

	if ($totalobtmk>=85) {
		$grade="A+";
	}elseif ($totalobtmk>=75) {
		$grade="A";
	}elseif ($totalobtmk>=70) {
		$grade="B+";
	}elseif ($totalobtmk>=65) {
		$grade="B";
	}elseif ($totalobtmk>=50) {
		$grade="C+";
	}elseif ($totalobtmk>=45) {
		$grade="C";
	}else{
		$grade="F";

	}

$thid=$_POST['thsid'];
$uid=$_POST['uid'];
$todaytime=date('d-m-Y h:i:s');
	$checkisit=mysqli_query($db,"SELECT * FROM `final_result` WHERE `user_id`='$uid' AND `thesis_id`='$thid'");
	if (mysqli_num_rows($checkisit)>0) {
		$sqlmark="UPDATE `final_result` SET `osp`='$osp1',`iab`='$iab1',`br`='$br1',`rasr`='$rasr1',`sd`='$sd1',`iac`='$iac1',`tes`='$tes1',`ceac`='$ceac1',`rc`='$rc1',`totalobmark`='$totalobtmk',`final_grade`='$grade',`create_date`='$todaytime' WHERE `thesis_id`='$thid' AND `user_id`='$uid'";
	}else{
		$sqlmark="INSERT INTO `final_result`(`user_id`, `thesis_id`, `osp`, `iab`, `br`, `rasr`, `sd`, `iac`, `tes`, `ceac`, `rc`, `totalobmark`, `final_grade`, `create_date`) VALUES ('$uid','$thid','$osp1','$iab1','$br1','$rasr1','$sd1','$iac1','$tes1','$ceac1','$rc1','$totalobtmk','$grade','$todaytime')";
	}
	$query=mysqli_query($db,$sqlmark);
	if ($query) {
		$thesis=mysqli_query($db,"UPDATE `thesis_list` SET `coordinator_status`='Approved' WHERE `th_id`='$thid' AND `user_id`='$uid'");
		echo '<script>
Swal.fire({
title: "Congratulations",
text: "The Thesis Mark Assign Successfuly.",
icon: "success"
});
</script>';
	}else{
		echo '<script>
Swal.fire({
title: "Please try Again?",
text: "Failded to Assign Thesis Mark.",
icon: "error"
});
</script>';
	}








}




 ?>