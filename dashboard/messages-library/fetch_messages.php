<?php

	session_start();
	include('../../global/model.php');
	$model = new Model();

	$msgRows = $model->fetchMessages($_POST['fetch_id']);
	
	if (!empty($msgRows)) {
		foreach ($msgRows as $msg) {
			$type = $msg['user_type'];
			$message = $msg['message'];
			$time = $msg['timestamp'];
			$status = $msg['status'];

			if ($type == "student") {
				echo '
					<div class="row" style="margin-bottom: 20px;">
						<div class="col-8 d-flex">
							 <p class="ms-2 mb-0 p-3 border flex-fill">'.$message.'</p>
						</div>
						<div class="col-12" style="padding-left: 30px;">
							<small>'.date('m/d/Y g:ia', strtotime($time)).'</small>
						</div>
					</div>
				';
			}

			else {
				echo '
					<div class="mb-3">
						<div class="row d-flex justify-content-end">
							<div class="col-8">
								<p class="ms-2 mb-0 p-3 border">'.$message.'</p>
							</div>
						</div>
						<div class="row d-flex justify-content-end">
							<div class="col-auto">
								<small>'.date('g:i A | M j', strtotime($time)).'</small>
							</div>
						</div>
					</div>
				';
			}
		}
	}

?>