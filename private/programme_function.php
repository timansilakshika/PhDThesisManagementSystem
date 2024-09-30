<?php 

include_once 'db.php';

class programme{
	private $db;
	public function __construct($db){
		$this->db=$db;

	}

	public function addprogramme($name,$psupervisor,$pexaminer,$pcoordinator){
		$sql="INSERT INTO `programme`(`programme_name`,`supervisor`,`examiner`,`coordinator`) VALUES (?,?,?,?)";
		$stml=$this->db->prepare($sql);
		$stml->bind_param('ssss',$name,$psupervisor,$pexaminer,$pcoordinator);
		if ($stml->execute()) {
			return true;
		}else{
			return false;
		}
	}


	public function showprogrammeopt(){
		$sql=mysqli_query($this->db,"SELECT * FROM `programme`");
		if (mysqli_num_rows($sql)) {
			while ($fetch_programme=mysqli_fetch_assoc($sql)) {
			    echo '<option value="'.$fetch_programme["programme_name"].'">'.$fetch_programme["programme_name"].'</option>';
			}
		}
	}
	public function showprogrammetable(){
		$sql=mysqli_query($this->db,"SELECT * FROM `programme`");
		if (mysqli_num_rows($sql)) {
			while ($fetch_programme=mysqli_fetch_assoc($sql)) {
			    echo '<tr>

			    		<td>'.$fetch_programme["programme_name"].'</td>
			    		<td><a id="delete" data-edit="'.$fetch_programme["p_id"].'"class="btn btn-sm btn-danger">Delete</a></td>

			    </tr>';
			}
		}
	}


	
}




$programme=new programme($db);


if (isset($_POST['addprogramme'])) {
	$name=$_POST['name'];
	$psupervisor=$_POST['Tsupervisor'];
	$pexaminer=$_POST['Texaminer'];
	$pcoordinator=$_POST['Tcoordinator'];
	$result=$programme->addprogramme($name,$psupervisor,$pexaminer,$pcoordinator);

	if ($result) {
		echo '<script>
Swal.fire({
title: "Successfuly Added.",
text: "Add New Programme Successfully.",
icon: "success"
});
</script>';
	}else{
echo '<script>
Swal.fire({
title: "Please Try Again?",
text: "Failded To Add New Programme.",
icon: "error"
});
</script>';
	}

}

 ?>