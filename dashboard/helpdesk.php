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
<!-- 
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

		<link href="../css/main.css" rel="stylesheet">
		<link href="../css/dashboard.css" rel="stylesheet">
		<link href="../css/helpdesk.css" rel="stylesheet">

		<style type="text/css">
			::-webkit-scrollbar {
				width: 5px;
			}

			::-webkit-scrollbar-track {
				width: 5px;
				background: #f5f5f5;
			}

			::-webkit-scrollbar-thumb {
				width: 1em;
				background-color: #ddd;
				outline: 1px solid slategrey;
				border-radius: 1rem;
			}

			.text-small {
				font-size: 0.9rem;
			}

			.messages-box, .chat-box {
				height: 510px;
				overflow-y: scroll;
			}

			.rounded-lg {
				border-radius: 0.5rem;
			}

			input::placeholder {
				font-size: 0.9rem;
				color: #999;
			}
		</style>
	</head>
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
						<a class="nav-link text-light custom_active" href="#">Chatbox</a>
					</li>

					<li class="nav-item mt-5">
						<a class="nav-link text-light" href="./req_assist">Requests & Assistance</a>
					</li>

					<li class="nav-item mt-5">
						<a class="nav-link text-light" href="./complaints">Complaints</a>
					</li>

					<li class="nav-item text-center mb-3">
						<a id="logout" class="nav-link text-light" href="#">Log Out</a>
					</li>
				</ul>
			</aside>

			<div id="main_content" class="row m-0 pt-3 pb-5 pe-0 pe-md-3 rounded-3">
				<div id="left_content" class="col-12 col-md-4 sub_content rounded-start">
					<div id="student_list">

					</div>
				</div>

				<div id="right_content" class="col-12 col-md-8 sub_content rounded-end p-3 pe-0 pt-0">
					<div class="pe-3 pt-3" style="max-height: 778px; overflow: auto; overflow-x: hidden; display: flex; flex-direction: column-reverse;">
						<div id="chat-box">

						</div>
					</div>
					<br>
					<form method="POST">
						<div id="send_message" class="row w-100 d-flex justify-content-end ps-5 ps-md-3">
							<input type="text" name="message" id="message" placeholder="Type a message" class="form-control me-5">
							<button type="submit" class="text-light" name="send_message" style="background-color: #153438; border: hidden;"><i class="bi bi-box-arrow-in-right me-1"></i></button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<script src="../css/js/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
		<?php

		$fst = $model->fetchFirstStudent();

		if (!empty($fst)) {
			foreach ($fst as $fsti) {
				$fst = $fsti['SeniorID'];
			}
		}

		?>
		<input type="hidden" class="active" id="temp" data-id="<?php echo $fst; ?>">
		<script type="text/javascript">
			function fetchStudents() {
				var fetch_id = $('.active').data('id'); 

				$.ajax({   
					type: 'POST',
					url: 'messages-library/fetch_students.php',   
					data: { fetch_id : fetch_id },          
					dataType: 'html',              
					success: function(response){                    
						$("#student_list").html(response);        
					}
				});
			}

			function fetchMessages() {
				var fetch_id = $('.active').data('id'); 
				$.ajax({   
					type: 'POST',
					url: 'messages-library/fetch_messages.php',       
					data: { fetch_id : fetch_id },      
					dataType: 'html',              
					success: function(response){                    
						$("#chat-box").html(response);  
						updateReadStatus();
					}
				});
			}

			function updateReadStatus() {
				var fetch_id = $('.active').data('id');

				$.ajax({   
					type: 'POST',
					url: 'messages-library/update_status.php',       
					data: { fetch_id : fetch_id },                  
					success: function(data){                    
					    
					}
				});
			}

			function turnActive(id) {
				$('.active').parent().css('background-color', '');
				$('a').removeClass('active');
				$('#' + id).addClass('active');
				$('.active').parent().css(
					'background-color', '#1e474d'
				)

				fetchMessages();
			}

			$(document).ready(function() {
				fetchStudents();
				setInterval(fetchMessages, 250);
				$('#temp').removeClass('active');

				$(document).on('click', 'button[name="send_message"]', function(e) {
					var fetch_id = $('.active').data('id'); 
					var message = $('#message').val();

					if (!message.trim()) {} 

					else {
						$.ajax({
							url:'messages-library/insert_message.php',
							method:'POST',
							data: {
								fetch_id : fetch_id,
								message: message
							},
							success:function(data){
								$('#message').val('');
								fetchMessages();
								fetchStudents();
							}
						});
					}

					e.preventDefault();
				});
			});
		</script>
	</body>
</html>