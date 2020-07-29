<?php
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $_GEJALA->editData($_POST['id_gejala'], $_POST);
        alert("success", "Pesan", "Data berhasil disimpan!");
        header("Location: index.php?page=admin/gejala/index");
    }

    $gejala = $_GEJALA->ambilData($_GET['id_gejala']);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4 mt-4">
            <h2>Edit Data Gejala</h2>
            <hr>   
            <form method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <?=formInput("hidden", "id_gejala", "id_gejala", 10, $gejala['id_gejala'])?>
                        <?=formInput("text", "Kode Gejala", "kd_gejala", 10, $gejala['kd_gejala'])?>
                        <?=formInput("text", "Nama Gejala", "nm_gejala", 50, $gejala['nm_gejala'])?>
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