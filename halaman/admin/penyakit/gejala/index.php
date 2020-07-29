<?php
    $id_penyakit = 0;
    if(!empty($_GET['id_penyakit']))
    {
        $id_penyakit = $_GET['id_penyakit'];
        $_SESSION['id_penyakit'] = $_GET['id_penyakit'];   
    }
    else
    {
        $id_penyakit = $_SESSION['id_penyakit'];
    }

    $penyakit = $_PENYAKIT->ambilData($id_penyakit);
    $_SESSION['kd_penyakit'] = $penyakit['kd_penyakit'];
    $_SESSION['nm_penyakit'] = $penyakit['nm_penyakit'];

    $data_gejala = $DB->query("Select
    tb_gejala_penyakit.id_gejala_penyakit,
    tb_gejala.kd_gejala,
    tb_gejala.nm_gejala,
    tb_gejala_penyakit.bobot
From
    tb_gejala_penyakit Inner Join
    tb_gejala On tb_gejala_penyakit.id_gejala = tb_gejala.id_gejala WHERE tb_gejala_penyakit.id_penyakit = :id_penyakit", array("id_penyakit" => $id_penyakit))->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-5 mt-5">
            <h2>Data Gejala Penyakit <?=$_SESSION['nm_penyakit']."(".$_SESSION['kd_penyakit'].")"?></h2>
            <hr>
            <a href="?page=admin/penyakit/index" class="btn btn-primary ">Kembali</a>
            <a href="?page=admin/penyakit/gejala/tambah" class="btn btn-primary ">Tambah Data</a>
            <a href="?page=admin/penyakit/gejala/edit" class="btn btn-primary ">Edit Gejala Penyakit</a>
            <table class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Gejala</th>
                        <th>Nama Gejala</th>
                        <th>Bobot</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($data_gejala as $no => $gejala)
                        {
                    ?>
                    <tr>
                        <td><?=$no+1?></td>
                        <td><?=$gejala['kd_gejala']?></td>
                        <td><?=$gejala['nm_gejala']?></td>
                        <td><?=$gejala['bobot']?></td>
                        <td>
                            <a href="index.php?page=admin/penyakit/gejala/hapus&id_gejala_penyakit=<?=$gejala['id_gejala_penyakit']?>" onclick="return confirm('Yakin hapus data ini?');" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>