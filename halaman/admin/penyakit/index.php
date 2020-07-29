<?php
    $data_penyakit = $_PENYAKIT->ambilData();
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-5 mt-5">
            <h2>Data Penyakit</h2>
            <hr>
            <a href="?page=admin/penyakit/tambah" class="btn btn-primary ">Tambah Data</a>
            <table class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Penyakit</th>
                        <th>Nama Penyakit</th>
                        <th>Keterangan</th>
                        <th>Solusi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($data_penyakit as $no => $penyakit)
                        {
                    ?>
                    <tr>
                        <td><?=$no+1?></td>
                        <td><?=$penyakit['kd_penyakit']?></td>
                        <td><?=$penyakit['nm_penyakit']?></td>
                        <td><?=$penyakit['keterangan']?></td>
                        <td><?=$penyakit['solusi']?></td>
                        <td>
                            <a href="index.php?page=admin/penyakit/gejala/index&id_penyakit=<?=$penyakit['id_penyakit']?>" class="btn btn-warning btn-sm">Gejala Penyakit</a>
                            <a href="index.php?page=admin/penyakit/edit&id_penyakit=<?=$penyakit['id_penyakit']?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="index.php?page=admin/penyakit/hapus&id_penyakit=<?=$penyakit['id_penyakit']?>" onclick="return confirm('Yakin hapus data ini?');" class="btn btn-danger btn-sm">Hapus</a>
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