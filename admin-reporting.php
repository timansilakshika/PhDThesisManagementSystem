<?php
include_once 'header.php';
include_once 'private/programme_function.php';
include_once 'private/reporting_function.php';
include_once 'private/user_registration_function.php';
?>
<div class="content-wrapper">
	<!-- Content -->
	<div class="container-xxl flex-grow-1 container-p-y">
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / Admin Menu /</span> Reporting </h4>
		<div class="row">
			<div class="col-lg-12 mb-4 order-0">
				<div class="nav-align-top mb-4">


					<!-- Registered Students Reporting -->
					<div class="tab-content">

						<div class="tab-pane fade active show" id="navs-registered-students" role="tabpanel">
							<form method="post" action="admin-reporting.php">
								<div class="mb-9 row">
									<label for="Year_for_report" class="col-md-2 col-form-label">Registration Year</label>
									<div class="col-md-2">
										<select id="Year_for_report" required name="Year_for_report" class="form-select">

											<option value="">Select the Year</option>
											<?php $reporting->showyeargrade(); ?>

										</select>
									</div>
									<button type="submit" class="col-md-1 col-form-label btn btn-sm btn-primary">Get Report</button>
									<div class="col-md-6"></div>
									<?php
									if (isset($_POST["Year_for_report"]) && !empty($_POST["Year_for_report"])) {
										echo "<button onclick='window.print()' class='col-md-1 btn btn-sm btn-secondary ml-5'>Download</button>";
									}
									?>
								</div>
							</form>

							<?php if ($uRole = "Admin") {
								if ($_SERVER["REQUEST_METHOD"] == "POST") {
									if (isset($_POST["Year_for_report"]) && !empty($_POST["Year_for_report"])) {
										// Get the selected option value
										$selectedOption = $_POST["Year_for_report"];
										$yearly_students = mysqli_query($db, "SELECT * FROM `grades_by_year_view` where `year`=$selectedOption");

										if (mysqli_num_rows($yearly_students) > 0) {
											$fetchstu_res_grade = mysqli_fetch_assoc($yearly_students);
											echo '<h2 class="text-center font-weight-bold m-5">Grade Distribution for ' . $_POST["Year_for_report"] . '</h2>';
											echo '<div id="chartContainer" style="height: 370px; width: 100%;"></div>';
											echo '<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>';
										}

										$student_feedback = mysqli_query($db, "SELECT * FROM `feedback_view` where `year`=$selectedOption");

										if (mysqli_num_rows($student_feedback) > 0) {
											$fetchfeedback_res = mysqli_fetch_assoc($student_feedback);

											echo '<div class="container">
											<h2 class="text-center font-weight-bold m-5">Feedback Distribution for ' . $_POST["Year_for_report"] . '</h2>
											<div class="row ">
												<div class="col-sm m-2 ">
													<div class="card" style="width: 20rem; height: 8rem;">
														<div class="card-body">
															<h4 class="text-center card-title">Total Registered Students</h5>
																<h3 class="text-center card-subtitle mb-2 font-weight-bold text-success">' . $fetchfeedback_res["registered_students"] . '</h6>
														</div>
													</div>
			
												</div>
												<div class="col-sm m-2 ">
													<div class="card" style="width: 20rem; height: 8rem;">
														<div class="card-body">
															<h4 class="text-center card-title">Total Number of Thesis Submitted</h5>
																<h3 class="text-center card-subtitle mb-2 font-weight-bold text-success">' . $fetchfeedback_res["number_of_thesis_submitted"] . '</h6>
														</div>
													</div>
												</div>
												<div class="col-sm m-2 ">
													<div class="card" style="width: 20rem; height: 8rem;">
														<div class="card-body">
															<h4 class="text-center card-title">Supervisor Feedback Pending</h5>
																<h3 class="text-center card-subtitle mb-2 font-weight-bold text-success">' . $fetchfeedback_res["supervisor_feedback_pending_count"] . '</h6>
														</div>
													</div>
												</div>
												<div class="col-sm m-2 ">
													<div class="card" style="width: 20rem; height: 8rem;">
														<div class="card-body">
															<h4 class="text-center card-title">Examiner Feedback Pending</h5>
																<h3 class="text-center card-subtitle mb-2 font-weight-bold text-success">' . $fetchfeedback_res["examiner_feedback_pending_count"] . '</h6>
														</div>
													</div>
												</div>
											</div>
										</div>';
										}
									}
								}
							}
							?>
						</div>

						<div class="container">
						<?php if (isset($_POST["Year_for_report"]) && !empty($_POST["Year_for_report"])) {echo '<h2 class="text-center font-weight-bold m-5">Program Distribution for '.$_POST["Year_for_report"].' </h2>';}?>
							<div class="row ">
								<div class="col-sm m-2 ">
								</div>
								<div class="col-sm m-2 ">
									<?php if (isset($_POST["Year_for_report"]) && !empty($_POST["Year_for_report"])) {

										echo '<table class=" table table-bordered m-2" style="width: 40rem;" id="example">
										<thead>
											<tr>
												<td>Program Name</td>
												<td>Student Count</td>
											</tr>
										</thead>
										<tbody>';
									} ?><?php if(isset($selectedOption)!=null) {$reporting->showprogrammestudenttable($selectedOption);} ?>
									<?php
									if (isset($_POST["Year_for_report"]) && !empty($_POST["Year_for_report"])) {
										echo '</tbody>
										</table>';
									}

									?>
								</div>
								<div class="col-sm m-2 ">

								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			
			<script>
				window.onload = function() {

					var chart = new CanvasJS.Chart("chartContainer", {
						animationEnabled: true,
						title: {
							text: ""
						},
						axisY: {
							title: "student count",
							includeZero: true,
							interval: 1,
							viewportMaximum: 10
						},
						axisX: {
							title: "grade"
						},
						data: [{
							type: "bar",
							indexLabel: "{y}",
							indexLabelPlacement: "inside",
							indexLabelFontWeight: "bolder",
							indexLabelFontColor: "white",
							dataPoints: [
								<?php
								// Loop through the provided array and format it into CanvasJS dataPoints
								foreach ($fetchstu_res_grade as $key => $value) {
									if ($key !== 'year') {
										echo "{ label: '$key', y: $value },";
									}
									/*
									if ($key !== 'year') {
										if( $value>5){
											echo "{ label: '$key', y: $value, color: 'red'},";
										} else{
											echo "{ label: '$key', y: $value, color: 'green'},";

										}
										
									}
									*/
								}
								?>
							]
						}]
					});

					if (<?php echo sizeof($fetchstu_res_grade) ?> > 0) {
						chart.render()
					}
				}
			</script>

			<?php
			include_once 'footer.php';
			?>