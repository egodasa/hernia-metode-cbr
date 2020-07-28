<?php
class User extends Models {
  function __construct()
  {
    parent::__construct();
    $this->tabel = "tb_user";
    $this->primaryKey = "id_user";
    $this->kolomBawaanCrud = [
    	"username",
    	"password",
    	"nm_lengkap",
    	"tgl_lahir",
    	"jk",
    	"alamat",
    	"nohp",
    	"pekerjaan",
    	"level"
   	];

    // $this->view = "tb_user";
  }
}
