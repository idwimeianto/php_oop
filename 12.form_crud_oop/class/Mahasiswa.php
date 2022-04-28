<?php
class Mahasiswa{
  private $_formItem = [];
  private $_db = null;

  public function __construct(){
    $this->_db = DB::getInstance();
  }

  public function validate($formMethod){
    $validate = new Validate($formMethod);

    $this->_formItem['nim'] = $validate->setRules('nim',
    'Nim', [
      'required'  => true,
      'sanitize'  => 'string',
      'unique'    => ['mahasiswa', 'nim'],
      'min_char'  => 7,
      'max_char'  => 7,
    ]);

    $this->_formItem['nama'] = $validate->setRules('nama',
    'Nama', [
      'required' => true,
      'sanitize' => 'string',
      'max_char' => 100,
    ]);

    $this->_formItem['tempat_lahir'] = $validate->setRules('tempat_lahir',
    'Tempat Lahir', [
      'required' => true,
      'sanitize' => 'string',
      'max_char' => 50,
    ]);

    $this->_formItem['tanggal_lahir'] = $validate->setRules('tanggal_lahir',
    'Tanggal Lahir', [
      'required' => true,
      'sanitize' => 'string',
    ]);

    $this->_formItem['jenis_kelamin'] = $validate->setRules('jenis_kelamin',
    'Jenis Kelamin', [
      'required' => true,
      'sanitize' => 'string',
      'max_char' => 50,
    ]);

    $this->_formItem['fakultas'] = $validate->setRules('fakultas',
    'Fakultas', [
      'required' => true,
      'sanitize' => 'string',
      'max_char' => 50,
    ]);

    $this->_formItem['jurusan'] = $validate->setRules('jurusan',
    'Jurusan', [
      'required' => true,
      'sanitize' => 'string',
      'max_char' => 50,
    ]);

    $this->_formItem['ipk'] = $validate->setRules('ipk',
    'IPK', [
      'required' => true,
      'numeric' => true,
      'sanitize' => 'float',
      'min_value' => 0,
    ]);

    if(!$validate->passed()) {
      return $validate->getError();
    }
  }

  public function getItem($item){
    return isset($this->_formItem[$item]) ? $this->_formItem[$item] : '';
  }

  public function insert(){
    $mahasiswa = [
      'nim' => $this->getItem('nim'),
      'nama' => $this->getItem('nama'),
      'tempat_lahir' => $this->getItem('tempat_lahir'),
      'tanggal_lahir' => $this->getItem('tanggal_lahir'),
      'jenis_kelamin' => $this->getItem('jenis_kelamin'),
      'fakultas' => $this->getItem('fakultas'),
      'jurusan' => $this->getItem('jurusan'),
      'ipk' => $this->getItem('ipk'),
    ];

    return $this->_db->insert('mahasiswa',$mahasiswa);
  }

  public function generate($id){
    $result = $this->_db->getWhereOnce('mahasiswa',['id','=',$id]);
    foreach ($result as $key => $val) {
      $this->_formItem[$key] = $val;
    }
  }

  public function update($id){
    $mahasiswa = [
      'nim' => $this->getItem('nim'),
      'nama' => $this->getItem('nama'),
      'tempat_lahir' => $this->getItem('tempat_lahir'),
      'tanggal_lahir' => $this->getItem('tanggal_lahir'),
      'jenis_kelamin' => $this->getItem('jenis_kelamin'),
      'fakultas' => $this->getItem('fakultas'),
      'jurusan' => $this->getItem('jurusan'),
      'ipk' => $this->getItem('ipk'),
    ];

    $this->_db->update('mahasiswa',$mahasiswa,['id','=',$id]);
  }

  public function delete($id){
    $this->_db->delete('mahasiswa',['id','=',$id]);
  }
}
