<?php 

include_once 'db.php';

class feedback{
	private$db;
	public function __construct($db){
		$this->db=$db;
	}

	public function addfeedback($msg,$files,$status,$thesisid,$stuid){

			$sql="INSERT INTO `feedbacks`(`thesis_id`, `student_id`, `feedback`, `who_is`, `feedback_file`, `status`,`created_time_date`) VALUES (?,?,?,?,?,?,?)";

			$stml=$this->db->prepare($sql);
			$useid=$_SESSION['user_id'];
			$fname=$files['name'];
			$statusf="Submited";
			$time=date('d-m-Y h:i:s');
			$stml->bind_param('iisisss',$thesisid,$stuid,$msg,$useid,$fname,$status,$time);
			if ($stml->execute()) {
				move_uploaded_file($files['tmp_name'],'feedback-file/'.$fname);
				if ($_SESSION['user_role']=="Supervisor") {
					$sql2="UPDATE `thesis_list` SET `supervisor_status`=? WHERE `user_id`=? AND `th_id`=?";
				}elseif($_SESSION['user_role']=="Examiner"){
					$sql2="UPDATE `thesis_list` SET `examiner_status`=? WHERE `user_id`=? AND `th_id`=?";
				}
				
				$stml2=$this->db->prepare($sql2);
				$stml2->bind_param('sii',$status,$stuid,$thesisid);
				if ($stml2->execute()) {
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
	}



	public function Sgetthesisfeedback($th_id,$uid){
		$useid=$_SESSION['user_id'];
		$sql=mysqli_query($this->db,"SELECT * FROM `feedbacks` JOIN `users` ON `users`.`u_id`= `feedbacks`.`who_is` WHERE `thesis_id`='$th_id' AND `student_id`='$uid'");
		$feedback="";
		if (mysqli_num_rows($sql)>0) {
			while ($fetch_feedback=mysqli_fetch_assoc($sql)) {
			   echo '<div class="bs-toast toast fade show bg-secondary" role="alert" aria-live="assertive" aria-atomic="true">
										<div class="toast-header">
											<div class="me-auto fw-semibold">
											<span style="font-size:10px;">'.$fetch_feedback["created_time_date"].'</span>
											<br>
											'.$fetch_feedback["name"].' ('.ucfirst($fetch_feedback["user_role"]).')</div>
											<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
										</div>
										<div class="toast-body">
											'.$fetch_feedback["feedback"].'
										</div>
									</div>'; 
			}
		}


	}


	public function feedbacklist($th_id,$uid){
		$useid=$_SESSION['user_id'];
		$sql=mysqli_query($this->db,"SELECT * FROM `feedbacks` JOIN `users` ON `users`.`u_id`= `feedbacks`.`who_is` WHERE `thesis_id`='$th_id' AND `student_id`='$uid'");
		$feedback="";
		if (mysqli_num_rows($sql)>0) {
			while ($fetch_feedback=mysqli_fetch_assoc($sql)) {
				if (!empty($fetch_feedback["feedback_file"])) {
					$a='<a href="feedback-file/'.$fetch_feedback["feedback_file"].'" target="_blank">See File</a>';
				}else{
					$a=null;
				}
				echo '<tr>
						<td>'.$fetch_feedback["name"].' ('.ucfirst($fetch_feedback["user_role"]).')</td>
						<td>'.$fetch_feedback["feedback"].'</td>
						<td>'.$a.'</td>
						<td>'.$fetch_feedback["status"].'</td>
						<td>'.$fetch_feedback["created_time_date"].'</td>
					  </tr>';

					  echo '<input type="hidden" hidden name="feedbackfrom" value="'.$fetch_feedback["user_role"].'">';
			}
			
		}


	}
}


$feedback=new feedback($db);



if (isset($_POST['feedbacksend'])) {
	$msg=$_POST['feedback'];
	$files=$_FILES['feedbackfile'];
	$status=$_POST['feedbackstatus'];
	$thesisid=$_POST['thesisid'];
	$stuid=$_POST['studenid'];
	$result=$feedback->addfeedback($msg,$files,$status,$thesisid,$stuid);


	if ($result) {
echo '<script>
Swal.fire({
title: "Congratulations",
text: "Your Feedback Successfully Submitted.",
icon: "success"
});
</script>';
}else{
echo '<script>
Swal.fire({
title: "Please try Again?",
text: "Failded to submite Your Feedback.",
icon: "error"
});
</script>';
}
}

 ?>