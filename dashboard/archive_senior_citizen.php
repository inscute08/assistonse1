<?php    

	session_start();
	include('../global/model.php');
	$model = new Model();

	if (empty($_SESSION['sess'])) {
		echo "<script>window.open('../','_self');</script>";
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Design</title>
		
		<link rel="stylesheet" type="text/css" href="../css/css/dataTables.bootstrap4.min.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

		<link href="../css/main.css" rel="stylesheet">
		<link href="../css/dashboard.css" rel="stylesheet">
		<link href="../css/barangay_clearance.css" rel="stylesheet">
		<link href="../css/information.css" rel="stylesheet">
		<link href="../css/registrations.css" rel="stylesheet">
	<body>
		<div class="container-fluid">
			<nav id="nav" class="navbar navbar-expand-md navbar-dark py-0">
				<div class="container-fluid">
					<button class="navbar-toggler ms-5 m-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div id="navbarSupportedContent" class="collapse navbar-collapse text-center">
						<ul class="navbar-nav me-auto mb-0 py-3 d-flex w-100">
							<li class="nav-item flex-fill">
								<a class="nav-link" href="./index">News</a>
							</li>
							<li class="nav-item flex-fill">
								<a class="nav-link" href="./helpdesk">Helpdesk</a>
							</li>
							<li class="nav-item flex-fill">
								<a class="nav-link" href="./activities">Activities</a>
							</li>
							<li class="nav-item flex-fill">
								<a class="nav-link" href="./guidebook">Guidebook</a>
							</li>
							<li class="nav-item flex-fill">
								<a class="nav-link custom_active" href="./information">Information</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			
			<aside class="col p-5 pt-0">
				<a id="logo" class="navbar-brand m-0 py-3 text-center" href="index">
					<img width="150px" height="60px" src="../img/logo.png" alt="assist onse">
				</a>
				<ul id="nav_side" class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link text-light"href="./information.php">Admin Accounts</a>
					</li>

					<li class="nav-item mt-5">
						<a class="nav-link text-light custom_active" href="./senior_citizen.php">
							Senior Citizen <br>
							User Accounts
						</a>
					</li>

					<li class="nav-item mt-5">
						<a class="nav-link text-light" href="./approved_registrations.php">Registrations</a>
					</li>

					<li class="nav-item text-center mb-3">
						<a id="logout" class="nav-link text-light" href="#">Log Out</a>
					</li>
				</ul>
			</aside>

			<div id="brgy_buttons" class="row m-0 pt-3 pe-0 pe-md-3 rounded-3">
				<div class="col-12 col-md-4 fs-6 mb-3 mb-md-0">                    
					<a class="btn btn-dark py-0 px-1 border-light" id="archive" href="./archive_senior_citizen">See archive</a>
					<button class="btn btn-dark py-0 px-1 border-light">Export <i class="bi bi-box-arrow-up-right"></i></button>
				</div>
				<div class="col-6 col-md-4 text-center">
					<button class="btn btn-dark py-0 px-3 border-light" data-bs-toggle="modal" data-bs-target="#modal">Add user</button>
				</div>
				<div class="col-6 col-md-4"></div>
			</div>

			<div id="main_content" class="row m-0 pb-5 pe-0 pe-md-3 rounded-3">
				<div id="table_border" class="p-0 m-2">
					<div class="table-responsive">
						<table id="table" class="table text-light text-center align-middle m-0">
							<thead>
							<tr height="70px" class="align-middle">
								<th class="p-3" scope="col">SC ID No.</th>
								<th class="p-3 px-5" scope="col">Name</th>
								<th class="p-3" scope="col">Gender</th>
								<th class="p-3" scope="col">Mobile No.</th>
								<th class="p-3" scope="col">Landline No.</th>
								<th class="p-3 px-5" scope="col">Civil Status</th>
								<th class="p-3" scope="col">Birthdate</th>
								<th class="p-3 px-5" scope="col">Residence Address</th>
								<th class="p-3 px-5" scope="col">Guardian's Name</th>   
								<th class="p-3" scope="col">Guardian's <br>Mobile Number</th>
								<th class="p-3" scope="col">Guardian's <br>Landline Number</th>
								<th class="p-3 px-5" scope="col">Status</th>
								<th class="p-3" scope="col">QR Code</th>
								<th class="p-3" scope="col">Activities</th> 
								<th class="p-3" scope="col">Requests</th>
								<th class="p-3" scope="col">Action</th>
							</tr>
							</thead>
							<tbody>
								<?php

									$rows = $model->fetchArchivedAccounts();

									if (!empty($rows)) {
										foreach ($rows as $row) {

								?>

								<tr class="display1">
									<th class="p-3 searchable" scope="row"><?php echo $row['SeniorID']; ?></th>
									<td class="p-3 searchable"><?php echo $row['SenLastName'].', '.$row['SenFirstName'].' '.$row['SenMiddleName']; ?></td>
									<td class="p-3"><?php echo $row['Gender']; ?></td>
									<td class="p-3"><?php echo $row['SenMobileNumber']; ?></td>
									<td class="p-3"><?php echo $row['SenLandLineNumber']; ?></td>
									<td class="p-3"><?php echo $row['CivilStatus']; ?></td>
									<td class="p-3"><?php echo date("m/d/Y", strtotime($row['Birthdate'])); ?></td>
									<td><?php echo $row['HomeAdd']; ?></td>
									<td class="p-3"><?php echo $row['NameOfGuardian']; ?></td>
									<td class="p-3"><?php echo $row['GuardianMobileNumber']; ?></td> 
									<td class="p-3"><?php echo $row['GuardianLandlineNumber']; ?></td> 
									<td class="p-3"><?php echo $row['SenStatus']; ?></td> 
									<td class="p-3"><a href="#" class="text-light text-decoration-none" data-bs-toggle="modal" data-bs-target="#modal_qr">View</a></td>
									<td class="p-3"><a href="#" class="text-light text-decoration-none" data-bs-toggle="modal" data-bs-target="#modal_acts">View List</a></td>
									<td class="p-3"><a href="#" class="text-light text-decoration-none" data-bs-toggle="modal" data-bs-target="#modal_forms">View List</a></td>
									<td class="p-3">
										<ul class="list-unstyled">
											<form method="POST">
												<input type="hidden" name="message_id" value="<?php echo $row['SeniorID']; ?>">
												<li class="me-2"><button type="submit" name="message" class="edit text-light text-decoration-none" style="background-color: transparent; border-width: 0px;">Message</button></li>
											</form>
											<li class="me-2"><a href="#" data-id="1" class="edit text-light text-decoration-none" data-bs-toggle="modal" data-bs-target="#edit-<?php echo $row['SeniorID']; ?>">Edit</a></li>
											<li><a href="#" data-id="1" class="text-light text-decoration-none" data-bs-toggle="modal" data-bs-target="#update_status-<?php echo $row['SeniorID']; ?>">Update Status</a></li>
										</ul>
									</td>
								</tr>

								<div id="edit-<?php echo $row['SeniorID']; ?>" class="modal fade text-light" tabindex="-1">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-header d-flex justify-content-start">
												<button type="button" class="button-close border-0 bg-transparent me-2" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
												<h5 class="modal-title">Edit senior</h5>
											</div>
											<form method="POST">
												<div class="modal-body text-center mt-4">
													<input type="hidden" name="edit_id" value="<?php echo $row['SeniorID']; ?>">
													<div class="form-group mb-3">
														<label class="d-block mb-2">First Name</label>
														<input name="first-name" type="text" class="form-control rounded-0" value="<?php echo $row['SenFirstName']; ?>" required>
													</div>
													<div class="form-group mb-3">
														<label class="d-block mb-2">Middle Name</label>
														<input name="middle-name" type="text" class="form-control rounded-0" value="<?php echo $row['SenMiddleName']; ?>" required>
													</div>
													<div class="form-group mb-3">
														<label class="d-block mb-2">Last Name</label>
														<input name="last-name" type="text" class="form-control rounded-0" value="<?php echo $row['SenLastName']; ?>" required>
													</div>
													<div class="form-group mb-3">
														<label class="d-block mb-2">Gender</label>
														<input name="gender" type="text" class="form-control rounded-0" value="<?php echo $row['Gender']; ?>" required>
													</div>
													<div class="form-group mb-3">
														<label class="d-block mb-2">Mobile Number</label>
														<input name="contact" type="text" class="form-control rounded-0" value="<?php echo $row['SenMobileNumber']; ?>" required>
													</div>
													<div class="form-group mb-3">
														<label class="d-block mb-2">Landline No.</label>
														<input name="landline" type="text" class="form-control rounded-0" value="<?php echo $row['SenLandLineNumber']; ?>" required>
													</div>
													<div class="form-group mb-3">
														<label class="d-block mb-2">Civil Status</label>
														<input name="civil-status" type="text" class="form-control rounded-0" value="<?php echo $row['CivilStatus']; ?>" required>
													</div>
													<div class="form-group mb-3">
														<label class="d-block mb-2">Birthdate</label>
														<input name="birthdate" type="date" class="form-control rounded-0" value="<?php echo $row['Birthdate']; ?>" required>
													</div>
													<div class="form-group mb-3">
														<label class="d-block mb-2">Residence Address</label>
														<input name="address" type="text" class="form-control rounded-0" value="<?php echo $row['HomeAdd']; ?>" required>
													</div>
													<div class="form-group mb-3">
														<label class="d-block mb-2">Guardian's Name</label>
														<input name="guardian-name" type="text" class="form-control rounded-0" value="<?php echo $row['NameOfGuardian']; ?>" required>
													</div>
													<div class="form-group mb-3">
														<label class="d-block mb-2">Guardian's Mobile Number</label>
														<input name="guardian-contact" type="text" class="form-control rounded-0" value="<?php echo $row['GuardianMobileNumber']; ?>" required>
													</div>
													<div class="form-group mb-3">
														<label class="d-block mb-2">Guardian's Landline Number</label>
														<input name="guardian-landline" type="text" class="form-control rounded-0" value="<?php echo $row['GuardianLandlineNumber']; ?>" required>
													</div>
												</div>
												<div class="modal-footer pt-0 pb-5 border-0 d-flex justify-content-center">
													<button type="submit" class="btn btn-dark py-1 px-4 border-light" name="edit">Save</button>
												</div>
											</form>
										</div>
									</div>
								</div>

								<div id="update_status-<?php echo $row['SeniorID']; ?>" class="modal fade text-light" tabindex="-1">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-header d-flex justify-content-start">
												<button type="button" class="button-close border-0 bg-transparent me-2" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
												<h5 class="modal-title">Restore user</h5>
											</div>
											<form method="POST">
												<div class="modal-body text-center mt-4">
													<input type="hidden" name="sen_id" value="<?php echo $row['SeniorID']; ?>">
												</div>
												<div class="modal-footer pt-0 pb-5 border-0 d-flex justify-content-center">
													<button type="submit" class="btn btn-dark py-1 px-4 border-light" name="remove">Restore</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								<?php 

										}
									}

									if (isset($_POST['message'])) {
										$message_id = $_POST['message_id'];

										$model->sendMessage($message_id, 'Good Day!');

										echo "<script>window.open('helpdesk', '_self');</script>";
									}

									if (isset($_POST['edit'])) {
										$edit_id = $_POST['edit_id'];
										$first_name = $_POST['first-name'];
										$middle_name = $_POST['middle-name'];
										$last_name = $_POST['last-name'];
										$gender = $_POST['gender'];
										$contact = $_POST['contact'];
										$landline = $_POST['landline'];
										$civil_status = $_POST['civil-status'];
										$birthdate = $_POST['birthdate'];
										$address = $_POST['address'];
										$guardian_name = $_POST['guardian-name'];
										$guardian_contact = $_POST['guardian-contact'];
										$guardian_landline = $_POST['guardian-landline'];

										$model->updateSeniorInfo($edit_id, $first_name, $middle_name, $last_name, $gender, $contact, $landline, $civil_status, $birthdate, $address, $guardian_name, $guardian_contact, $guardian_landline);
									}

									if (isset($_POST['remove'])) {
										$rmv_id = $_POST['sen_id'];
										$status = 1;

										$model->updateStatus($rmv_id, $status);

										echo "<script>window.open('archive_senior_citizen', '_self');</script>";
									}

								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div id="modal" class="modal fade text-light" tabindex="-1">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header d-flex justify-content-start">
						<button type="button" class="button-close border-0 bg-transparent me-2" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
						<h5 class="modal-title">Add user</h5>
					</div>
					<form method="POST">
						<div class="modal-body text-center mt-4" style="padding-left: 50px; padding-right: 50px;">
							<div class="form-group mb-3"> 
								<label class="d-block mb-2">Senior ID</label> 
								<input name="senior-id" type="text" class="form-control rounded-0" required> 
							</div> 
							<div class="form-group mb-3"> 
								<label class="d-block mb-2">First Name</label> 
								<input name="first-name" type="text" class="form-control rounded-0" required> 
							</div> 
							<div class="form-group mb-3"> 
								<label class="d-block mb-2">Middle Name</label> 
								<input name="middle-name" type="text" class="form-control rounded-0" required> 
							</div> 
							<div class="form-group mb-3"> 
								<label class="d-block mb-2">Last Name</label> 
								<input name="last-name" type="text" class="form-control rounded-0" required> 
							</div> 
							<div class="form-group mb-3"> 
								<label class="d-block mb-2">Status</label> 
								<input name="status" type="text" class="form-control rounded-0" required> 
							</div> 
							<div class="form-group mb-3"> 
								<label class="d-block mb-2">Gender</label> 
								<input name="gender" type="text" class="form-control rounded-0" required> 
							</div> 
							<div class="form-group mb-3"> 
								<label class="d-block mb-2">Mobile Number</label> 
								<input name="contact" type="text" class="form-control rounded-0" required> 
							</div> 
							<div class="form-group mb-3"> 
								<label class="d-block mb-2">Landline No.</label> 
								<input name="landline" type="text" class="form-control rounded-0" required> 
							</div> 
							<div class="form-group mb-3"> 
								<label class="d-block mb-2">Civil Status</label> 
								<input name="civil-status" type="text" class="form-control rounded-0" required> 
							</div> 
							<div class="form-group mb-3"> 
								<label class="d-block mb-2">Birthdate</label> 
								<input name="birthdate" type="date" class="form-control rounded-0" required> 
							</div> 
							<div class="form-group mb-3"> 
								<label class="d-block mb-2">Residence Address</label> 
								<input name="address" type="text" class="form-control rounded-0" required> 
							</div> 
							<div class="form-group mb-3"> 
								<label class="d-block mb-2">Email</label> 
								<input name="email" type="email" class="form-control rounded-0" required> 
							</div>
							<div class="form-group mb-3"> 
								<label class="d-block mb-2">User ID</label> 
								<input name="user-id" type="text" class="form-control rounded-0" required> 
							</div> 
							<div class="form-group mb-3"> 
								<label class="d-block mb-2">Password</label> 
								<input name="password" type="password" class="form-control rounded-0" required> 
							</div>  
							<div class="form-group mb-3"> 
								<label class="d-block mb-2">Guardian's Name</label> 
								<input name="guardian-name" type="text" class="form-control rounded-0" required> 
							</div> 
							<div class="form-group mb-3"> 
								<label class="d-block mb-2">Guardian's Mobile Number</label> 
								<input name="guardian-contact" type="text" class="form-control rounded-0" required> 
							</div> 
							<div class="form-group mb-3"> 
								<label class="d-block mb-2">Guardian's Landline Number</label> 
								<input name="guardian-landline" type="text" class="form-control rounded-0" required> 
							</div>
						</div>
						<div class="modal-footer pt-0 pb-5 border-0 d-flex justify-content-center">
							<button type="submit" name="add-user" class="btn btn-dark py-1 px-4 border-light">Add User</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<?php

			if (isset($_POST['add-user'])) {
				$senior_id = $_POST['senior-id'];
				$first_name = $_POST['first-name'];
				$middle_name = $_POST['middle-name'];
				$last_name = $_POST['last-name'];
				$senior_status = $_POST['status'];
				$gender = $_POST['gender'];
				$contact = $_POST['contact'];
				$landline = $_POST['landline'];
				$civil_status = $_POST['civil-status'];
				$birthdate = $_POST['birthdate'];
				$address = $_POST['address'];
				$email = $_POST['email'];
				$user_id = $_POST['user-id'];
				$password = $_POST['password'];
				$guardian_name = $_POST['guardian-name'];
				$guardian_contact = $_POST['guardian-contact'];
				$guardian_landline = $_POST['guardian-landline'];

				$model->addSenior($senior_id, $first_name, $middle_name, $last_name, $senior_status, $gender, $contact, $landline, $civil_status, $birthdate, $address, $email, $user_id, $password, $guardian_name, $guardian_contact, $guardian_landline);
			}

		?>

		<div id="modal_qr" class="modal fade text-light" tabindex="-1">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header d-flex justify-content-start">
						<button type="button" class="button-close border-0 bg-transparent me-2" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
						<h5 class="modal-title">QR Code</h5>
					</div>
					<form action="#">
						<div class="modal-body text-center mt-4">
							<p>Empty</p>
						</div>
						<div class="modal-footer pt-0 pb-5 border-0 d-flex justify-content-center">
							<button type="button" class="btn btn-dark py-1 px-4 me-4 border-light" data-bs-dismiss="modal">No</button>
							<button type="button" class="btn btn-dark py-1 px-4 ms-4 border-light">Yes</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div id="modal_acts" class="modal fade text-light" tabindex="-1">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header d-flex justify-content-start">
						<button type="button" class="button-close border-0 bg-transparent me-2" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
						<h5 class="modal-title">Activities</h5>
					</div>
					<form action="#">
						<div class="modal-body text-center mt-4">
							<p>Empty</p>
						</div>
						<div class="modal-footer pt-0 pb-5 border-0 d-flex justify-content-center">
							<button type="button" class="btn btn-dark py-1 px-4 me-4 border-light" data-bs-dismiss="modal">No</button>
							<button type="button" class="btn btn-dark py-1 px-4 ms-4 border-light">Yes</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div id="modal_forms" class="modal fade text-light" tabindex="-1">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header d-flex justify-content-start">
						<button type="button" class="button-close border-0 bg-transparent me-2" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
						<h5 class="modal-title">Requests</h5>
					</div>
					<form action="#">
						<div class="modal-body text-center mt-4">
							<p>Empty</p>
						</div>
						<div class="modal-footer pt-0 pb-5 border-0 d-flex justify-content-center">
							<button type="button" class="btn btn-dark py-1 px-4 me-4 border-light" data-bs-dismiss="modal">No</button>
							<button type="button" class="btn btn-dark py-1 px-4 ms-4 border-light">Yes</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<script src="../css/js/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
		<script>
			const edit = document.querySelectorAll('.edit');

			edit.forEach(e => 
				e.addEventListener('click', (event) => {
					const hide = document.querySelector('.hidden' + event.srcElement.dataset.id);
					const show = document.querySelector('.display' + event.srcElement.dataset.id);
					
					hide.classList.remove("d-none");
					show.classList.add("d-none");
				})
			);

			const remove = document.querySelectorAll('.remove');

			remove.forEach(e => 
				e.addEventListener('click', (event) => {
					const hide = document.querySelector('.display' + event.srcElement.dataset.id);
					
					hide.classList.add("d-none");
					
					const archive = document.querySelector('#archive');
					
					const url = new URL(archive);
					url.searchParams.set('item' + event.srcElement.dataset.id, event.srcElement.dataset.id);

					archive.setAttribute('href', url);
				})
			);
		</script>
		<script src="../css/js/jquery.dataTables.min.js"></script>
		<script src="../css/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#table').DataTable();
			});
		</script>
	</body>
</html>