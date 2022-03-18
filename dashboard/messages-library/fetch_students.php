<?php

	session_start();

	include('../../global/model.php');
	$model = new Model();
	$fstud_list = $model->fetchFirstStudent();

	if (!empty($fstud_list)) {
		foreach ($fstud_list as $fstud_info) {
			$first_id = $fstud_info['SeniorID'];
			$first_name = ''.$fstud_info['SenFirstName'].' '.$fstud_info['SenLastName'].'';
			$first_gender = $fstud_info['Gender'];
			$fstud_list = $model->fetchFirstStudent();

			$frecent = $model->fetchMostRecent($first_id);
			if (!empty($frecent)) {
				foreach ($frecent as $frec) {
					$first_message = $frec['message'];
					$first_time = $frec['timestamp'];
					$first_status = $frec['status'];
					$first_user_type = $frec['user_type'];
				}
			}

?>
<div class="row py-3" style="background-color: #1e474d;">                       
	<a href="#" class="text-light"><i class="bi bi-dash-circle" style="color: #153438;"></i></a>
							
	<a href="#" class="text-light text-decoration-none active" id="<?php echo $first_id; ?>" data-id="<?php echo $first_id; ?>" onclick="turnActive(<?php echo $first_id; ?>)">
		<span>
			<i class="bi bi-person-circle me-3"></i><?php echo $first_name; ?>
			<span style="float: right; padding-right: 20px; padding-top: 10px;">
				<small><?php echo date('j M', strtotime($first_time)) ?></small>
			</span>
			<br>
			<?php

				if ($first_user_type == 'admin') {
					echo '<p class="font-italic mb-0 text-small" style="padding-left: 95px;" id="p-'.$first_id.'">You: '.$first_message.'</p>';
				}

				else {
					echo '<p class="font-italic mb-0 text-small" style="padding-left: 95px;" id="p-'.$first_id.'">'.$first_message.'</p>';
				}

			?>
		</span>
	</a>
</div>
<?php

		}
	}
	
	$stud_list = $model->fetchStudentsList($first_id);

	if (!empty($stud_list)) {
		foreach ($stud_list as $stud_info) {
			$id = $stud_info['SeniorID'];
			$name = ''.$stud_info['SenFirstName'].' '.$stud_info['SenLastName'].'';
			$gender = $stud_info['Gender'];

			$recent = $model->fetchMostRecent($id);
			if (!empty($recent)) {
				foreach ($recent as $rec) {
					$message = $rec['message'];
					$time = $rec['timestamp'];
					$user_type = $rec['user_type'];
					$status = $rec['status'];
				}
			}

?>
<div class="row py-3">                       
	<a href="#" class="text-light"><i class="bi bi-dash-circle" style="color: #153438;"></i></a>
							
	<a href="#" class="text-light text-decoration-none" id="<?php echo $id; ?>" data-id="<?php echo $id; ?>" onclick="turnActive(<?php echo $id; ?>)">
		<span>
			<i class="bi bi-person-circle me-3"></i><?php echo $name; ?>
			<span style="float: right; padding-right: 20px; padding-top: 10px;">
				<small><?php echo date('j M', strtotime($time)) ?></small>
			</span>
			<br>
			<?php

				if ($user_type == 'admin') {
					echo '<p class="font-italic mb-0 text-small" style="padding-left: 95px;" id="p-'.$id.'">You: '.$message.'</p>';
				}

				else {
					echo '<p class="font-italic mb-0 text-small" style="padding-left: 95px;" id="p-'.$id.'">'.$message.'</p>';
				}

			?>
		</span>
	</a>
</div>
<?php

		}
	}

?>