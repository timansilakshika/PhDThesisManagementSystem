<?php
include_once 'header.php';
include_once 'private/submission_function.php';
include_once 'private/feedback_function.php';
$thesid=base64_decode($_GET['id']);

$getdatathesis=$thesissub->getthesissubmission($uid);
$getStudentData=$thesissub->getstudent($uid);
$getSupervisorData=$thesissub->getSupervisor($getStudentData['assign_suppervisor']);
?>
<div class="content-wrapper">
	<!-- Content -->
	<div class="container-xxl flex-grow-1 container-p-y">
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / Thesis Submitions /</span> View Thesis Details.</h4>
		 <ul class="nav nav-pills flex-column flex-md-row mb-3">
		 	<?php 
			if ($getdatathesis['supervisor_status']=="Approved with minor improvements" || $getdatathesis['examiner_status']=="Approved with minor improvements" || $getdatathesis['supervisor_status']=="Need Revision" || $getdatathesis['examiner_status']=="Need Revision") {
				echo '<li class="nav-item">
        		<a class="nav-link active" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bxs-file-plus me-1"></i>Update Submission</a>
      			</li>';
			}
			elseif ($getdatathesis['supervisor_status']=="Updated" || $getdatathesis['examiner_status']=="Updated") {
				echo '<li class="nav-item">
        		<a class="nav-link active" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bxs-file-plus me-1"></i>Update Submission</a>
      			</li>';
			}
			
/*if ($getdatathesis['supervisor_status']=="Pending" && $getdatathesis['examiner_status']=="") {
	
}elseif ($getdatathesis['supervisor_status']=="Approved" && $getdatathesis['examiner_status']=="Approved") {
	
}elseif ($getdatathesis['supervisor_status']=="Approved" && $getdatathesis['examiner_status']=="Approved with minor improvements") {
	
}elseif ($getdatathesis['supervisor_status']=="Approved with minor improvements" && $getdatathesis['examiner_status']=="Approved with minor improvements") {
	echo '<li class="nav-item">
        <a class="nav-link active" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bxs-file-plus me-1"></i>Update Submission</a>
      </li>';
}elseif ($getdatathesis['supervisor_status']=="Need Revision" && $getdatathesis['examiner_status']=="") {
	echo '<li class="nav-item">
        <a class="nav-link active" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bxs-file-plus me-1"></i>Update Submission</a>
      </li>';
}elseif ($getdatathesis['supervisor_status']!="Need Revision" && $getdatathesis['examiner_status']=="Need Revision") {
	echo '<li class="nav-item">
        <a class="nav-link active" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bxs-file-plus me-1"></i>Update Submission</a>
      </li>';
}*/
		 	 ?>


      
    </ul>
		<div class="row">
			<div class="col-lg-12 mb-4 order-0">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Thesis Submission Details.</h4>
						<div class="col-md-12 mt-5">
							<ul class="list-unstyled">
								<li class="mb-4"><strong>Thesis Topic:</strong> <em><?=$getdatathesis['thesis_title'];?></em></li>
								<li class="mb-4"><strong>Thesis Summary:</strong> <em><?=$getdatathesis['thesis_summary'];?></em></li>
								<li class="mb-4"><strong>Supervisor Name:</strong> <em><?=$getSupervisorData['name'];?></em></li>
							</ul>
						</div>
						<br>
						<br>
						<!--<div class="col-md-6 mt-5">
							<ul class="list-unstyled">
								<li class="mb-4"><strong>Student Name:</strong> <em><?=$getstudent['name']?></em></li>
								<li class="mb-4"><strong>Student Index:</strong> <em><?=$getstudent['registration_no']?></em></li>
								<li class="mb-4"><strong>Student Email:</strong> <em><?=$getstudent['email']?></em></li>
								<li class="mb-4"><strong>Registered Programme:</strong> <em><?=$getstudent['res_program']?></em></li>
								<li class="mb-4"><strong>Student Registered Date:</strong> <em><?=$getstudent['registration_date']?></em></li>
							</ul>
						</div>-->
						
						<div class="row">
							<div class="col-md-12">
								<h4 class="card-title">Uploaded Documents</h4>
								
								<embed src="thesis-file/<?=$getdatathesis['thesis_file'];?>" type="application/pdf" width="100%" height="600px" />
							</div>
						</div>
						<div class="row mt-5">
							<form  method="post" enctype="multipart/form-data">
						<table class="table table-bordered">
							<thead>
								<tr> 
									<th>Feedback From</th>
									<th>Feedback Message</th>
									<th>Attached Documents</th>
									<th>Status</th>
									<th>Date & Time</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$th_id=$getdatathesis['th_id'];
									$uid=$getStudentData['u_id'];
									$feedback->feedbacklist($th_id,$uid);
									 ?>
							</tbody>
						</table>
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
			 <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog " role="document">
        
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">Update Your Thesis</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-12 mb-3">
                  <label for="nameBasic" class="form-label">Title of the Project Thesis</label>
                  <input type="text" id="title" name="title" value="<?=$getdatathesis['thesis_title'];?>" required class="form-control" placeholder="Enter Programme Name">
                </div>
                <div class="col-12 mb-3">
                  <label for="nameBasic" class="form-label">Summary Of Project Thesis</label>
                  <textarea name="summary" class="form-control" required cols="30" rows="5"> <?=$getdatathesis['thesis_summary'];?></textarea>
                </div>
                <div class="col-12 mb-3">
                  <label for="nameBasic" class="form-label">Upload Project Thesis File</label>
                  <input type="file"  name="thesisfile" required class="form-control">
                  <input type="hidden"  name="thesisid" required value="<?=$getdatathesis['th_id'];?>">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Close
              </button>
              <button type="submit" name="updatethesis" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </form>
      </div>
    </div>
		</div>
		<?php
		include_once 'footer.php';
		?>