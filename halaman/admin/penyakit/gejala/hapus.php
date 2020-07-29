<?php
	$_GEJALA_PENYAKIT->hapusData($_GET['id_gejala_penyakit']);
	alert("success", "Pesan", "Data berhasil dihapus!");
	header("Location: index.php?page=admin/penyakit/gejala/index");
?>