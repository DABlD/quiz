<?php
	include('includes/helper.php');
	$data = getData('quizzes', ['id' => $_SESSION['logged_in_user']->id]);
?>