<?php

	session_start();

	include('../../global/model.php');
	$model = new Model();

	$fetch_id = $_POST['fetch_id'];
	$msg_to_send = $_POST['message'];

	$model->sendMessage($fetch_id, $msg_to_send);

?>