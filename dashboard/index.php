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
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

		<link href="../css/main.css" rel="stylesheet">
		<link href="../css/dashboard.css" rel="stylesheet">
		<link href="../css/barangay_clearance.css" rel="stylesheet">
		<link href="../css/activities.css" rel="stylesheet">
		<link href="../css/registrations.css" rel="stylesheet">
		<link href="../css/edit_articles.css" rel="stylesheet">
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
								<a class="nav-link" href="./information.php">Accounts</a>
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
						<a class="nav-link text-light" href="./news_archive">Archive</a>
					</li>

					<li class="nav-item text-center mb-3">
						<a id="logout" class="nav-link text-light" href="../index">Log Out</a>
					</li>
				</ul>
			</aside>

			<div id="main_content" class="row m-0 pt-3 pb-5">
				<div class="col-12 col-lg-8 text-center p-3">
					<a class="button btn btn-dark px-5 border-1 border-light" data-bs-toggle="modal" data-bs-target="#modal">Add News</a>
					<a class="button btn btn-dark px-5 border-1 border-light" href="edit_articles">Edit</a>

					<?php

						$rows = $model->fetchNews();

						if (!empty($rows)) {
							foreach ($rows as $row) {

					?>
					<article class="border border-light rounded-3 mt-3 p-3 text-start">
						 <div class="article_menu px-1">
							<div class="dropdown">
								<span id="dropdownMenu" data-bs-toggle="dropdown"><a href="#">...</a></span>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenu">
								  <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#modal-<?php echo $row['news_id']; ?>">Archive</a></li>
								</ul>
							</div>
						</div>

						<img class="rounded-3" width="100%" src="images/news/<?php echo $row['image_id']; ?>.png">

						<h1 class="mt-3"><?php echo $row['title']; ?></h1>

						<small class="container-fluid">
							<div class="row">
								<span class="col-6">Date from: <?php echo $row['date_from']; ?></span> 
								<span class="col-6">Date until: <?php echo $row['date_until']; ?></span>
							</div>
						</small>
						<p class="mt-4"><?php echo $row['content']; ?></p>
					</article>

					<div id="modal-<?php echo $row['news_id']; ?>" class="modal fade text-light" tabindex="-1">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header d-flex justify-content-start">
									<button type="button" class="button-close border-0 bg-transparent me-2" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
									<h5 class="modal-title">Archive news</h5>
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
										<button type="submit" class="btn btn-dark py-1 px-4 border-light" name="archive">Archive</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<?php

								if (isset($_POST['archive'])) {
									$news_id = $_POST['hidden_id'];

									$model->updateNewsStatus(0, $news_id);
									echo "<script>window.open('index', '_self');</script>";
								}
							}
						}

					?>
				</div>
			</div>

			<div id="modal" class="modal fade text-light" tabindex="-1">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header d-flex justify-content-start">
							<button type="button" class="button-close border-0 bg-transparent me-2" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
							<h5 class="modal-title">Add activity</h5>
						</div>
						<form method="POST" enctype="multipart/form-data">
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
									<label class="d-block mb-2">Image</label>
									<input class="form-control" name="image" type="file" accept="image/*" required>
								</div>
								<div class="form-group mb-3">
									<label class="d-block mb-2">Title</label>
									<input name="title" type="text" class="form-control rounded-0" required>
								</div>
								<div class="form-group mb-3">
									<label class="d-block mb-2">Content</label>
									<textarea class="form-control rounded-0" name="content" required></textarea>
								</div>
							</div>
							<div class="modal-footer pt-0 pb-5 border-0 d-flex justify-content-center">
								<button type="submit" class="btn btn-dark py-1 px-4 border-light" name="add-activity">Add News</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<?php

				if (isset($_POST['add-activity'])) {
					$date_from = $_POST['date-from'];
					$date_until = $_POST['date-until'];
					$title = $_POST['title'];
					$content = trim($_POST['content']);

					$path = 'images/news/';
					$unique_name = time().uniqid(rand());
					$destination = $path . $unique_name . '.png';
					$basename = basename($_FILES["image"]["name"]);
					$type = strtolower(pathinfo($path . $basename, PATHINFO_EXTENSION));

					if($type == 'jpg' || $type == 'jpeg' || $type == 'png' || $type == 'gif') {
						$name = $_FILES["image"]["tmp_name"];
						move_uploaded_file($name, $destination);

						$model->addNews($date_from, $date_until, $title, $basename, $unique_name, $content);
					}

					else {
						echo "<script>alert('Only images are allowed.');window.open('index', '_self')</script>";
					}
				}

			?>
		</div>
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	</body>
</html>