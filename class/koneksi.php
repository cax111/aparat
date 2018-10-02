<?php
class database{
	private $host='localhost';
	private $user='root';
	private $pass='';
	private $db='surat';
	protected $conn;
	
	public function koneksi(){
		try{
		    $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->pass);          
		}catch(PDOException $e){
			echo "Koneksi Gagal ".$e->getMessage();
		}
		return $this->conn;
	}
}
?>
