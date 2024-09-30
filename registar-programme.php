<?php
include_once 'header.php';
include_once 'private/programme_function.php';
include_once 'private/user_registration_function.php'
?>
<div class="content-wrapper">
	<!-- Content -->
	<div class="container-xxl flex-grow-1 container-p-y">
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / Admin Menu /</span> Programme Registration </h4>
		<ul class="nav nav-pills flex-column flex-md-row mb-3">
			<li class="nav-item">
				<a class="nav-link active" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bx-user me-1"></i>Add New</a>
			</li>

		</ul>
		<div class="card">
			<div class="card-body">
				<h4>Registered Programmes List</h4>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Programme Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $programme->showprogrammetable(); ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
			<div class="modal-dialog" role="document">
			<form  method="post">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel1">Add New Programme</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					
	
					<div class="modal-body">
						<!--<div class="row">
							<div class="col mb-3">
								<label for="nameBasic" class="form-label">Programme Name</label>
								<input type="text" id="name" name="name" class="form-control" placeholder="Enter Programme Name">
								<label for="nameBasic" class="form-label">Course Supervisor</label>
								<input type="text" id="name" name="name" class="form-control" placeholder="Enter Course Supervisor">
								<label for="nameBasic" class="form-label">Course Examiner</label>
								<input type="text" id="name" name="name" class="form-control" placeholder="Enter Course Examiner">
								<label for="nameBasic" class="form-label">Course Coordinator</label>
								<input type="text" id="name" name="name" class="form-control" placeholder="Enter Course Coordinator">
							</div>
						</div>-->
						<div class="mb-3 row">
						<label for="nameBasic" class="form-label">Programme Name</label>
								
								<div class="col-md-10">
									<input type="text" id="name" name="name" class="form-control" placeholder="Enter Programme Name">
								</div>
								<br>
								<div class="col-md-10">
									<select id="Tsupervisor" name="Tsupervisor" class="form-select">
										
										<option selected>Select the Supervisor</option>
										<?php $user_registration->showsupervisor(); ?>
										
										
									</select>
								</div>
								<div class="col-md-10">
									<select id="Texaminer" name="Texaminer" class="form-select">
										
										<option selected>Select the Examiner</option>
										<?php $user_registration->showexaminer(); ?>
										
										
									</select>
								</div>
								<div class="col-md-10">
									<select id="Tcoordinator" name="Tcoordinator" class="form-select">
										
										<option selected>Select the Coordinator</option>
										<?php $user_registration->showcoordinator(); ?>
										
										
									</select>
								</div>
							</div>
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
						Close
						</button>
						<button type="submit" name="addprogramme" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
	<script>
    $(document).on('click', "#delete" , function(event) {
        var progid = $(this).data('edit');
        var confirmation = confirm("Are you sure you want to delete the programme?");
       
        if (confirmation) {
            $.ajax({
            		url: 'delete-programme.php',
            		type: 'post',
            		data: {id: progid},
            		success: function (data) {
						if (data.trim() === "success") {
							Swal.fire({
							title: "Successfully Deleted.",
							text: "Registra Programme Deleted.",
							icon: "success"
							}).then(function(){
								window.location.href="registar-programme";
							});
						} else {
							Swal.fire({
							title: "Please Try Again.",
							text: "Registra Programme Deletion Failed.",
							icon: "error"
							}).then(function(){
								window.location.href="registar-programme";
							});
						}
            		}
            });
        }
    });
</script>

	<?php
	include_once 'footer.php';
	?>