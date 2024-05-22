<?php
class M_admin extends CI_Model{

	function get_all_admin(){
		$hsl=$this->db->query("SELECT tbl_admin.*,IF(admin_jenkel='L','Laki-Laki','Perempuan') AS jenkel FROM tbl_admin");
		return $hsl;	
	}

	function simpan_admin($nama,$jenkel,$username,$password,$email,$nohp,$level,$gambar,$nilai){
		$hsl=$this->db->query("INSERT INTO tbl_admin (admin_nama,admin_jenkel,admin_username,admin_password,admin_email,admin_nohp,admin_level,admin_photo,nilai) VALUES ('$nama','$jenkel','$username',md5('$password'),'$email','$nohp','$level','$gambar','$nilai')");
		return $hsl;
	}

	function simpan_admin_tanpa_gambar($nama,$jenkel,$username,$password,$email,$nohp,$level){
		$hsl=$this->db->query("INSERT INTO tbl_admin (admin_nama,admin_jenkel,admin_username,admin_password,admin_email,admin_nohp,admin_level) VALUES ('$nama','$jenkel','$username',md5('$password'),'$email','$nohp','$level')");
		return $hsl;
	}

	//UPDATE admin //
	function update_admin_tanpa_pass($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level,$gambar){
		$hsl=$this->db->query("UPDATE tbl_admin set admin_nama='$nama',admin_jenkel='$jenkel',admin_username='$username',admin_email='$email',admin_nohp='$nohp',admin_level='$level',admin_photo='$gambar' where admin_id='$kode'");
		return $hsl;
	}
	function update_admin($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level,$gambar){
		$hsl=$this->db->query("UPDATE tbl_admin set admin_nama='$nama',admin_jenkel='$jenkel',admin_username='$username',admin_password=md5('$password'),admin_email='$email',admin_nohp='$nohp',admin_level='$level',admin_photo='$gambar' where admin_id='$kode'");
		return $hsl;
	}

	function update_admin_tanpa_pass_dan_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level){
		$hsl=$this->db->query("UPDATE tbl_admin set admin_nama='$nama',admin_jenkel='$jenkel',admin_username='$username',admin_email='$email',admin_nohp='$nohp',admin_level='$level' where admin_id='$kode'");
		return $hsl;
	}
	function update_admin_tanpa_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level){
		$hsl=$this->db->query("UPDATE tbl_admin set admin_nama='$nama',admin_jenkel='$jenkel',admin_username='$username',admin_password=md5('$password'),admin_email='$email',admin_nohp='$nohp',admin_level='$level' where admin_id='$kode'");
		return $hsl;
	}
	//END UPDATE admin//

	function hapus_admin($kode){
		$hsl=$this->db->query("DELETE FROM tbl_admin where admin_id='$kode'");
		return $hsl;
	}
	function getusername($id){
		$hsl=$this->db->query("SELECT * FROM tbl_admin where admin_id='$id'");
		return $hsl;
	}
	function resetpass($id,$pass){
		$hsl=$this->db->query("UPDATE tbl_admin set admin_password=md5('$pass') where admin_id='$id'");
		return $hsl;
	}

	function get_admin_login($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_admin where admin_id='$kode'");
		return $hsl;
	}


}