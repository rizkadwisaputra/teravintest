<?php  
	include "ClassKoneksi.php";
	class User{
		//method insert data user
		public function simpan_user($nama,$email,$nohp,$alamat){
			$_nama = mysql_real_escape_string($nama);
			$_email = mysql_real_escape_string($email);
			$_nohp = mysql_real_escape_string($nohp);
			//insert
			mysql_query("INSERT INTO user(nama,email,no_hp) VALUES('$_nama','$_email','$_nohp')");
			$dtus = $this->data_akhir_user();
			$iduser = $dtus['id_user'];
			foreach ($alamat as $key => $value) {
				$_value = mysql_real_escape_string($value);
				mysql_query("INSERT INTO alamat_user(alamat,id_user) VALUES('$_value','$iduser')");
			}
		}
		public function tampil_user(){
			$qry = mysql_query("SELECT * FROM user");
			while ($pecah = mysql_fetch_array($qry)) {
				//array
				$data[] = $pecah;
			}
			return $data;
		}
		public function cek_user(){
			$qry = mysql_query("SELECT * FROM user");
			$jum = mysql_num_rows($qry);
			if ($jum > 0) {
				return true;
			}else{
				return false;
			}
		}
		public function data_akhir_user(){
			$qry = mysql_query("SELECT * FROM user ORDER BY id_user DESC LIMIT 1");
			$pecah = mysql_fetch_assoc($qry);
			return $pecah;
		}
		public function ambil_user($id){
			$qry = mysql_query("SELECT * FROM user WHERE id_user='$id'");
			$pecah = mysql_fetch_assoc($qry);
			return $pecah;
		}
		public function tampil_alamat($id){
			$qry = mysql_query("SELECT * FROM user u JOIN alamat_user au ON u.id_user=au.id_user
								WHERE u.id_user = '$id'");
			while ($pecah = mysql_fetch_array($qry)) {
				//array
				$data[] = $pecah;
			}
			return $data;
		}
		public function hapus_user($hapus){
			mysql_query("DELETE FROM alamat_user WHERE id_user='$hapus'");
			mysql_query("DELETE FROM user WHERE id_user= '$hapus'");
		}
	}
	$user = new User();
?>