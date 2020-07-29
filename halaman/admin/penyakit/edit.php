<?php
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $_PENYAKIT->editData($_POST['id_penyakit'], $_POST);
        alert("success", "Pesan", "Data berhasil disimpan!");
        header("Location: index.php?page=admin/penyakit/index");
    }
    $penyakit = $_PENYAKIT->ambilData($_GET['id_penyakit']);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4 mt-4">
            <h2>Entri Data Penyakit Baru</h2>
            <hr>   
            <form method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <?=formInput("hidden", "", "id_penyakit", 0, $penyakit['id_penyakit'])?>
                        <?=formInput("text", "Kode Penyakit", "kd_penyakit", 10, $penyakit['kd_penyakit'])?>
                        <?=formInput("text", "Nama Penyakit", "nm_penyakit", 50, $penyakit['nm_penyakit'])?>
                        <?=formInput("textarea", "Keterangan", "keterangan", 0, $penyakit['keterangan'])?>
                        <?=formInput("textarea", "Solusi", "solusi", 0, $penyakit['solusi'])?>
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