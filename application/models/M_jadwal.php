<?php
class M_jadwal extends CI_Model{

	function get_all_jadwal(){
		$hsl=$this->db->query("SELECT * FROM tbl_jadwal_pemilihan");
		return $hsl;	
	}

	function simpan_jadwal($rt,$mulai,$selesai){
		
		$this->db->db_debug = false;
		if (!$this->db->query("INSERT INTO tbl_jadwal_pemilihan (rt_pemilih,mulai,selesai) VALUES ('$rt','$mulai','$selesai')")) {
			$error = $this->db->error();
			if ($error['code'] == 1062) {
				echo $this->session->set_flashdata('msg', 'duplikasi');
				redirect('jadwal');
			}
		}
		$this->db->db_debug = true;
		
	}

	function simpan_pemilih_tanpa_gambar($nama,$jenkel,$username,$password,$email,$nohp,$level){
		$hsl=$this->db->query("INSERT INTO tbl_pemilih (pemilih_nama,pemilih_jenkel,pemilih_username,pemilih_password,pemilih_email,pemilih_nohp,pemilih_level) VALUES ('$nama','$jenkel','$username',md5('$password'),'$email','$nohp','$level')");
		return $hsl;
	}

	//UPDATE pemilih //
	function update_pemilih_tanpa_pass($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level,$gambar){
		$hsl=$this->db->query("UPDATE tbl_pemilih set pemilih_nama='$nama',pemilih_jenkel='$jenkel',pemilih_username='$username',pemilih_email='$email',pemilih_nohp='$nohp',pemilih_level='$level',pemilih_photo='$gambar' where pemilih_id='$kode'");
		return $hsl;
	}
	function update_jadwal($kode,$rt,$mulai,$selesai){
		$hsl=$this->db->query("UPDATE tbl_jadwal_pemilihan SET rt_pemilih='$rt', mulai='$mulai', selesai='$selesai' WHERE id='$kode'");
		return $hsl;
	}

	function update_pemilih_tanpa_pass_dan_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level){
		$hsl=$this->db->query("UPDATE tbl_pemilih set pemilih_nama='$nama',pemilih_jenkel='$jenkel',pemilih_username='$username',pemilih_email='$email',pemilih_nohp='$nohp',pemilih_level='$level' where pemilih_id='$kode'");
		return $hsl;
	}
	function update_pemilih_tanpa_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level){
		$hsl=$this->db->query("UPDATE tbl_pemilih set pemilih_nama='$nama',pemilih_jenkel='$jenkel',pemilih_username='$username',pemilih_password=md5('$password'),pemilih_email='$email',pemilih_nohp='$nohp',pemilih_level='$level' where pemilih_id='$kode'");
		return $hsl;
	}
	//END UPDATE pemilih//

	function hapus_jadwal($kode){
		$hsl=$this->db->query("DELETE FROM tbl_jadwal_pemilihan where id='$kode'");
		return $hsl;
	}
	function getusername($id){
		$hsl=$this->db->query("SELECT * FROM tbl_pemilih where id_pemilih='$id'");
		return $hsl;
	}
	function resetpass($id,$pass){
		$hsl=$this->db->query("UPDATE tbl_pemilih set pemilih_password=md5('$pass') where pemilih_id='$id'");
		return $hsl;
	}

	function get_jadwal_login($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_jadwal_pemilihan where id='$kode'");
		return $hsl;
	}

	function hapus_semua_data(){
		$hsl=$this->db->query("DELETE FROM tbl_jadwal_pemilihan");
		return $hsl;
	}

}