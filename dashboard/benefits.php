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
								<a class="nav-link" href="./activities">Activities</a>
							</li>
							<li class="nav-item flex-fill">
								<a class="nav-link custom_active" href="./guidebook">Guidebook</a>
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
						<a class="nav-link text-light" href="./guidebook">Privileges</a>
					</li>

					<li class="nav-item mt-5">
						<a class="nav-link text-light custom_active" href="./benefits">Benefits</a>
					</li>

					<li class="nav-item mt-5">
						<a class="nav-link text-light" href="./discounts">Discounts</a>
					</li>

					<li class="nav-item mt-5">
						<a class="nav-link text-light" href="./facts">Facts</a>
					</li>
					
					<!--<li class="nav-item mt-5 text-center">
						<a href="#" class="text-light"><i class="bi bi-plus-circle-fill"></i></a>
					</li>-->

					<li class="nav-item text-center mb-3">
						<a id="logout" class="nav-link text-light" href="#">Log Out</a>
					</li>
				</ul>
			</aside>

			<div id="main_content" class="row m-0 pt-3 pb-5">
				<div class="col-12 col-lg-7 text-center p-3 pt-0">
					<article id="main_cont_container" class="border border-light rounded-3 p-3 text-start">
						<h1 class="fs-3 custom_active">Benefits</h1>
						<table id="table" class="table text-light text-center align-middle m-0">
							<thead>
								<tr class="align-middle">
									<th scope="col">Benefits</th>
									<th scope="col">Date Added</th>
								</tr>
							</thead>
							<tbody>
								<?php

									$rows = $model->fetchInfo('benefits');

									if (!empty($rows)) {
										foreach ($rows as $row) {

								?>
								<tr class="display2">
									<td><?php echo $row['info']; ?></td>
									<td><?php echo $row['date_added']; ?></td>
								</tr>
								<?php

										}
									}

								?>
							</tbody>
						</table>
					</article>                    

					<div class="d-block mb-2">
						<a target="" class="button btn btn-dark px-5 border-1 border-light" href="" data-bs-toggle="modal" data-bs-target="#modal">Add benefit</a>
					</div>

					<div id="modal" class="modal fade text-light" tabindex="-1">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header d-flex justify-content-start">
									<button type="button" class="button-close border-0 bg-transparent me-2" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
									<h5 class="modal-title">Add benefit</h5>
								</div>
								<form method="POST">
									<div class="modal-body text-center mt-4">
										<div class="form-group mb-3">
											<input name="info" type="text" class="form-control rounded-0" required>
										</div>
									</div>
									<div class="modal-footer pt-0 pb-5 border-0 d-flex justify-content-center">
										<button type="submit" class="btn btn-dark py-1 px-4 border-light" name="add">Add benefit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<?php

						if (isset($_POST['add'])) {
							$info = $_POST['info'];

							$model->addInfo('benefits', $info);

							echo "<script>window.open('benefits', '_self');</script>";
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
								  Benefits <a href="#" id="down_arrow" class="text-center"><i class="bi bi-chevron-down"></i></a>
								</button>

								<div class="summary_content text-dark mt-3">
									<table class="table text-light text-center align-middle m-0">
										<tbody>
											<?php

												$rows = $model->fetchInfo('benefits');

												if (!empty($rows)) {
													foreach ($rows as $row) {

											?>
											<tr class="display2" style="background-color: #f6e379; color: black;">
												<td><?php echo $row['info']; ?></td>
												<td><?php echo $row['date_added']; ?></td>
											</tr>
											<?php

													}
												}

											?>
										</tbody>
									</table>
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