<?php
	$_PENYAKIT->hapusData($_GET['id_penyakit']);
	alert("success", "Pesan", "Data berhasil dihapus!");
	header("Location: index.php?page=admin/penyakit/index");
?>