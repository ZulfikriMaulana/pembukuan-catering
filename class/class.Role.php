<?php

class Role extends Connection{
	private $id_role=0;
	private $nama_role='';
	private $hasil= false;
	private $message ='';
	
	public function __get($atribute) {
	if (property_exists($this, $atribute)) {
    	return $this->$atribute;
		}
	}

	public function __set($atribut, $value){
		if (property_exists($this, $atribut)) {
					$this->$atribut = $value;
		}
	}
	
	function __construct() {						

	}


	
	public function LihatSemuaRole(){
		$this->connect();
		$sql = "SELECT * FROM role order by id_role";
		$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
		
		$arrResult = Array();
		$i=0;
		if(mysqli_num_rows($result)>0){
			while($data = mysqli_fetch_array($result))
			{
				$objRole = new Role();
				$objRole->id_role=$data['id_role'];
				$objRole->nama_role=$data['nama_role'];
				$arrResult[$i] = $objRole;
				$i++;
			}
		}
		return $arrResult;
	}
	
	
}
?>