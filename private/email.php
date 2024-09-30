 <?php 
include_once'private.php';
include('smtp/PHPMailerAutoload.php');



if (isset($_POST['id'])) {
  $id=$_POST['id'];
  $getcard=mysqli_query($db,"SELECT * FROM `order-card` WHERE `contractor_id`='$id'");
if (mysqli_num_rows($getcard)>0) {
  $fetchcard=mysqli_fetch_assoc($getcard);
}
	


echo smtp_mailer($to,$subject,$msg);


}




function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2; 
	$mail->Username = "lakshikatimansi@gmail.com";
	$mail->Password = "lasancpxypfwchxz";
	$mail->SetFrom("lakshikatimansi@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}



?>
