<?php
include_once 'header.php';
include_once 'private/submission_function.php';
include_once 'private/feedback_function.php';
include_once 'private/user_registration_function.php';
$thesid=base64_decode($_GET['id']);
$getdatathesis=$thesissub->getthesissubmission($thesid);
$getstudent=$thesissub->getstudent($thesid);
?>
<div class="content-wrapper">
	<!-- Content -->
	<div class="container-xxl flex-grow-1 container-p-y">
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / Thesis Submitions /</span> <?php if ($_SESSION['user_role']=="Supervisor" || $_SESSION['user_role']=="Examiner"): ?>
							View Thesis Details
						<?php endif ?>
						<?php if ($_SESSION['user_role']=="Coordinator"): ?>
							Student Profile
						<?php endif ?></h4>
		<div class="row">
			<div class="col-lg-12 mb-4 order-0">
				<div class="card">
					<div class="card-body">
						<?php if ($_SESSION['user_role']=="Supervisor" || $_SESSION['user_role']=="Examiner"): ?>
							<h4 class="card-title">Thesis Submission Details.</h4>
						<?php endif ?>
						<?php if ($_SESSION['user_role']=="Coordinator"): ?>
							<h4 class="card-title">Student Profile.</h4>
						<?php endif ?>
						 <?php if ($_SESSION['user_role']=="Supervisor" || $_SESSION['user_role']=="Examiner"): ?>
						<div class="col-md-12 mt-5">
							<ul class="list-unstyled">
								<li class="mb-4"><strong>Thesis Topic:</strong> <em><?=$getdatathesis['thesis_title'];?></em></li>
								<li class="mb-4"><strong>Thesis Summary:</strong> <em><?=$getdatathesis['thesis_summary'];?></em></li>
							</ul>

						</div>
						<?php endif ?>
						<div class="col-md-6 mt-5">
							<ul class="list-unstyled">
								<li class="mb-4"><strong>Student Name:</strong> <em><?=$getstudent['name']?></em></li>
								<li class="mb-4"><strong>Student Index:</strong> <em><?=$getstudent['registration_no']?></em></li>
								<li class="mb-4"><strong>Student Email:</strong> <em><?=$getstudent['email']?></em></li>
								<li class="mb-4"><strong>Registered Programme:</strong> <em><?=$getstudent['res_program']?></em></li>
								<li class="mb-4"><strong>Student Registered Date:</strong> <em><?=$getstudent['registration_date']?></em></li>
							</ul>
						</div>


							
						
						<?php if ($_SESSION['user_role']=="Supervisor" || $_SESSION['user_role']=="Examiner"): ?>
						<div class="row">
							<div class="col-md-12">
								<h4 class="card-title">Uploaded Documents</h4>
								
								<embed src="thesis-file/<?=$getdatathesis['thesis_file'];?>" type="application/pdf" width="100%" height="600px" />
							</div>
						</div>
					<?php endif ?>
						<?php if ($_SESSION['user_role']=="Coordinator"):?>

							<div class="row">
								<form method="post">
									<div class="form-group mb-4">
										<label for="" class="form-label">Select Examiner</label>
										<select name="examiner" class="form-control" required id="">
											<?php
											$emxerid=$getdatathesis['examiner_id'];
											$thesissub->getexaminer($emxerid);
											 ?>
											
											<?php $user_registration->showexaminer(); ?>
										</select>
										<input type="hidden" name="thesisid" value="<?=$getdatathesis['th_id'];?>">
									</div>
									<input type="submit" class="btn btn-sm btn-primary" name="assingexaminer">
								</form>
							</div>
						<?php endif ?>

						<?php if ($_SESSION['user_role']=="Supervisor" || $_SESSION['user_role']=="Examiner"): ?>
							<!-- SupperVisor or Examiner View -->
						<div class="row mt-5">
							
							<div class="col-md-12 ui-bg-overlay-container p-4">
								<div class="ui-bg-overlay bg-dark opacity-75 rounded-end-bottom"style="
									border-radius: 10px;margin-right: 5px;
								"></div>
								<div class="text-white small fw-semibold mb-3">Thesis Feedback's:</div>
								<div class="toast-container">
									<?php 
									$th_id=$getdatathesis['th_id'];
									$uid=$getstudent['u_id'];
									$feedback->Sgetthesisfeedback($th_id,$uid);
									 ?>
									
								</div>
							</div>
							
							
							<div class="col-md-12 mt-5">
								
								<strong class="text-left">Supervisor’s Feedback and Comments:</strong>
								<form  method="POST" enctype="multipart/form-data">
									<label for="" class="form-label">Write Your Feedback:</label>
									<textarea name="feedback" id="feedback" class="form-control mb-2" cols="30" rows="5" required></textarea>
									<label for="" class="form-label">Upload File</label>
									<input type="file" class="form-control mb-2" name="feedbackfile">
									<label for="" class="form-label">Status</label>
									<select name="feedbackstatus" class="form-control mb-2" id="feedbackstatus" required>
										<option value="">Select Status
											<option value="Approved">Approved</option>
											<option value="Approved with minor improvements">Approved with minor improvements</option>
											<option value="Need Revision">Need Revision</option>
											<option value="Pending">Pending</option>
										</select>
										<input type="hidden" name="thesisid" value="<?=$getdatathesis['th_id'];?>" hidden>
										<input type="hidden" name="studenid" value="<?=$getstudent['u_id'];?>" hidden>
										<input type="submit"  class="btn btn-sm btn-primary" name="feedbacksend">
									</form>
								</div>
								
								
							</div>
							<?php endif ?>
							<!-- SupperVisor or Examiner View -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		include_once 'footer.php';
		?>