<?php
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	require "config/pengaturan.php";
	require "models/models.php";
	require "models/User.php";
	require "models/Penyakit.php";
	require "models/Gejala.php";
	require "models/GejalaPenyakit.php";
	require "models/Kasus.php";
	require "models/DetailKasus.php";

	$_USER = new User($DB);
	$_PENYAKIT = new Penyakit($DB);
	$_GEJALA = new Gejala($DB);
	$_GEJALA_PENYAKIT = new GejalaPenyakit($DB);
	$_KASUS = new Kasus($DB);
	$_DETAIL_KASUS = new DetailKasus($DB);

	ob_start();

	$halaman = "home";

	if(!empty($_GET['halaman']))
	{
		$halaman = $_GET['halaman'];
	}

	
	require "halaman/".$halaman.".php";
?>
	


<?php
	$output = ob_get_contents();
	ob_end_clean();
	echo $output;
?>