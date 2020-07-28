<?php
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	require "database/library.php";
	require "helper/form.php";
	require "database/database.php";
	require "database/User.php";
	require "database/Penyakit.php";
	require "database/Gejala.php";
	require "database/GejalaPenyakit.php";
	require "database/Kasus.php";
	require "database/DetailKasus.php";
	$_MODELS = new Models();
	$_USER = new User();
	$_PENYAKIT = new Penyakit();
	$_GEJALA = new Gejala();
	$_GEJALA_PENYAKIT = new GejalaPenyakit();
	$_KASUS = new Kasus();
	$_DETAIL_KASUS = new DetailKasus();
	$DB = $_MODELS->getDb();

	ob_start();

	$halaman = "home";

	if(!empty($_GET['page']))
	{
		$halaman = $_GET['page'];
	}

	
	require "halaman/".$halaman.".php";

	$output = ob_get_contents();
	ob_end_clean();
	echo $output;
?>