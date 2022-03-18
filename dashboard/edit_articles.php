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
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

		<link href="../css/main.css" rel="stylesheet">
		<link href="../css/dashboard.css" rel="stylesheet">
		<link href="../css/edit_articles.css" rel="stylesheet">
		<link href="../css/news_archive.css" rel="stylesheet">
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
						<a class="nav-link text-light" href="./news_archive">Archive</a>
					</li>

					<li class="nav-item text-center mb-3">
						<a id="logout" class="nav-link text-light" href="#">Log Out</a>
					</li>
				</ul>
			</aside>

			<div id="main_content" class="row m-0 pt-3 pb-5">
				<div class="col-12 col-lg-8 text-center p-3">
					<div>
						<?php

							$rows = $model->fetchNews();

							if (!empty($rows)) {
								foreach ($rows as $row) {

						?>
						<form method="POST">
							<article class="border border-light rounded-3 mt-3 p-3 text-start">
								<img class="rounded-3" width="100%" src="images/news/<?php echo $row['image_id']; ?>.png" alt="People cleaning on the road's sidewalk">
								
								<fieldset class="pt-3">
									<input type="hidden" name="news_id" value="<?php echo $row['news_id']; ?>">
									<input type="text" data-id="1" name="title" class="title form-control bg-dark text-light" value="<?php echo $row['title']; ?>" required>

									<div class="container-fluid pt-3 d-block">
										<div class="row">
											<div class="col-6">
												<div class="row">
													<div class="col-auto">
														<label for="email" class="form-label d-block">Date from:</label>
													</div>
													<div class="col-12 col-md-6">
														<input type="datetime-local" name="date_from" data-id="1" class="sdate form-control bg-dark text-light rounded-1 mb-3 w-100" value="<?php echo date("Y-m-d\TH:i:s", strtotime($row['date_from'])); ?>" required>
													</div>
												</div>
											</div> 
											<div class="col-6">
												<div class="row">
													<div class="col-auto">
														<label for="email" class="form-label d-block">Date until:</label>
													</div>
													<div class="col-12 col-md-6">
														<input type="datetime-local" name="date_until" data-id="1" class="sdate form-control bg-dark text-light rounded-1 mb-3 w-100" value="<?php echo date("Y-m-d\TH:i:s", strtotime($row['date_until'])); ?>" required>
													</div>
												</div>
											</div>
										</div>
									</div>
								</fieldset>

								<textarea data-id="1" class="desc form-control mt-4 w-100 text-light bg-dark" col="5" name="content" required><?php echo $row['content']; ?></textarea>
							</article>

							<div class="d-block mb-2">
								<button name="save" type="submit" class="button btn btn-dark px-5 border-1 border-light">Save</button>
							</div>
						</form>
						<?php

								}
							}

							if (isset($_POST['save'])) {
								$title = $_POST['title'];
								$date_from = $_POST['date_from'];
								$date_until = $_POST['date_until'];
								$content = trim($_POST['content']);
								$news_id = $_POST['news_id'];

								$model->updateNews($title, $date_from, $date_until, $content, $news_id);
							}

						?>
					</div>
				</div>
				<div class="d-md-none d-lg-block col-lg-4" id="summary_div">
					<div id="summary" class="sticky-top">
						<div id="subheader" class="text-center p-3">
							<img src="../img/logo_2.png" width="100px">
							<img id="person" src="../img/subheader.png">
							<img id="border" class="w-100" src="../img/subheader_border.png">
						</div>
						<h3 class="text-center m-0">TOP NEWS <hr></h3>
						<div id="summary_contents" class="p-3">
							<div class="articles text-light rounded-3 p-2">
								<h4 class="title_m1">Title title title title title title title title</h4>
								
								<img src="../img/article/1.png" width="100%">

								<small class="date_m1">2021-01-01</small>
								<p class="desc_m1">Lorem ipsum do</p>
							</div>

							<div class="articles text-light rounded-3 p-2">
								<h4 class="title_m2">Title title title title title title title title</h4>
								
								<img src="../img/article/1.png" width="100%">

								<small class="date_m2">2021-01-01</small>
								<p class="desc_m2">Lorem ipsum do</p>
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
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
		<script>
			let selectElement = document.querySelectorAll('.title');

			selectElement.forEach(e => 
				e.addEventListener('keyup', (event) => {
					const target = document.querySelector('.title_m' + event.srcElement.dataset.id);
					
					target.innerHTML = event.srcElement.value;
				})
			);

			selectElement = document.querySelectorAll('.sdate');

			selectElement.forEach(e => 
				e.addEventListener('change', (event) => {
					const target = document.querySelector('.date_m' + event.srcElement.dataset.id);
					
					target.innerHTML = event.srcElement.value;
				})
			);

			selectElement = document.querySelectorAll('.desc');

			selectElement.forEach(e => 
				e.addEventListener('keyup', (event) => {
					const target = document.querySelector('.desc_m' + event.srcElement.dataset.id);
					
					target.innerHTML = event.srcElement.value;
				})
			);
		</script>
	</body>
</html>