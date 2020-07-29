<?php
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        foreach($_POST['id_gejala_penyakit'] as $no => $id)
        {
            $_GEJALA_PENYAKIT->editData(array("id_gejala_penyakit" => $id), array("bobot" => $_POST['bobot_'.$id]));
        }
        alert("success", "Pesan", "Data berhasil disimpan!");
        header("Location: index.php?page=admin/penyakit/gejala/index");
    }

    $data_gejala = $DB->query("Select
                tb_gejala_penyakit.id_gejala_penyakit,
                tb_gejala.kd_gejala,
                tb_gejala.nm_gejala,
                tb_gejala_penyakit.bobot
            From
                tb_gejala_penyakit Inner Join
                tb_gejala On tb_gejala_penyakit.id_gejala = tb_gejala.id_gejala WHERE tb_gejala_penyakit.id_penyakit = :id_penyakit", array("id_penyakit" => $_SESSION['id_penyakit']))->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4 mt-4">
            <h2>Edit Gejala Penyakit <?=$_SESSION['nm_penyakit']."(".$_SESSION['kd_penyakit'].")"?></h2>
            <hr>   
            <form method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gejala</th>
                                    <th>Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($data_gejala as $no => $data)
                                    {
                                ?>  
                                    <tr>
                                        <td><?=$no+1?><?=formInput("hidden", "", "id_gejala_penyakit[]", 10, $data['id_gejala_penyakit'])?></td>
                                        <td><?=$data['kd_gejala']." - ".$data['nm_gejala']?></td>
                                        <td><?=formInput("number", "", "bobot_".$data['id_gejala_penyakit'], 10, $data['bobot'])?></td>
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