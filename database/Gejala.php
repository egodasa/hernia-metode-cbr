<?php
class Gejala extends Models {
  function __construct()
  {
    parent::__construct();
    $this->tabel = "tb_gejala";
    $this->primaryKey = "id_gejala";
    $this->kolomBawaanCrud = [
    	"kd_gejala",
    	"nm_gejala"
   	];

    // $this->view = "tb_user";
  }
}
