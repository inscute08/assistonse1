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
		<link href="../css/activities.css" rel="stylesheet">
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
								<a class="nav-link custom_active" href="./activities">Activities</a>
							</li>
							<li class="nav-item flex-fill">
								<a class="nav-link" href="./guidebook">Guidebook</a>
							</li>
							<li class="nav-item flex-fill">
								<a class="nav-link" href="./information">Information</a>
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
						<a class="nav-link text-light custom_active" href="./activities">Upcoming Activities</a>
					</li>

					<li class="nav-item mt-5">
						<a class="nav-link text-light" href="./prev_activities">Previous Activities</a>
					</li>

					<li class="nav-item text-center mb-3">
						<a id="logout" class="nav-link text-light" href="#">Log Out</a>
					</li>
				</ul>
			</aside>

			<div id="brgy_buttons" class="row m-0 pt-3 pe-0 pe-md-3 rounded-3">
				<div class="col-12 col-md-4 fs-6 mb-3 mb-md-0">
					<a class="btn btn-dark py-0 px-1 border-light" id="archive" href="./archive_activities">See Archive</a>
					<button class="btn btn-dark py-0 px-1 border-light">Export <i class="bi bi-box-arrow-up-right"></i></button>
				</div>
				<div class="col-12 col-md-4 text-center">
					<a class="btn btn-dark py-0 px-3 border-light" data-bs-toggle="modal" data-bs-target="#modal">Add Activity</a>
				</div>
			</div>

			<div id="main_content" class="row m-0 pb-5 pe-0 pe-md-3 rounded-3">
				<div class="table-responsive">
									<table id="table" class="table text-light text-center align-middle m-0">
										<thead>
										<tr height="70px" class="align-middle">
											<th scope="col">Control No.</th>
											<th scope="col" width="200px">Date & Time</th>
											<th scope="col">Activity Type</th>
											<th scope="col">Event Title</th>
											<th scope="col">Description</th>
											<th scope="col">Organizer</th>
											<th scope="col">Venue</th>
											<th scope="col" class="px-5">Benefits</th>
											<th scope="col" class="px-4">Amount</th>
											<th scope="col">Action</th>
											
										</tr>
										</thead>
										<tbody>
											<?php

									$rows = $model->fetchUpcomingActivities(1);

									if (!empty($rows)) {
										foreach ($rows as $row) {

								?>
											<tr class="display2">
									<th scope="row"><?php echo $row['control_no']; ?></th>
									<td>
										Date From: <br>
										<?php echo date("m/d/Y g:ia", strtotime($row['date_from'])); ?> <br><br>

										Date until: <br>
										<?php echo date("m/d/Y g:ia", strtotime($row['date_until'])); ?>
									</td>
									<td><?php echo $row['activity_type']; ?></td>
									<td><?php echo $row['event_title']; ?></td>
									<td><?php echo $row['description']; ?></td>
									<td><?php echo $row['organizer']; ?></td>
									<td><?php echo $row['venue']; ?></td>
									<td>
										<ul class="list-unstyled text-start">
											<li><?php echo $row['benefits']; ?></li>
											<li class="text-center"><a href="#" class="text-light text-decoration-none"><i class="bi bi-plus-circle-fill"></i></a></li>
										</ul>
									</td>
									<td>
										<ul class="list-unstyled text-start">
											<li><?php echo $row['amount']; ?></li>
										</ul>
									</td>
									<td>
										<ul class="list-unstyled">
											<li><a href="edit_activity?id=<?php echo $row['control_no']; ?>" data-id="2" class="edit text-light text-decoration-none">Edit</a></li>
											<li><a href="#" data-id="2" class="remove text-light text-decoration-none" data-bs-toggle="modal" data-bs-target="#update_status-<?php echo $row['control_no']; ?>">Remove</a></li>
										</ul>
									</td>
								</tr>

								<div id="update_status-<?php echo $row['control_no']; ?>" class="modal fade text-light" tabindex="-1">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-header d-flex justify-content-start">
												<button type="button" class="button-close border-0 bg-transparent me-2" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
												<h5 class="modal-title">Archive activity</h5>
											</div>
											<form method="POST">
												<div class="modal-body text-center mt-4">
													<input type="hidden" name="sen_id" value="<?php echo $row['control_no']; ?>">
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
										$rmv_id = $_POST['sen_id'];
										$status = 4;

										$model->updateActivityStatus($rmv_id, $status);

										echo "<script>window.open('activities', '_self');</script>";
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
						<h5 class="modal-title">Add activity</h5>
					</div>
					<form method="POST">
						<div class="modal-body text-center mt-4">
							<div class="form-group mb-3">
								<label class="d-block mb-2">Date From</label>
								<input name="date-from" type="datetime-local" class="form-control rounded-0" required>
							</div>
							<div class="form-group mb-3">
								<label class="d-block mb-2">Date until</label>
								<input name="date-until" type="datetime-local" class="form-control rounded-0" required>
							</div>
							<div class="form-group mb-3">
								<label class="d-block mb-2">Activity Type</label>
								<input name="activity-type" type="text" class="form-control rounded-0" required>
							</div>
							<div class="form-group mb-3">
								<label class="d-block mb-2">Event Title</label>
								<input name="event-title" type="text" class="form-control rounded-0" required>
							</div>
							<div class="form-group mb-3">
								<label class="d-block mb-2">Description</label>
								<textarea class="form-control rounded-0" name="description" required></textarea>
							</div>
							<div class="form-group mb-3">
								<label class="d-block mb-2">Organizer</label>
								<input name="organizer" type="text" class="form-control rounded-0" required>
							</div>
							<div class="form-group mb-3">
								<label class="d-block mb-2">Venue</label>
								<input name="venue" type="text" class="form-control rounded-0" required>
							</div>
							<div class="form-group mb-3">
								<label class="d-block mb-2">Benefits</label>
								<input name="benefits" type="text" class="form-control rounded-0" required>
							</div>
							<div class="form-group mb-3">
								<label class="d-block mb-2">Amount</label>
								<input name="amount" type="text" class="form-control rounded-0" required>
							</div>
						</div>
						<div class="modal-footer pt-0 pb-5 border-0 d-flex justify-content-center">
							<button type="submit" class="btn btn-dark py-1 px-4 border-light" name="add-activity">Add activity</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php

			if (isset($_POST['add-activity'])) {
				$date_from = $_POST['date-from'];
				$date_until = $_POST['date-until'];
				$activity_type = $_POST['activity-type'];
				$event_title = $_POST['event-title'];
				$description = trim($_POST['description']);
				$organizer = $_POST['organizer'];
				$venue = $_POST['venue'];
				$benefits = $_POST['benefits'];
				$amount = $_POST['amount'];

				$model->addActivity($date_from, $date_until, $activity_type, $event_title, $description, $organizer, $venue, $benefits, $amount);
			}

		?>
		
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