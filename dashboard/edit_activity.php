<?php    

	session_start();
	include('../global/model.php');
	$model = new Model();

	if (empty($_SESSION['sess'])) {
		echo "<script>window.open('../','_self');</script>";
	}

	if (empty($_GET['id'])) {
		echo "<script>window.open('index', '_self');</script>";
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
		<link href="../css/edit_articles.css" rel="stylesheet">
		<link href="../css/guidebook.css" rel="stylesheet">
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
						<a class="nav-link text-light" href="./activities">Upcoming Activities</a>
					</li>

					<li class="nav-item mt-5">
						<a class="nav-link text-light custom_active" href="./prev_activities">Previous Activities</a>
					</li>

					<li class="nav-item text-center mb-3">
						<a id="logout" class="nav-link text-light" href="#">Log Out</a>
					</li>
				</ul>
			</aside>

			<div id="main_content" class="row m-0 pt-3 pb-5">
				<div class="col-12 col-lg-7 text-center p-3 pt-0">
					<?php

						$rows = $model->fetchActivitiesDetails($_GET['id']);

						if (!empty($rows)) {
							foreach ($rows as $row) {

					?>
					<form method="POST">
						<article id="main_cont_container" class="border border-light rounded-3 p-3 text-start">
							<h1 class="fs-3 custom_active">Edit Activity</h1>
							<label class="d-block mb-2">Date From</label>
							<input name="date-from" type="datetime-local" class="form-control rounded-0" value="<?php echo date("Y-m-d\TH:i:s", strtotime($row['date_from'])); ?>" required>
							<br>
							<label class="d-block mb-2">Date until</label>
							<input name="date-until" type="datetime-local" class="form-control rounded-0" value="<?php echo date("Y-m-d\TH:i:s", strtotime($row['date_until'])); ?>" required>
							<br>
							<label class="d-block mb-2">Activity Type</label>
							<input name="activity-type" type="text" class="form-control rounded-0" value="<?php echo $row['activity_type']; ?>" required>
							<br>
							<label class="d-block mb-2">Event Title</label>
							<input name="event-title" type="text" class="form-control rounded-0" value="<?php echo $row['event_title']; ?>" required>
							<br>
							<label class="d-block mb-2">Description</label>
							<textarea class="form-control rounded-0" name="description" required><?php echo $row['description']; ?></textarea>
							<br>
							<label class="d-block mb-2">Organizer</label>
							<input name="organizer" type="text" class="form-control rounded-0" value="<?php echo $row['organizer']; ?>" required>
							<br>
							<label class="d-block mb-2">Venue</label>
							<input name="venue" type="text" class="form-control rounded-0" value="<?php echo $row['venue']; ?>" required>
						</article>
						<div class="d-block mb-2">
							<button type="submit" name="edit" class="btn btn-dark py-1 px-4 border-light">Edit Activity</button>
						</div>
					</form>                    
					<?php

							}
						}

						if (isset($_POST['edit'])) {
							$date_from = $_POST['date-from'];
							$date_until = $_POST['date-until'];
							$activity_type = $_POST['activity-type'];
							$event_title = $_POST['event-title'];
							$description = trim($_POST['description']);
							$organizer = $_POST['organizer'];
							$venue = $_POST['venue'];

							$model->updateActivities($date_from, $date_until, $activity_type, $event_title, $description, $organizer, $venue, $_GET['id']);
						}

					?>
				</div>
				<div class="col-12 col-lg-5 p-0 d-flex justify-content-start" id="summary_div">
					<div id="summary" class="m-0">
						<div id="subheader" class="text-center p-3">
							<a href="#" id="left_arrow" class="text-center"><i class="bi bi-chevron-left"></i></a>
							<a href="#" id="search2" class="text-center"><i class="bi bi-search"></i></a>
							<a href="#" id="bell" class="text-center"><i class="bi bi-bell-fill"></i></a>
							<img src="../img/logo_2.png" width="100px">
							<img id="border" class="w-100" src="../img/subheader_border.png">
						</div>
						<h3 class="text-center m-0">
							GUIDEBOOK
							<i id="guide" class="bi bi-file-earmark-person"></i>
							<hr>
						</h3>
						<div id="summary_contents" class="p-3">
							<div class="dropdown">
								<button id="main_dropdown" class="btn btn-light dropdown-toggle d-block w-100" type="button">
								  Privileges <a href="#" id="down_arrow" class="text-center"><i class="bi bi-chevron-down"></i></a>
								</button>

								<div class="summary_content text-dark mt-3">
											<?php

												$rows = $model->fetchInfo('privileges');

												if (!empty($rows)) {
													foreach ($rows as $row) {

											?>
											<?php echo $row['info']; ?>
											<?php

													}
												}

											?>
								</div>
							  </div>
						</div>

						<div id="summary_nav">
							<ul class="nav d-flex px-1">
								<li class="nav-item flex-fill">
									<a class="nav-link active text-center" aria-current="page" href="#">
										<i class="bi bi-house-door-fill d-block"></i>HOME
									</a>
								</li>
								<li class="nav-item flex-fill">
									<a class="nav-link text-center" href="#">
										<i class="bi bi-card-checklist d-block"></i>ACTIVITIES
									</a>
								</li>
								<li class="nav-item flex-fill">
									<a class="nav-link text-center" href="#">
										<i class="bi bi-person-lines-fill d-block"></i>HELPDESK
									</a>
								</li>
								<li class="nav-item flex-fill">
									<a class="nav-link text-center" href="#">
										<i class="bi bi-journal d-block"></i>GUIDEBOOK
									</a>
								</li>
								<li class="nav-item flex-fill">
									<a class="nav-link text-center" href="#">
										<i class="bi bi-gear-fill d-block"></i>SETTINGS
									</a>
								</li>
							</ul>
						</div>
					</div>
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