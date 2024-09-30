<?php 

include_once 'db.php';

class reporting{
	private $db;
	public function __construct($db){
		$this->db=$db;
	}

	public function showyeargrade(){
		$sql=mysqli_query($this->db,"SELECT distinct `year` FROM `grades_by_year_view`");
		if (mysqli_num_rows($sql)) {
			while ($fetch_year=mysqli_fetch_assoc($sql)) {
			    echo '<option value="'.$fetch_year["year"].'">'.$fetch_year["year"].'</option>';			}
		}
	}

	public function showprogrammestudenttable($year){
		$sql=mysqli_query($this->db,"SELECT * FROM `program_registered` where `year`=$year");
		if (mysqli_num_rows($sql)) {
			while ($fetch_programme=mysqli_fetch_assoc($sql)) {
			    echo '<tr>

			    		<td>'.$fetch_programme["program"].'</td>
			    		<td>'.$fetch_programme["number_of_students_registered"].'</td>

			    </tr>';
			}
		}
	}
	
}




$reporting=new reporting($db);

 ?>