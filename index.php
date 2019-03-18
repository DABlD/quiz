<?php include('includes/header.php'); ?>

<body>
	<?php include('includes/navbar.php'); ?>
	<?php include('requests/getQuizzes.php'); ?>

	<div class="container">
		<?php var_dump($data->num_rows); ?>
	</div>
</body>

<?php include('includes/scripts.php'); ?>
<?php include('includes/footer.php'); ?>