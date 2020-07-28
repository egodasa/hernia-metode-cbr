<?php
use Medoo\Medoo;
class Models {
	protected $db;
  public $tabel;      // nama tabelnya
  protected $primaryKey; // primary keynya
  protected $relasiTabel; // relasi tabel array
  public $kolomBawaanCrud; // kolom bawaan crud array
  public $data = [];
  public $view = null;
  function __construct()
  {
    // PENGATURAN DATABASE
    $this->db = new Medoo([
      'database_type' => 'mysql',
      'database_name' => "db_cbr",
      'server' => "localhost",
      'username' => "root",
      'password' => "mysql"
    ]);
  }

  public function getDb()
  {
    return $this->db;
  }
 
  /*
    ambilData(3, ["username", "password", "level"]);
    kode diatas berarti mengambil data dengan id = 3 dan ambil kolom username, password dan level
    
    ambilData()
    kode diatas berarti mengambil seluruh data dan seluruh kolom
  */
  public function ambilData($id = null, $kolom = "*")
	{
    $result = null;
		$tabel = $this->tabel;
    if(!empty($this->view))
    {
      $tabel = $this->view;
    }
    if(!is_null($id))
    {
      $result = $this->db->get($tabel, $kolom, [$this->primaryKey => $id]);
    }
    else
    {
      $result = $this->db->select($tabel, $kolom);
    }
    if(!empty($this->db->error()[1]))
    {
      echo $this->db->error()[2];
      exit;
    }
    return $result;
	}
  
  /*
    ambilDataDenganKondisi(["username" => "madam", "password" => "123"], ["username"])
    kode diatas berarti ambil data dimana username = madam dan password = 123 serta tampilkan saja kolom username
    
    ambilDataDenganKondisi(["username" => "madam", "password" => "123"])
    kode diatas berarti ambil data dimana username = madam dan password = 123 serta tampilkan semua kolom
    
  */
	public function ambilDataDenganKondisi($where, $kolom = "*")
	{
    $result = null;
    $tabel = $this->tabel;
    if(!empty($this->view))
    {
      $tabel = $this->view;
    }
    
    $result = $this->db->select($tabel, $kolom, $where);
    if(!empty($this->db->error()[1]))
    {
      echo $this->db->error()[2];
      exit;
    }
    return $result;
	}
  
  /*
    tambahData([
    	"username" => $_POST['username'],
	"password" => $_POST['password']
    ])
    tambah data tabel dengan data diatas
  */
  public function tambahData($data)
  {
    foreach($this->kolomBawaanCrud as $d)
    {
      if(isset($data[$d]))
      {
        $this->data[$d] = $data[$d];
      }
    }

    $this->db->insert($this->tabel, $this->data);
    if(!empty($this->db->error()[1]))
    {
      echo "Error : ".$this->db->error()[2];
      exit;
    }
    return $this->db->id();
  }
  
  /*
    editData(12,[
    	"username" => $_POST['username'],
	"password" => $_POST['password']
    ])
    edit data dengan kolom diatas dimana id = 12
  */
  public function editData($id, $data)
  {
    foreach($this->kolomBawaanCrud as $d)
    {
      if(isset($data[$d]))
      {
        $this->data[$d] = $data[$d];
      }
    }

    $this->db->update($this->tabel, $this->data, [$this->primaryKey => $id]);
    if(!empty($this->db->error()[1]))
    {
      echo "Error : ".$this->db->error()[2];
      exit;
    }
    return true;
  }
  
  /*
    hapusData(12)
    hapus data dengan id = 12
  */
  public function hapusData($id)
  {
    $this->db->delete($this->tabel, [$this->primaryKey => $id]);
    if(!empty($this->db->error()[1]))
    {
      echo $this->db->error()[2];
      exit;
    }
    return true;
  }
}
