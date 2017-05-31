<?php  
	class Koneksi{
		private $host = "localhost";
		private $user = "root";
		private $pass = "";
		private $db = "teravin_test";

		public function sambungkan(){
			mysql_connect($this->host,$this->user,$this->pass);
			mysql_select_db($this->db);
		}
	}
	$db = new Koneksi();
	$db->sambungkan();
?>