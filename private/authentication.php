<?php
include_once 'db.php';
class authentication{
	private $db;
	public function __construct($db){
		$this->db=$db;
	}
	public function user_authentication($email, $password){
		$sql = "SELECT * FROM `users` WHERE `email`=?";
		$stmt = $this->db->prepare($sql);
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows == 1) {
		$user = $result->fetch_assoc();
		if (password_verify($password, $user['password'])) {
		// Authentication successful
			$_SESSION['user_id']=$user['u_id'];			
			$_SESSION['user_role']=$user['user_role'];
			return true;			
		} else {
		// Incorrect password
			return false;
		}
		} else {
		// User not found
			return false;
		}
	}
}
$authentication= new authentication($db);
if (isset($_POST['authentication'])) {
	
	if (empty($_POST['email'])) {
echo '<script>
Swal.fire({
title: "Please try Again?",
text: "The Email Address is Required",
icon: "question"
});
</script>';
}elseif(empty($_POST['password'])){
echo '<script>
Swal.fire({
title: "Please try Again?",
text: "The Password is Required",
icon: "question"
});
</script>';
}

if (!empty($_POST['email']) && !empty($_POST['password'])) {
	$passwords=$_POST['password'];
	$email=$_POST['email'];	
}else{
$email=null;
$passwords=null;
}
$result=$authentication->user_authentication($email,$passwords);

	if ($result) {
		echo '<script>
		Swal.fire({
		title: "Congratulation Login",
		text: "Successfully Login",
		icon: "success"
		}).then( function(){
			window.location.href="dashboard";
			});
		</script>';
	}else{
		echo '<script>
		Swal.fire({
		title: "Please try Again.",
		text: "Please Check you Login Credentials",
		icon: "error"
		});
		</script>';
	}
}
?>