<?php
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	require "config/pengaturan.php";
	require "models/database.php";
	require "models/models.php";
	ob_start();

	$halaman = "home.php";

	if(!empty($_GET['halaman']))
	{
		$halaman = $_GET['halaman'];
	}
	
	require "pages/".$halaman.".php";
?>
	


<?php
	$output = ob_get_contents();
	ob_end_clean();
	echo $output;
?>