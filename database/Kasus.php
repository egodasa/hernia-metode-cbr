<?php
class Kasus extends Models {
  function __construct()
  {
    parent::__construct();
    $this->tabel = "tb_kasus";
    $this->primaryKey = "id_kasus";
    $this->kolomBawaanCrud = [
    	"id_user",
    	"tgl_kasus",
    	"id_penyakit",
    	"kemiripan"
   	];

    // $this->view = "tb_user";
  }
}
