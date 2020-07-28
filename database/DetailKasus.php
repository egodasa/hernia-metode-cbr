<?php
class DetailKasus extends Models {
  function __construct()
  {
    parent::__construct();
    $this->tabel = "tb_detail_kasus";
    $this->primaryKey = "id_kasus";
    $this->kolomBawaanCrud = [
    	"id_kasus",
    	"id_gejala"
   	];

    // $this->view = "tb_user";
  }
}
