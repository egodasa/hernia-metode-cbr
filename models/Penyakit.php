<?php
class Penyakit extends Models {
  function __construct()
  {
    parent::__construct();
    $this->tabel = "tb_penyakit";
    $this->primaryKey = "id_penyakit";
    $this->kolomBawaanCrud = [
    	"kode_penyakit",
    	"nm_penyakit",
    	"keterangan",
    	"solusi"
   	];

    // $this->view = "tb_user";
  }
}
