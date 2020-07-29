<?php
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $_GEJALA->tambahData($_POST);
        alert("success", "Pesan", "Data berhasil disimpan!");
        header("Location: index.php?page=admin/gejala/index");
    }
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4 mt-4">
            <h2>Entri Data Gejala Baru</h2>
            <hr>   
            <form method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <?=formInput("text", "Kode Gejala", "kd_gejala", 10)?>
                        <?=formInput("text", "Nama Gejala", "nm_gejala", 50)?>
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