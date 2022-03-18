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
		<style type="text/css">
			#image {
				border-radius: 5px;
				cursor: pointer;
				transition: 0.3s;
			}

			#image:hover {opacity: 0.7;}

			.modals {
				display: none;
				position: fixed;
				z-index: 1;
				padding-top: 100px;
				left: 0;
				top: 0;
				width: 100%;
				height: 100%;
				overflow: auto;
				background-color: rgb(0,0,0);
				background-color: rgba(0,0,0,0.9);
			}

			.modal-content {
			    margin: auto;
			    display: block;
			    width: 80%;
			    max-width: 700px;
			}

			.modal-content {
  				animation-name: zoom;
  				animation-duration: 0.6s;
			}

			@keyframes zoom {
  				from {transform:scale(0)}
  				to {transform:scale(1)}
			}

			.close {
  				position: absolute;
  				top: 15px;
  				right: 35px;
  				color: #f1f1f1;
  				font-size: 40px;
  				font-weight: bold;
  				transition: 0.3s;
			}

			.close:hover,
			.close:focus {
  				color: #bbb;
  				text-decoration: none;
  				cursor: pointer;
			}

			@media only screen and (max-width: 700px) {
  				.modal-content {
					width: 100%;
  				}
			}
		</style>
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
								<a class="nav-link custom_active" href="./index">News</a>
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
						<a class="nav-link text-light custom_active" href="./news_archive">Archive</a>
					</li>

					<li class="nav-item text-center mb-3">
						<a id="logout" class="nav-link text-light" href="#">Log Out</a>
					</li>
				</ul>
			</aside>
			
			<br>

			<div id="main_content" class="row m-0 pb-5 pe-0 pe-md-3 rounded-3">
				<div class="table-responsive">
					<table id="table" class="table text-light text-center align-middle m-0">
						<thead>
							<tr height="70px" class="align-middle">
								<th scope="col">Image</th>
								<th scope="col" width="200px">Date From</th>
								<th scope="col" width="200px">Date Until</th>
								<th scope="col">News Title</th>
								<th scope="col">Content</th>
								<th scope="col">Date Added</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php

								$rows = $model->fetchArchivedNews();

								$i = 0;

								if (!empty($rows)) {
									foreach ($rows as $row) {

							?>
							<tr class="display2">
								<td><img class="rounded-3" id="image-<?php echo $i; ?>" style="width: 160px; height: 90px;" src="images/news/<?php echo $row['image_id']; ?>.png"></td>
								<td><?php echo date("m/d/Y g:ia", strtotime($row['date_from'])); ?></td>
								<td><?php echo date("m/d/Y g:ia", strtotime($row['date_until'])); ?></td>
								<td><?php echo $row['title']; ?></td>
								<td><?php echo $row['content']; ?></td>
								<td><?php echo date("m/d/Y g:ia", strtotime($row['date_added'])); ?></td>
								<td class="p-3">
									<ul class="list-unstyled d-flex justify-content-center">
										<li><a href="" class="text-light text-decoration-none" data-bs-toggle="modal" data-bs-target="#modal-<?php echo $row['news_id']; ?>">Restore</a></li>
									</ul>
								</td>
							</tr>

							<div id="image-modal-<?php echo $i; ?>" class="modals">
								<span class="close close-<?php echo $i; ?>">&times;</span>
								<img class="modal-content" id="img-<?php echo $i; ?>">
							</div>

							<div id="modal-<?php echo $row['news_id']; ?>" class="modal fade text-light" tabindex="-1">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header d-flex justify-content-start">
											<button type="button" class="button-close border-0 bg-transparent me-2" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
											<h5 class="modal-title">Restore news</h5>
										</div>
										<form method="POST">
											<div class="modal-body text-center mt-4">
												<input type="hidden" name="hidden_id" value="<?php echo $row['news_id']; ?>">
												<div class="form-group mb-3">
													<label class="d-block mb-2">Date From</label>
													<input name="date-from" type="datetime-local" class="form-control rounded-0" value="<?php echo date("Y-m-d\TH:i:s", strtotime($row['date_from'])); ?>" readonly>
												</div>
												<div class="form-group mb-3">
													<label class="d-block mb-2">Date until</label>
													<input name="date-until" type="datetime-local" class="form-control rounded-0" value="<?php echo date("Y-m-d\TH:i:s", strtotime($row['date_until'])); ?>" readonly>
												</div>
												<div class="form-group mb-3">
													<label class="d-block mb-2">News Title</label>
													<input name="event-title" type="text" class="form-control rounded-0" value="<?php echo $row['title']; ?>" readonly>
												</div>
												<div class="form-group mb-3">
													<label class="d-block mb-2">Content</label>
													<textarea class="form-control rounded-0" name="description" readonly><?php echo $row['content']; ?></textarea>
												</div>
												<div class="form-group mb-3">
													<label class="d-block mb-2">Date until</label>
													<input name="date-until" type="datetime-local" class="form-control rounded-0" value="<?php echo date("Y-m-d\TH:i:s", strtotime($row['date_added'])); ?>" readonly>
												</div>
											</div>
											<div class="modal-footer pt-0 pb-5 border-0 d-flex justify-content-center">
												<button type="submit" class="btn btn-dark py-1 px-4 border-light" name="restore">Restore</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<?php

										if (isset($_POST['restore'])) {
											$news_id = $_POST['hidden_id'];

											$model->updateNewsStatus(1, $news_id);
											echo "<script>window.open('news_archive', '_self');</script>";
										}

										$i++;
									}
								}

							?>
						</tbody>
					</table>
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

			for (let i = 0; i < <?php echo count($rows); ?>; i++) {
				document.getElementById("image-" + i).onclick = function(){
					document.getElementById("image-modal-" + i).style.display = "block";
					document.getElementById("img-" + i).src = this.src;
				}

				var span = document.getElementsByClassName("close-" + i)[0];

				span.onclick = function() {
					document.getElementById("image-modal-" + i).style.display = "none";
				}
			}
		</script>
	</body>
</html>