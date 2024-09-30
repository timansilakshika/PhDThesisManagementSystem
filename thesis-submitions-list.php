<?php
include_once 'header.php';
include_once 'private/submission_function.php';
?>
<div class="content-wrapper">
	<!-- Content -->
	<div class="container-xxl flex-grow-1 container-p-y">
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span>Thesis Submissions</h4>
		<div class="row">
			<div class="col-lg-12 mb-4 order-0">
				<div class="card table-responsive">
					<div class="card-body">
						<h4 class="card-title">Thesis Submission List</h4>
						<table id="example" class="table table-bordered">
							
							<?php 
							if($_SESSION['user_role']=='Supervisor' || $_SESSION['user_role']=='Examiner'){
								echo '
								<thead>
								<tr>
									<th>Student Index</th>
									<th>Student Name</th>
									<th>Summary</th>
									<th>Examiner Status</th>
									<th>Supervisor Status</th>
									<th>Submit Date & Time</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>';
									$thesissub->showsubmission();
								echo '</tbody>';
							}
							elseif($_SESSION['user_role']=='Coordinator'){
								echo '
								<thead>
								<tr>
									<th>Student Index</th>
									<th>Student Name</th>
									<th>Summary</th>
									<th>Examiner Status</th>
									<th>Supervisor Status</th>
									<th>Submit Date & Time</th>
									<th>Examiner Assignment</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>';
										$thesissub->showSubmissionsToCoordinator();
								echo '</tbody>';
								}
								?>
								<!--Commeneted code segment-->
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="table-css/jquery-3.7.0.js"></script>
	<script src="table-css/jquery.dataTables.min.js"></script>
	<script type="text/javascript">

new DataTable('#example', {
paging: false,
scrollCollapse: true,
scrollY: '50vh'
});
</script>
	<?php
	include_once 'footer.php';
	?>