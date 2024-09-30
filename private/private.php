<?php
include_once 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
	header('location: login');
}
$uid=$_SESSION['user_id'];
$uRole=$_SESSION['user_role'];
$getloginer=mysqli_query($db,"SELECT * FROM `users` WHERE `u_id`='$uid'");
if (mysqli_num_rows($getloginer)>0) {
	$fetch_loginer=mysqli_fetch_assoc($getloginer);
}
$getthesissubmissonnhp=mysqli_query($db,"SELECT * FROM `thesis_list` JOIN `users` ON `thesis_list`.`user_id`=`users`.`u_id`");
if (mysqli_num_rows($getthesissubmissonnhp)>0) {
while ($fetch_allthesisnhp=mysqli_fetch_assoc($getthesissubmissonnhp)) {

$submissiondate = $fetch_allthesisnhp['create_datetime']; // Assuming $fetch_allthesisnhp['create_datetime'] contains a valid date and time string

$currentDateTime = time(); // Current Unix timestamp

$targetDateTime = strtotime($submissiondate); // Convert the submission date to a Unix timestamp

$timeDifference =$currentDateTime- $targetDateTime;

$days = floor($timeDifference / (60 * 60 * 24)); // Calculate days
$timeDifference %= (60 * 60 * 24); // Remaining time after removing days

$hours = floor($timeDifference / (60 * 60)); // Calculate hours
$timeDifference %= (60 * 60); // Remaining time after removing hours

$minutes = floor($timeDifference / 60); // Calculate minutes

//echo "Time difference: $days Days, $hours Hours, $minutes Minutes";
$examinersid=$fetch_allthesisnhp['examiner_id'];
$examerget=mysqli_query($db,"SELECT * FROM `users` WHERE `u_id`='$examinersid'");
if (mysqli_num_rows($examerget)>0) {
$fetch_examinerid=mysqli_fetch_assoc($examerget);
$examinername=$fetch_examinerid['name'];
$examinermai=$fetch_examinerid['email'];
}



$thesisuserid=$fetch_allthesisnhp['assign_suppervisor'];
$getthesissupervisor=mysqli_query($db,"SELECT * FROM `users` WHERE `u_id`='$thesisuserid'");
$fetch_supervisorinfo=mysqli_fetch_assoc($getthesissupervisor);
$supervsoriemail=$fetch_supervisorinfo['email'];
if (!isset($_SESSION['emailsending'])) {
	

if ($days==4 && $hours==0 && $minutes==0) {
	include_once 'email.php';
	$to=$examinermai;
	
 	$subject="PhD Thesis Evaluation - 1st Reminder to Provide Feedback.";
    $msg="
    Hi,<br/>
	<p>This is the kind reminder to provide the feedbaxk on the following thisis.</p><br/>
	<p>There's only 10 days remaining to provide the feedback.</p><br/>
	<strong>Thesis Title:</strong> <p>".$fetch_allthesisnhp['thesis_title']."</p><br/>
	<strong>Student Index:</strong> <p> ".$fetch_allthesisnhp['registration_no']."</p><br/>

	<p>Thanks!</p><br/>
	<p>APTMS Administration.</p>";
   
    if (smtp_mailer($to,$subject,$msg)) {
    	$to=$supervsoriemail;
    	echo smtp_mailer($to,$subject,$msg);
    	$_SESSION['emailsending']=1;
    }

	
}elseif($days==10 && $hours==0 && $minutes==0){
	include_once 'email.php';
	$to=$examinermai;
	$subject="PhD Thesis Evaluation - 1st Reminder to Provide Feedback.";
     $msg="
    Hi,<br/>
	<p>This is the kind reminder to provide the feedbaxk on the following thisis.</p><br/>
	<p>There's only 10 days remaining to provide the feedback.</p><br/>
	<strong>Thesis Title:</strong> <p>".$fetch_allthesisnhp['thesis_title']."</p><br/>
	<strong>Student Index:</strong> <p> ".$fetch_allthesisnhp['registration_no']."</p><br/>

	<p>Thanks!</p><br/>
	<p>APTMS Administration.</p>";
   
    if (smtp_mailer($to,$subject,$msg)) {
    	$to=$supervsoriemail;
    	echo smtp_mailer($to,$subject,$msg);
    	$_SESSION['emailsending']=1;
    }
}

}





}
}
// Output the result

?>