<?php

class Pesanan extends Connection{
	private $userid=0;
	private $email='';
	private $password='';	
	private $role='';		
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

	public function TambahUser(){
		$this->connect();
		
		
		$sql = "INSERT INTO user(email, password, role)
				values ('$this->email', '$this->password', '$this->role')";				
		$this->hasil = mysqli_query($this->connection, $sql);
		
		if($this->hasil)
		   $this->message ='Data berhasil ditambahkan!';					
	    else
		   $this->message ='Data gagal ditambahkan!';	
	}
	
		public function UbahUser(){
			$this->connect();
			$sql = "UPDATE user 
			        SET email = '$this->email',
                    password='$this->password',
					role='$this->role'
					WHERE userid = $this->userid";					
			
			$this->hasil = mysqli_query($this->connection, $sql);			
			
			if($this->hasil)
				$this->message ='Data berhasil diubah!';								
			else
				$this->message ='Data gagal diubah!';								
		}
		
		
		public function HapusUser(){
			$this->connect();
			$sql = "DELETE FROM user WHERE userid=$this->userid";
			$this->hasil = mysqli_query($this->connection, $sql);
			if($this->hasil)
				$this->message ='Data berhasil dihapus!';								
			else
				$this->message ='Data gagal dihapus!';
		}

	public function ValidateEmail($inputemail){
		$this->connect();
		$sql = "SELECT * FROM user
				WHERE email = '$inputemail'";
		$result = mysqli_query($this->connection, $sql);	
		if (mysqli_num_rows ($result) == 1){
			$this->hasil = true;			
			$data = mysqli_fetch_assoc($result);
			$this->email = $data['email'];				
			$this->userid = $data['userid'];				
			$this->password = $data['password'];				
			$this->role=$data['role'];	
		}
	}	
	
	
	public function LihatSatuUser(){
		$this->connect();
		$sql = "SELECT * FROM user
				WHERE userid = $this->userid";
				
		$resultOne = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
		
		if(mysqli_num_rows($resultOne) == 1){
			$this->hasil = true;
			$data = mysqli_fetch_assoc($resultOne);
			$this->userid = $data['userid'];				
			$this->password = $data['password'];				
			$this->email=$data['email'];
			$this->role=$data['role'];			
		}		
	}
	
	public function LihatSemuaUser(){
		$this->connect();
		$sql = "SELECT * FROM user order by userid";
		$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
		
		$arrResult = Array();
		$i=0;
		if(mysqli_num_rows($result)>0){
			while($data = mysqli_fetch_array($result))
			{
				$objUser = new User();
				$objUser->userid=$data['userid'];
				$objUser->email=$data['email'];
				$objUser->password=$data['password'];
				$objUser->role=$data['role'];
				$arrResult[$i] = $objUser;
				$i++;
			}
		}
		return $arrResult;
	}
	
	
}
