<?php
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        foreach($_POST['id_gejala'] as $no => $id)
        {
            $_GEJALA_PENYAKIT->tambahData(array("id_penyakit" => $_SESSION['id_penyakit'], "id_gejala" => $id));
        }
        alert("success", "Pesan", "Data berhasil disimpan!");
        header("Location: index.php?page=admin/penyakit/gejala/index");
    }

    $data_gejala = $DB->query("SELECT * FROM tb_gejala WHERE id_gejala NOT IN (SELECT id_gejala FROM tb_gejala_penyakit WHERE id_penyakit = :id_penyakit) ORDER BY kd_gejala ASC", array("id_penyakit" => $_SESSION['id_penyakit']));
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4 mt-4">
            <h2>Tambah Gejala Penyakit <?=$_SESSION['nm_penyakit']."(".$_SESSION['kd_penyakit'].")"?></h2>
            <hr>   
            <form method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Gejala</th>
                                    <th>Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($data_gejala as $data)
                                    {
                                ?>  
                                    <tr>
                                        <td><?=formInput("checkbox", "", "id_gejala[]", 0, $data['id_gejala'])?></td>
                                        <td><?=$data['kd_gejala']." - ".$data['nm_gejala']?></td>
                                        <td><?=formInput("number", "", "bobot[]", 10, 0)?></td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <?=formButton("submit", "Simpan", "btn btn-primary")?>
                        <?=formButton("reset", "Reset", "btn btn-info")?>
                    </div>
                </div>
            </form>            
        </div>
    </div>
</div>