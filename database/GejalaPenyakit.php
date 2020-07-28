<?php
class GejalaPenyakit extends Models {
  function __construct()
  {
    parent::__construct();
    $this->tabel = "tb_gejala_penyakit";
    $this->primaryKey = "id_gejala_penyakit";
    $this->kolomBawaanCrud = [
    	"id_penyakit",
    	"id_gejala",
    	"bobot"
   	];

    // $this->view = "tb_user";
  }
}
