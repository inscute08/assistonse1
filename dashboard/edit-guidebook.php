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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
		  <link rel="stylesheet" href="froala/css/froala_editor.css">
		  <link rel="stylesheet" href="froala/css/froala_style.css">
		  <link rel="stylesheet" href="froala/css/plugins/code_view.css">
		  <link rel="stylesheet" href="froala/css/plugins/colors.css">
		  <link rel="stylesheet" href="froala/css/plugins/emoticons.css">
		  <link rel="stylesheet" href="froala/css/plugins/image_manager.css">
		  <link rel="stylesheet" href="froala/css/plugins/image.css">
		  <link rel="stylesheet" href="froala/css/plugins/line_breaker.css">
		  <link rel="stylesheet" href="froala/css/plugins/table.css">
		  <link rel="stylesheet" href="froala/css/plugins/char_counter.css">
		  <link rel="stylesheet" href="froala/css/plugins/video.css">
		  <link rel="stylesheet" href="froala/css/plugins/fullscreen.css">
		  <link rel="stylesheet" href="froala/css/plugins/file.css">
		  <link rel="stylesheet" href="froala/css/plugins/quick_insert.css">
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
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
						<a class="nav-link text-light custom_active" href="./guidebook">Privileges</a>
					</li>

					<li class="nav-item text-center mb-3">
						<a id="logout" class="nav-link text-light" href="#">Log Out</a>
					</li>
				</ul>
			</aside>

			<div id="main_content" class="row m-0 pt-3 pb-5">
				<div class="col-12 col-lg-7 text-center p-3 pt-0">
					<form method="POST">
						<article id="main_cont_container" class="border border-light rounded-3 p-3 text-start">
							<h1 class="fs-3 custom_active">Privileges</h1><br>
									<?php

										$rows = $model->fetchInfo('privileges');

										if (!empty($rows)) {
											foreach ($rows as $row) {
												$info = $row['info']; 

											}
										}

									?>
									<textarea name="info" required id="edit" data-id="privileges"><?php echo $info; ?></textarea>
						</article>                    

						<div class="d-block mb-2">
							<button type="submit" class="btn btn-dark py-1 px-4 border-light" name="add">Save Changes</button>
						</div>
						<?php

							if (isset($_POST['add'])) {
								$info = $_POST['info'];

								$model->updateInfo($info);

								echo "<script>window.open('guidebook', '_self');</script>";
							}

						?>
					</form>
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
									<ul id="privileges_m">
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
									</ul>
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
		<script type="text/javascript" src="froala/js/froala_editor.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/align.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/char_counter.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/colors.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/draggable.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/emoticons.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/entities.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/file.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/font_size.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/font_family.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/fullscreen.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/image.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/image_manager.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/line_breaker.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/inline_style.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/link.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/quick_insert.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/quote.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/table.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/save.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/url.min.js"></script>
  <script type="text/javascript" src="froala/js/plugins/video.min.js"></script>
		  <script>
		    (function () {
		      FroalaEditor.DefineIcon('alert', { NAME: 'info', SVG_KEY: 'help' })
		      FroalaEditor.RegisterCommand('alert', {
		        title: 'Hello',
		        focus: false,
		        undo: false,
		        refreshAfterCallback: false,
		        callback: function () {
		          alert('Input your abstract here!')
		        }
		      })

		      FroalaEditor.DefineIcon('clear', { NAME: 'remove', SVG_KEY: 'remove' })
		      FroalaEditor.RegisterCommand('clear', {
		        title: 'Clear HTML',
		        focus: false,
		        undo: true,
		        refreshAfterCallback: true,
		        callback: function () {
		          this.html.set('')
		          this.events.focus()
		        }
		      })

		      FroalaEditor.DefineIcon('insert', { NAME: 'plus', SVG_KEY: 'add' })
		      FroalaEditor.RegisterCommand('insert', {
		        title: 'Insert HTML',
		        focus: true,
		        undo: true,
		        refreshAfterCallback: true,
		        callback: function () {
		          this.html.insert('My New HTML')
		        }
		      })

		      new FroalaEditor("#edit", {
		        toolbarButtons: [ ['undo', 'redo', 'bold'], ['alert', 'clear', 'insert'] ]
		      })
		    })()
		  </script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#table').DataTable();
			});
		</script>
	</body>
</html>