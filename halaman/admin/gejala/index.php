<?php
    $data_gejala = $_GEJALA->ambilData();
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-5 mt-5">
            <h2>Data Gejala</h2>
            <hr>
            <a href="?page=admin/gejala/tambah" class="btn btn-primary ">Tambah Data</a>
            <table class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Gejala</th>
                        <th>Nama Gejala</th>
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
                        <td>
                            <a href="index.php?page=admin/gejala/edit&id_gejala=<?=$gejala['id_gejala']?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="index.php?page=admin/gejala/hapus&id_gejala=<?=$gejala['id_gejala']?>" onclick="return confirm('Yakin hapus data ini?');" class="btn btn-danger btn-sm">Hapus</a>
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