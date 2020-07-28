<?php
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$data = $_POST;
		$data['level'] = "Member";
		$data['password'] = md5(md5($data['password']));
		$_USER->tambahData($data);
		alert("success", "Pemberitahuan", "Anda berhasil registrasi!");
		header("Location: index.php?page=login");
		exit;
	}
?>
<form action="" method="POST">
	<?=formInput("text", "Username", "username", 20)?>
	<?=formInput("password", "Password", "password", 255)?>
	<?=formInput("text", "Nama Lengkap", "nm_lengkap", 50)?>
	<?=formInput("date", "Tanggal Lahir", "tgl_lahir", 10)?>
	<?=formSelect("Jenis Kelamin", "jk", "caption", "value", array(
		array("caption" => "Laki-laki", "value" => "Laki-laki"),
		array("caption" => "Perempuan", "value" => "Perempuan")
	))?>
	<?=formInput("textarea", "Alamat", "alamat")?>
	<?=formInput("text", "NoHP", "nohp", 15)?>
	<?=formInput("text", "Pekerjaan", "pekerjaan", 100)?>

	<?=formButton("submit", "Simpan", "btn btn-primary")?>
	<?=formButton("reset", "Reset", "btn btn-danger")?>
</form>