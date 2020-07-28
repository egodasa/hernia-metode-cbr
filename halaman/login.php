<?php
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$data = $_POST;
		$data['password'] = md5(md5($data['password']));
		$cek = $_USER->ambilDataDenganKondisi($data);
		if(empty($cek))
		{
			alert("danger", "Peringatan", "Username atau password salah!");
		}
		else
		{
			$_SESSION = $cek;
			unset($_SESSION['password']);
			alert("success", "Pesan", "Anda berhasil login!");
			header("Location: index.php");
		}
	}
?>
<form action="" method="POST">
	<?=formInput("text", "Username", "username", 20)?>
	<?=formInput("password", "Password", "password", 20)?>
	<?=formButton("submit", "Login", "btn btn-primary")?>
	<?=formButton("reset", "Reset", "btn btn-danger")?>
</form>

