<?php
include_once 'header.php';
include_once 'private/programme_function.php';
include_once 'private/user_registration_function.php';
?>
<div class="content-wrapper">
	<!-- Content -->
	<div class="container-xxl flex-grow-1 container-p-y">
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / Admin Menu /</span> Account Registration </h4>
		<div class="row">
			<div class="col-lg-12 mb-4 order-0">
				<div class="nav-align-top mb-4">
					<ul class="nav nav-tabs nav-fill" role="tablist">
						<li class="nav-item">
							<button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-supervisor" aria-controls="navs-justified-supervisor" aria-selected="true">
							<i class="tf-icons bx bx-user-pin"></i> Supervisor
							</button>
						</li>
						<li class="nav-item">
							<button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-students" aria-controls="navs-justified-students" aria-selected="false">
							<i class="tf-icons bx bx-user-circle"></i> Students
							</button>
						</li>
						<li class="nav-item">
							<button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-coordinator" aria-controls="navs-justified-coordinator" aria-selected="false">
							<i class="tf-icons bx bxs-user-account"></i> Coordinator
							</button>
						</li>
						<li class="nav-item">
							<button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-Examiner" aria-controls="navs-justified-Examiner" aria-selected="false">
							<i class="tf-icons bx bx-user-check"></i> Examiner
							</button>
						</li>
						<li class="nav-item">
							<button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-admin" aria-controls="navs-justified-admin" aria-selected="false">
							<i class="tf-icons bx bx-user-voice"></i> Administrator
							</button>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade active show" id="navs-justified-supervisor" role="tabpanel">
							<form method="post">
							<h5 class="card-header">Supervisor Registration Form</h5>
							
							<div class="mb-3 row">
								<label for="html5-text-input" class="col-md-2 col-form-label">Name</label>
								<div class="col-md-10">
									<div class="row g-2">
										<select id="SnameT" name="SnameT" class="form-select col" style="max-width: 100px;" required>
											
											<option value="Mr.">Mr.</option>
											<option value="Mrs.">Mrs.</option>
											
										</select>
										<input class="form-control col" required type="text" name="Sname" id="html5-text-input">
									</div>
									
								</div>
							</div>
							<div class="mb-3 row">
								<label for="html5-tel-input" class="col-md-2 col-form-label">Number</label>
								<div class="col-md-10">
									<input class="form-control" required type="tel"  id="Snumber" name="Snumber">
								</div>
							</div>
							<div class="mb-3 row">
								<label for="html5-email-input" class="col-md-2 col-form-label">Email</label>
								<div class="col-md-10">
									<input class="form-control"  requiredtype="email" id="Semail" placeholder="test@email.com" name="Semail">
								</div>
							</div>
							
							
							<div class="mb-3 row">
								<label for="html5-password-input" class="col-md-2 col-form-label">Password</label>
								<div class="col-md-10">
									<input class="form-control"  required type="password" id="Spassword" name="Spassword">
								</div>
							</div>
							<div class="col text-center"><input type="submit" class="btn btn-sm btn-primary" value="Registar" name="addsupervisor"></div>
							
							</form>
							
						</div>
						<div class="tab-pane fade" id="navs-justified-students" role="tabpanel">
							<h5 class="card-header">Student Registration Form</h5>
							<form method="post">
							<div class="mb-3 row">
								<label for="html5-text-input" class="col-md-2 col-form-label">Student Name</label>
								<div class="col-md-10">
									<div class="row g-2">
										<select id="TnameF" name="TnameF" required class="form-select col" style="max-width: 100px;" >
											
											<option value="Mr.">Mr.</option>
											<option value="Mrs.">Mrs.</option>
											
										</select>
										<input class="form-control col" required type="text" name="Tname" id="Tname">
									</div>
									
								</div>
							</div>
							<div class="mb-3 row">
								<label for="html5-tel-input" class="col-md-2 col-form-label">Registration Number</label>
								<div class="col-md-10">
									<input class="form-control" required type="text"  id="Tregnum" name="Tregnum">
								</div>
							</div>
							<div class="mb-3 row">
								<label for="html5-tel-input" class="col-md-2 col-form-label">Registered Date</label>
								<div class="col-md-10">
									<input class="form-control" required type="date"  id="Tregdate" name="Tregdate">
								</div>
							</div>
							<div class="mb-3 row">
								<label for="html5-tel-input" class="col-md-2 col-form-label">Registered Programme</label>
								<div class="col-md-10">
									<select id="Tregprog" required name="Tregprog" class="form-select">
										
										<option value="Mr.">Select the Program</option>
										<?php $programme->showprogrammeopt(); ?>
										
									</select>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="html5-tel-input" class="col-md-2 col-form-label">Assigned Supervisor</label>
								<div class="col-md-10">
									<select id="Tsupervisor" required name="Tsupervisor" class="form-select">
										
										<option selected>Select the Supervisor</option>
										<?php $user_registration->showcoursesupervisor(); ?>
										
										
									</select>

								</div>
							</div>
							
							<div class="mb-3 row">
								<label for="html5-email-input" class="col-md-2 col-form-label">Email</label>
								<div class="col-md-10">
									<input class="form-control" required type="email" id="Temail" placeholder="test@email.com" name="Temail">
								</div>
							</div>
							<div class="mb-3 row">
								<label for="html5-password-input" class="col-md-2 col-form-label">Password</label>
								<div class="col-md-10">
									<input class="form-control" required type="password" id="Tpassword" name="Tpassword">
								</div>
							</div>
							<div class="col text-center"><input type="submit" name="addstudent" class="btn btn-sm btn-primary" value="Registar"></div>
							</form>
						</div>
						<div class="tab-pane fade" id="navs-justified-coordinator" role="tabpanel">
							<h5 class="card-header">Coordinator Registration Form</h5>
							<form method="post">
							<div class="mb-3 row">
								<label for="html5-text-input" class="col-md-2 col-form-label">Name</label>
								<div class="col-md-10">
									<div class="row g-2">
										<select id="CnamF" name="CnamF" class="form-select col" style="max-width: 100px;">
											
											<option value="Mr.">Mr.</option>
											<option value="Mrs.">Mrs.</option>
											
										</select>
										<input class="form-control col" type="text" id="Cname" name="Cname">
									</div>
									
								</div>
							</div>
							<div class="mb-3 row">
								<label for="html5-tel-input" class="col-md-2 col-form-label">Employee Number</label>
								<div class="col-md-10">
									<input class="form-control" type="tel" value="" id="CNum" name="CNum">
								</div>
							</div>
							<div class="mb-3 row">
								<label for="html5-email-input" class="col-md-2 col-form-label">Email</label>
								<div class="col-md-10">
									<input class="form-control" type="email" placeholder="test@email.com" value="" id="Cemail" name="Cemail">
								</div>
							</div>
							
							
							<div class="mb-3 row">
								<label for="html5-password-input" class="col-md-2 col-form-label">Password</label>
								<div class="col-md-10">
									<input class="form-control" type="password" id="Cpassword" name="Cpassword">
								</div>
							</div>
							<div class="col text-center"><input type="submit" class="btn btn-sm btn-primary" value="Registar" name="addcoordinator"></div>
							</form>
						</div>
						<div class="tab-pane fade" id="navs-justified-Examiner" role="tabpanel">
							<h5 class="card-header">Examiner Registration Form</h5>
							<form method="post">
							<div class="mb-3 row">
								<label for="html5-text-input" class="col-md-2 col-form-label">Name</label>
								<div class="col-md-10">
									<div class="row g-2">
										<select id="EnameF" name="EnameF" class="form-select col" style="max-width: 100px;">
											
											<option value="Mr.">Mr.</option>
											<option value="Mrs.">Mrs.</option>
											
										</select>
										<input class="form-control col" type="text" id="Ename" name="Ename">
									</div>
									
								</div>
							</div>
							<div class="mb-3 row">
								<label for="html5-tel-input" class="col-md-2 col-form-label">Employee Number</label>
								<div class="col-md-10">
									<input class="form-control" type="tel" value="" id="Enum" name="Enum">
								</div>
							</div>
							<div class="mb-3 row">
								<label for="html5-email-input" class="col-md-2 col-form-label">Email</label>
								<div class="col-md-10">
									<input class="form-control" type="email" id="Eemail" placeholder="test@email.com" name="Eemail">
								</div>
							</div>
							
							
							<div class="mb-3 row">
								<label for="html5-password-input" class="col-md-2 col-form-label">Password</label>
								<div class="col-md-10">
									<input class="form-control" type="password" id="Epassword" name="Epassword">
								</div>
							</div>
							<div class="col text-center"><input type="submit" class="btn btn-sm btn-primary" value="Registar" name="addexaminer"></div>
							</form>
						</div>
						<div class="tab-pane fade" id="navs-justified-admin" role="tabpanel">
							<h5 class="card-header">Administrator Registration Form</h5>
							<form method="post">
							<div class="mb-3 row">
								<label for="html5-text-input" class="col-md-2 col-form-label">Name</label>
								<div class="col-md-10">
									<div class="row g-2">
										<select id="AnameF" name="AnameF" class="form-select col" style="max-width: 100px;">
											
											<option value="Mr.">Mr.</option>
											<option value="Mrs.">Mrs.</option>
											
										</select>
										<input class="form-control col" type="text" id="Aname" name="Aname">
									</div>
									
								</div>
							</div>
							<div class="mb-3 row">
								<label for="html5-tel-input" class="col-md-2 col-form-label">Admin Number</label>
								<div class="col-md-10">
									<input class="form-control" type="tel" value="" id="Anum" name="Anum">
								</div>
							</div>
							<div class="mb-3 row">
								<label for="html5-email-input" class="col-md-2 col-form-label">Email</label>
								<div class="col-md-10">
									<input class="form-control" type="email" id="Aemail" placeholder="test@email.com" name="Aemail">
								</div>
							</div>
							
							
							<div class="mb-3 row">
								<label for="html5-password-input" class="col-md-2 col-form-label">Password</label>
								<div class="col-md-10">
									<input class="form-control" type="password" id="Apassword" name="Apassword">
								</div>
							</div>
							<div class="col text-center"><input type="submit" class="btn btn-sm btn-primary" value="Registar" name="addadmin"></div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="card">
				<div class="card-body">
					<h4>Users List</h4>
					<table class="table table-bordered" id="example">
						<thead>
							<tr>
								<td>Name</td>
								<td>Email Address</td>
								<td>Registration Number</td>
								<td>User Role</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
							<?php $user_registration->showusers();?>
						</tbody>
					</table>
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



<script>
    $(document).on('click', "#delete" , function(event) {
        var progid = $(this).data('edit');
        var confirmation = confirm("Are you sure you want to delete this user?");
       
        if (confirmation) {
            $.ajax({
            		url: 'delete-user.php',
            		type: 'post',
            		data: {id: progid},
            		success: function (data) {
						if (data.trim() === "failure") {
							Swal.fire({
							title: "Successfully Deleted.",
							text: "User Deleted Successfully.",
							icon: "success"
							}).then(function(){
								window.location.href="users-registration";
							});
						} else {
							Swal.fire({
							title: "Please Try Again.",
							text: "User Deletion Failed.",
							icon: "error"
							}).then(function(){
								window.location.href="users-registration";
							});
						}
            		}
            });
        }
    });
</script>
<script>
    // Get today's date
    var today = new Date();
    
    // Format today's date in YYYY-MM-DD format
    var formattedDate = today.toISOString().split('T')[0];
    
    // Set the max attribute of the input element to today's date
    document.getElementById("Tregdate").setAttribute("max", formattedDate);
</script>
	<?php
	include_once 'footer.php';
	?>