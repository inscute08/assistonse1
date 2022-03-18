<?php

	session_start();
	include('global/model.php');

	if (isset($_SESSION['sess'])) {
		echo "<script>window.open('dashboard/index.html','_self');</script>";
	}

	if (isset($_POST['submit'])) {
		if (!isset($_COOKIE['rlimited'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];

			$model = new Model();
			$model->signIn($email, $password);  
		}

		else {
			echo "<script>alert('Wait before trying again!')</script>";
		}
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Design</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
		<link href="./css/main.css" rel="stylesheet">
	<body>
		<div class="d-flex h-100 align-items-center justify-content-center">
			<form id="login_form" class="p-3" method="POST">
				<div class="mb-5 text-center">
					<img width="150px" src="./img/logo.png" alt="assist onse">
				</div>
				<div class="mb-5">
				  <label for="email" class="form-label d-block text-center">Email address:</label>
				  <input type="email" class="form-control rounded-0" name="email" id="email">
				</div>
				<div class="mb-4">
				  <label for="password" class="form-label d-block text-center">Password:</label>
				  <input type="password" class="form-control rounded-0" name="password" id="password">
				</div>
				<div class="text-center">
					<?php

						if (isset($_COOKIE['rlimited'])) {
							echo '<button type="submit" class="btn btn-primary w-50 bg-transparent rounded-0 border-1 border-light" name="submit" disabled>Login</button>';
						}

						else {
							echo '<button type="submit" class="btn btn-primary w-50 bg-transparent rounded-0 border-1 border-light" name="submit">Login</button>';
						}

					?>
				</div>
			</form>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	</body>
</html>