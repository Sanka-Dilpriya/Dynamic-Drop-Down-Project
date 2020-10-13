<?php
	$connection = mysqli_connect("localhost", "root", "", "dtnamic_dropdown");

	if ( isset($_GET['province_id']) ) {

		$province_id = mysqli_real_escape_string($connection, $_GET['province_id']);

	}
?>