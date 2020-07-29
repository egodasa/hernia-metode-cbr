<?php
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $_PENYAKIT->tambahData($_POST);
        alert("success", "Pesan", "Data berhasil disimpan!");
        header("Location: index.php?page=admin/penyakit/index");
    }
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4 mt-4">
            <h2>Entri Data Penyakit Baru</h2>
            <hr>   
            <form method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <?=formInput("text", "Kode Penyakit", "kd_penyakit", 10)?>
                        <?=formInput("text", "Nama Penyakit", "nm_penyakit", 50)?>
                        <?=formInput("textarea", "Keterangan", "keterangan")?>
                        <?=formInput("textarea", "Solusi", "solusi")?>
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