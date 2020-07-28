<?php
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$id_user = 3;
		$data_user = $_USER->ambilData($id_user);

		// BAGIAN HASIL KONSULTASI
		$id_kasus = $_KASUS->tambahData(
			array(
				"id_user" => 3,
				"tgl_kasus" => date("Y-m-d H:i:s")
			));

		foreach($_POST['id_gejala'] as $data)
		{
			$_DETAIL_KASUS->tambahData(array("id_kasus" => $id_kasus, "id_gejala" => $data));
		}

		// CEK MASING-MASING GEJALA DAN COCOKAN DENGAN DATA GEJALA PENYAKIT
		$keterangan = "Hasil pemeriksaan tidak ditemukan berdasarkan gejala yang dipilih!";
		$data_hasil = $DB->query("Select 
									tb_penyakit.id_penyakit,
									tb_penyakit.kd_penyakit,
									tb_penyakit.nm_penyakit,
									tb_penyakit.solusi,
									GROUP_CONCAT(tb_gejala_penyakit.bobot) AS bobot,
									GROUP_CONCAT(IF(detail_kasus.id_gejala IS NULL, 0, tb_gejala_penyakit.bobot)) AS bobot_kasus,
									SUM(IF(detail_kasus.id_gejala IS NULL, 0, tb_gejala_penyakit.bobot)) / SUM(tb_gejala_penyakit.bobot) as kemiripan 
									From tb_penyakit 
									Inner Join tb_gejala_penyakit On tb_gejala_penyakit.id_penyakit = tb_penyakit.id_penyakit 
									Left Join (SELECT * FROM tb_detail_kasus WHERE tb_detail_kasus.id_kasus = ".$id_kasus.") detail_kasus 
									On tb_gejala_penyakit.id_gejala = detail_kasus.id_gejala GROUP BY tb_penyakit.id_penyakit ORDER BY SUM(IF(detail_kasus.id_gejala IS NULL, 0, tb_gejala_penyakit.bobot)) / SUM(tb_gejala_penyakit.bobot) DESC")->fetchAll(PDO::FETCH_ASSOC);
		
		if(!empty($data_hasil))
		{
			$keterangan = array();
			foreach($data_hasil as $hasil)
			{
				$keterangan[] = "PENCARIAN TINGKAT KEMIRIPAN DENGAN PENYAKIT ".$hasil['nm_penyakit']." (".$hasil['kd_penyakit'].") <br> ============================================================";
				$keterangan[] = "KEMIRIPAN = ".str_replace(",", "+", $hasil['bobot_kasus'])." / ".str_replace(",", "+", $hasil['bobot'])." = ".$hasil['kemiripan']." <br><br>";
			}
			$keterangan[] = "PENCARIAN SELESAI... <br> <br>";

			$keterangan[] = "HASIL PENCARIAN MENGHASILKAN DIAGNOSA PENYAKIT DENGAN TINGKAT KEMIRIPAN PALING BESAR : <br>";
			$keterangan[] = "KODE PENYAKIT : ".$data_hasil[0]['kd_penyakit']." <br>";
			$keterangan[] = "NAMA PENYAKIT : ".$data_hasil[0]['nm_penyakit']." <br>";
			$keterangan[] = "SOLUSI : ".$data_hasil[0]['solusi']." <br>";
			$keterangan[] = "=======================================================";

			$_KASUS->editData($id_kasus, array("id_penyakit" => $data_hasil[0]['id_penyakit'], "keterangan" => implode("", $keterangan)));
		}
		// MENAMPILKAN HASIL KONSULTASI
?>
		<?=implode("<br>", $keterangan)?>
		<a href="index.php?page=konsultasi" class="btn btn-success"><< Kembali</a>
<?php
		// AKHIR DARI BAGIAN HASIL KONSULTASI
	}
	else
	{
		// BAGIAN KONSULTASI
		$data_gejala = $_GEJALA->ambilData();
?>
		<form action="" method="POST">
			<h1>Gejala apa yang Anda rasakan? </h1>
			<ul>
				<?php
					foreach ($data_gejala as $data)
					{
				?>
						<li><?=formInput("checkbox", $data['nm_gejala'], "id_gejala[]", 0, $data['id_gejala'])?></li>
				<?php
					}
				?>
			</ul>
			<?=formButton("submit", "Periksa Konsultasi", "btn btn-success btn-block")?>
			<?=formButton("reset", "Ulangi", "btn btn-danger btn-block")?>
		</form>
<?php
	// AKHIR DARI BAGIAN HASIL KONSULTASI
	}
?>