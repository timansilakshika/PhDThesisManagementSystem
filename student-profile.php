<?php
include_once 'header.php';
include_once 'private/submission_function.php';
include_once 'private/feedback_function.php';
include_once 'private/marking_function.php';
$thesid=base64_decode($_GET['id']);
$getdatathesis=$thesissub->getthesissubmission($thesid);
$getstudent=$thesissub->getstudent($thesid);
?>
<div class="content-wrapper">
	<!-- Content -->
	<div class="container-xxl flex-grow-1 container-p-y">
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / Thesis Submitions/</span> Student Thesis Deatils</h4>
		<div class="row">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Thesis Submission Details.</h4>
					<div class="col-md-12 mt-5">
						<ul class="list-unstyled">
							<li class="mb-4"><strong>Thesis Topic:</strong> <em><?=$getdatathesis['thesis_title'];?></em></li>
							<li class="mb-4"><strong>Thesis Summary:</strong> <em><?=$getdatathesis['thesis_summary'];?></em></li>
						</ul>
					</div>
					<div class="col-md-6 mt-5">
						<ul class="list-unstyled">
							<li class="mb-4"><strong>Student Name:</strong> <em><?=$getstudent['name']?></em></li>
							<li class="mb-4"><strong>Student Index:</strong> <em><?=$getstudent['registration_no']?></em></li>
							<li class="mb-4"><strong>Student Email:</strong> <em><?=$getstudent['email']?></em></li>
							<li class="mb-4"><strong>Registered Programme:</strong> <em><?=$getstudent['res_program']?></em></li>
							<li class="mb-4"><strong>Student Registered Date:</strong> <em><?=$getstudent['registration_date']?></em></li>
						</ul>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<h4 class="card-title">MY Uploaded Documents</h4>
							
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
										$uid=$getstudent['u_id'];
										$feedback->feedbacklist($th_id,$uid);
									?>
								</tbody>
							</table>
							
							
						</div>
<?php 

$getiffinalresult=mysqli_query($db,"SELECT * FROM `final_result` WHERE `user_id`='$uid' AND `thesis_id`='$th_id'");

if (mysqli_num_rows($getiffinalresult)>0) {
	$fetch_fresult=mysqli_fetch_assoc($getiffinalresult);

$grade=$fetch_fresult['final_grade'];
$osp=$fetch_fresult['osp'];
$iab=$fetch_fresult['iab'];
$br=$fetch_fresult['br'];
$rasr=$fetch_fresult['rasr'];
$sd=$fetch_fresult['sd'];
$iac=$fetch_fresult['iac'];
$tes=$fetch_fresult['tes'];
$ceac=$fetch_fresult['ceac'];
$rc=$fetch_fresult['rc'];

}else{
	$grade="";
$osp="";
$iab="";
$br="";
$rasr="";
$sd="";
$iac="";
$tes="";
$ceac="";
$rc="";
}


?>
						<div class="row">
							<div class="card">
								<h4 class="card-header">Thesis Evaluation Marking:</h4>
								<div class="card-body">
									<form method="POST">
										<table class="table table-bordered">
											<thead>
												<tr>
													<th>Subject</th>
													<th>Obtain Mark</th>
													<th>Weights %</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Organization, Structure and Presentation</td>
													<td><input type="text" name="osp" class="form-control" value="<?=$osp;?>" required></td>
													<td>5</td>
												</tr>
												<tr>
													<td>Introduction, Aims and Bbjectives</td>
													<td><input type="text" name="iab" class="form-control" value="<?=$iab;?>" required></td>
													<td>10</td>
												</tr>
												<tr>
													<td>Background Research</td>
													<td><input type="text" name="br" class="form-control" value="<?=$br;?>" required></td>
													<td>10</td>
												</tr>
												<tr>
													<td>Requirements Analysis and System Requirements</td>
													<td><input type="text" name="rasr" class="form-control" value="<?=$rasr;?>" required></td>
													<td>15</td>
												</tr>
												<tr>
													<td>Software Design</td>
													<td><input type="text" name="sd" class="form-control" value="<?=$sd;?>" required></td>
													<td>15</td>
												</tr>
												<tr>
													<td>Implementation and Code</td>
													<td><input type="text" name="iac" class="form-control" value="<?=$iac;?>" required></td>
													<td>15</td>
												</tr>
												<tr>
													<td>Testing</td>
													<td><input type="text" name="tes" class="form-control" value="<?=$tes;?>" required></td>
													<td>15</td>
												</tr>
												<tr>
													<td>Critical Evaluation and Conclusions</td>
													<td><input type="text" name="ceac" class="form-control" value="<?=$ceac;?>" required></td>
													<td>10</td>
												</tr>
												<tr>
													<td>Referencing & Citations</td>
													<td><input type="text" name="rc" class="form-control" value="<?=$ceac;?>" required></td>
													<td>5</td>
												</tr>
											</tbody>
										</table>

										<input type="hidden" name="thsid" value="<?=$getdatathesis['th_id']?>">
										<input type="hidden" name="uid" value="<?=$getstudent['u_id']?>">

										<h3 class="text-center mt-5">Final Grade: <?=$grade;?> </h3>
										<div class="col text-center mt-5">
											<input type="reset" class="btn btn-danger" value="Reset">
											<input type="submit" name="submitmark" class="btn btn-primary" value="Save" name="">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include_once 'footer.php'; ?>