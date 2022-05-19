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
								<a class="nav-link custom_active" href="./information">Accounts</a>
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
						<a class="nav-link text-light custom_active" href="./information.php">Admin Accounts</a>
					</li>

					<li class="nav-item mt-5">
						<a class="nav-link text-light" href="./senior_citizen.php">
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
					<button class="btn btn-dark py-0 px-1 border-light">Export <i class="bi bi-box-arrow-up-right"></i></button>
				</div>
				<div class="col-6 col-md-4 text-center">
					<button class="btn btn-dark py-0 px-3 border-light" data-bs-toggle="modal" data-bs-target="#modal">Add admin</button>
				</div>
				<div class="col-6 col-md-4"></div>
			</div>

			<div id="main_content" class="row m-0 pb-5 pe-0 pe-md-3 rounded-3">
				<div id="table_border" class="p-0 m-2">
					<div class="table-responsive">
						<table id="table" class="table text-light text-center align-middle m-0">
							<thead>
							<tr height="70px" class="align-middle">
								<th class="p-3" scope="col">Admin ID</th>
								<th class="p-3" scope="col">Name</th>
								<th class="p-3" scope="col">Position</th>
								<th class="p-3" scope="col">Email address</th>
								<th class="p-3" scope="col">Mobile Number</th>
								<th class="p-3" scope="col">Action</th>
							</tr>
							</thead>
							<tbody>
								<?php

									$rows = $model->fetchAdminAccounts();

									if (!empty($rows)) {
										foreach ($rows as $row) {

								?>

								<tr class="display1">
									<th class="p-3 searchable" scope="row"><?php echo $row['id_number']; ?></th>
									<td class="p-3 searchable"><?php echo $row['name']; ?></td>
									<td class="p-3"><?php echo $row['position']; ?></td>
									<td class="p-3"><?php echo $row['uname']; ?></td>
									<td class="p-3"><?php echo $row['contact']; ?></td>
									<td class="p-3">
										<ul class="list-unstyled d-flex justify-content-center">
											<li class="me-2"><a href="#" data-id="1" class="edit text-light text-decoration-none" data-bs-toggle="modal" data-bs-target="#edit-<?php echo $row['id']; ?>">Edit</a></li>
											<li class="me-2"><a href="#" data-id="1" class="edit text-light text-decoration-none" data-bs-toggle="modal" data-bs-target="#delete-<?php echo $row['id']; ?>">Delete</a></li>
										</ul>
									</td>
								</tr>

								<div id="delete-<?php echo $row['id']; ?>" class="modal fade text-light" tabindex="-1">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-header d-flex justify-content-start">
												<button type="button" class="button-close border-0 bg-transparent me-2" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
												<h5 class="modal-title">Delete admin</h5>
											</div>
											<form method="POST">
												<div class="modal-body text-center mt-4">
													<input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
													<div class="form-group mb-3">
														<label class="d-block mb-2">Name</label>
														<input type="text" class="form-control rounded-0" value="<?php echo $row['name']; ?>" readonly>
													</div>
													<div class="form-group mb-3">
														<label class="d-block mb-2">Position</label>
														<input type="text" class="form-control rounded-0" value="<?php echo $row['position']; ?>" readonly>
													</div>
													<div class="form-group mb-3">
														<label class="d-block mb-2">Email</label>
														<input type="text" class="form-control rounded-0" value="<?php echo $row['uname']; ?>" readonly>
													</div>
													<div class="form-group mb-3">
														<label class="d-block mb-2">Contact</label>
														<input type="text" class="form-control rounded-0" value="<?php echo $row['contact']; ?>" readonly>
													</div>
												</div>
												<div class="modal-footer pt-0 pb-5 border-0 d-flex justify-content-center">
													<button type="submit" class="btn btn-dark py-1 px-4 border-light" name="delete">Delete</button>
												</div>
											</form>
										</div>
									</div>
								</div>

								<div id="edit-<?php echo $row['id']; ?>" class="modal fade text-light" tabindex="-1">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-header d-flex justify-content-start">
												<button type="button" class="button-close border-0 bg-transparent me-2" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
												<h5 class="modal-title">Edit admin</h5>
											</div>
											<form method="POST">
												<div class="modal-body text-center mt-4">
													<input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
													<div class="form-group mb-3">
														<label class="d-block mb-2">Name</label>
														<input name="name" type="text" class="form-control rounded-0" value="<?php echo $row['name']; ?>" required>
													</div>
													<div class="form-group mb-3">
														<label class="d-block mb-2">Position</label>
														<input name="position" type="text" class="form-control rounded-0" value="<?php echo $row['position']; ?>" required>
													</div>
													<div class="form-group mb-3">
														<label class="d-block mb-2">Email</label>
														<input name="email" type="text" class="form-control rounded-0" value="<?php echo $row['uname']; ?>" required>
													</div>
													<div class="form-group mb-3">
														<label class="d-block mb-2">Contact</label>
														<input name="contact" type="text" class="form-control rounded-0" value="<?php echo $row['contact']; ?>" required>
													</div>
												</div>
												<div class="modal-footer pt-0 pb-5 border-0 d-flex justify-content-center">
													<button type="submit" class="btn btn-dark py-1 px-4 border-light" name="edit">Edit</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								<?php 

										}
									}

									if (isset($_POST['delete'])) {
										$delete_id = $_POST['delete_id'];

										$model->deleteAdmin($delete_id);

										echo "<script>window.open('information', '_self');</script>";
									}

									if (isset($_POST['edit'])) {
										$edit_id = $_POST['edit_id'];
										$name = $_POST['name'];
										$email = $_POST['email'];
										$pos = $_POST['position'];
										$con = $_POST['contact'];

										$model->editAdmin($name, $email, $pos, $con, $edit_id);

										echo "<script>window.open('information', '_self');</script>";
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
						<h5 class="modal-title">Add admin</h5>
					</div>
					<form method="POST">
						<div class="modal-body text-center mt-4">
							<div class="form-group mb-3">
								<label class="d-block mb-2">ID No.</label>
								<input name="id_number" type="text" class="form-control rounded-0" required>
							</div>

							<div class="form-group mb-3">
								<label class="d-block mb-2">Name</label>
								<input name="name" type="text" class="form-control rounded-0" required>
							</div>

							<div class="form-group mb-3">
								<label class="d-block mb-2">Position</label>
								<input name="position" type="text" class="form-control rounded-0" required>
							</div>

							<div class="form-group mb-3">
								<label class="d-block mb-2">Mobile Number</label>
								<input name="contact" type="text" class="form-control rounded-0" required>
							</div>

							<div class="form-group mb-3">
								<label class="d-block mb-2">Email Address</label>
								<input name="email" type="email" class="form-control rounded-0" required>
							</div>

							<div class="form-group mb-3">
								<label class="d-block mb-2">Password</label>
								<input name="password" id="password" type="password" class="form-control rounded-0" required>
							</div>

							<div class="form-group mb-3">
								<label class="d-block mb-2">Re-type Password</label>
								<input name="confirm-password" id="confirm_password" type="password" class="form-control rounded-0" required>
							</div>
						</div>
						<div class="modal-footer pt-0 pb-5 border-0 d-flex justify-content-center">
							<button type="submit" class="btn btn-dark py-1 px-4 border-light" name="add-admin">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php

			if (isset($_POST['add-admin'])) {
				$id_number = $_POST['id_number'];
				$name = $_POST['name'];
				$position = $_POST['position'];
				$contact = $_POST['contact'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

				$model->addAdmin($id_number, $name, $position, $contact, $email, $hashed_password);
			}

		?>
		
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
		</script>
		<script src="../css/js/jquery.dataTables.min.js"></script>
		<script src="../css/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#table').DataTable();
			});

			var password = document.getElementById("password"), confirm_password = document.getElementById("confirm_password");

			function validatePassword() {
				if(password.value != confirm_password.value) {
					confirm_password.setCustomValidity("Passwords don't match.");
				} 

				else {
					confirm_password.setCustomValidity('');
				}
			}

			password.onchange = validatePassword;
			confirm_password.onkeyup = validatePassword;
		</script>
	</body>
</html>