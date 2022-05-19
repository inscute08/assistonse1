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
		<link href="../css/helpdesk.css" rel="stylesheet">
		<link href="../css/barangay_clearance.css" rel="stylesheet">
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
								<a class="nav-link custom_active" href="./helpdesk">Helpdesk</a>
							</li>
							<li class="nav-item flex-fill">
								<a class="nav-link" href="./activities">Activities</a>
							</li>
							<li class="nav-item flex-fill">
								<a class="nav-link" href="./guidebook">Guidebook</a>
							</li>
							<li class="nav-item flex-fill">
								<a class="nav-link" href="./information">Accounts</a>
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
						<a class="nav-link text-light"href="helpdesk">Chatbox</a>
					</li>

					<li class="nav-item mt-5">
						<a class="nav-link text-light" href="./req_assist">Requests & Assistance</a>
					</li>

					<li class="nav-item mt-5">
						<a class="nav-link text-light custom_active" href="./complaints">Complaints</a>
					</li>

					<li class="nav-item text-center mb-3">
						<a id="logout" class="nav-link text-light" href="#">Log Out</a>
					</li>
				</ul>
			</aside>
			
			<div id="brgy_buttons" class="row m-0 pt-3 pe-0 pe-md-3 rounded-3">
			<div class="col-12 col-md-4 fs-6 mb-3 mb-md-0">
				<a class="btn btn-dark py-0 px-1 border-light" href="./archive_complaints" id="archive">See Archive</a>
				<a class="btn btn-dark py-0 px-1 border-light">Export <i class="bi bi-box-arrow-up-right"></i></a>
			</div>
			<div class="col-6 col-md-4 text-center">
				
			</div>
			<div class="col-6 col-md-4"></div>
		</div>

		<div id="main_content" class="row m-0 pb-5 pe-0 pe-md-3 rounded-3">
			<div id="table_border" class="p-0 m-2">
				<div class="table-responsive">
					<table class="table text-light text-center align-middle m-0" id="table">
						<thead>
							<tr height="70px" class="align-middle">
								<th class="p-3" scope="col">Control No.</th>
								<th class="p-3" scope="col">Date Submitted</th>
								<th class="p-3" scope="col">Time Submitted</th>
								<th class="p-3" scope="col">SC ID No.</th>
								<th class="p-3" scope="col">Name</th>
								<th class="p-3 px-5" scope="col">Residence Address</th>
								<th class="p-3 px-5" scope="col">Complaint</th>
								<th class="p-3" scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php

								$rows = $model->fetchComplaints(1); 
								
								if (!empty($rows)) {
									foreach ($rows as $row) {

							?>
							<tr class="display1">
								<th class="p-3 searchable" scope="row"><?php echo $row['id']; ?></th>
								<th class="p-3" scope="row"><?php echo date('m/d/Y', strtotime($row['complaint_date'])); ?></th>
								<th class="p-3" scope="row"><?php echo date('g:ia', strtotime($row['complaint_date'])); ?></th>
								<th class="p-3" scope="row"><?php echo $row['SeniorID']; ?></th>
								<td class="p-3 searchable"><?php echo $row['SenLastName'].', '.$row['SenFirstName'].' '.$row['SenMiddleName']; ?></td>
								<td><?php echo $row['HomeAdd']; ?></td>
								<td class="p-3"><?php echo $row['complaint_statement']; ?></td>
								<td class="p-3">
									<ul class="list-unstyled">
										<li><a href="#" class="text-light text-decoration-none" data-bs-toggle="modal" data-bs-target="#modal_forward">Forward</a></li>
										<li><a href="#" data-id="1" class="remove text-light text-decoration-none" data-bs-toggle="modal" data-bs-target="#remove-<?php echo $row['id']; ?>">Archive</a></li>
									</ul>
								</td>
							</tr>

							<div id="remove-<?php echo $row['id']; ?>" class="modal fade text-light" tabindex="-1">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
											<div class="modal-header d-flex justify-content-start">
												<button type="button" class="button-close border-0 bg-transparent me-2" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
												<h5 class="modal-title">Archive complaint</h5>
											</div>
										<form method="POST">
											<div class="modal-body text-center mt-4">
												<input type="hidden" name="remove_id" value="<?php echo $row['id']; ?>">
												<div class="form-group mb-3">
													<label class="d-block mb-2">Name</label>
													<input type="text" class="form-control rounded-0" value="<?php echo $row['SenLastName'].', '.$row['SenFirstName'].' '.$row['SenMiddleName']; ?>" readonly>
												</div>
												<div class="form-group mb-3">
													<label class="d-block mb-2">Complaint</label>
													<input type="text" class="form-control rounded-0" value="<?php echo $row['complaint_statement']; ?>" readonly>
												</div>
												<div class="form-group mb-3">
													<label class="d-block mb-2">Complaint Date</label>
													<input type="text" class="form-control rounded-0" value="<?php echo date('m/d/Y g:ia', strtotime($row['complaint_date'])); ?>" readonly>
												</div>
											</div>
											<div class="modal-footer pt-0 pb-5 border-0 d-flex justify-content-center">
												<button type="submit" class="btn btn-dark py-1 px-4 border-light" name="remove">Archive</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<?php

									}
								}

								if (isset($_POST['remove'])) {
									$remove_id = $_POST['remove_id'];
									$status = 4;

									$model->updateComplaintStatus($remove_id, $status);

									echo "<script>window.open('complaints', '_self');</script>";
								}

							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>        

		<div id="modal" class="modal fade text-light" tabindex="-1">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				<div class="modal-header d-flex justify-content-start">
					<button type="button" class="button-close border-0 bg-transparent me-2" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
					<h5 class="modal-title">View Profile</h5>
				</div>
				<div class="modal-body text-center mt-4">
					<p class="m-0">Are you sure that the request is approved? <br>
						The request entry will be transferred <br>
						to the requests history.</p>
				</div>
				<div class="modal-footer pt-0 pb-5 border-0 d-flex justify-content-center">
					<button type="button" class="btn btn-dark py-1 px-4 me-4 border-light" data-bs-dismiss="modal">No</button>
					<button type="button" class="btn btn-dark py-1 px-4 ms-4 border-light">Yes</button>
				</div>
				</div>
			</div>
		</div>

		<div id="modal_forward" class="modal fade text-light" tabindex="-1">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				<div class="modal-header d-flex justify-content-start">
					<button type="button" class="button-close border-0 bg-transparent me-2" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
					<h5 class="modal-title">Forward</h5>
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
		<script src="../css/js/jquery.dataTables.min.js"></script>
		<script src="../css/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#table').DataTable();
			});
		</script>
	</body>
</html>