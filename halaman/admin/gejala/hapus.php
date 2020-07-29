<?php
	$_GEJALA->hapusData($_GET['id_gejala']);
	alert("success", "Pesan", "Data berhasil dihapus!");
	header("Location: index.php?page=admin/gejala/index");
?>