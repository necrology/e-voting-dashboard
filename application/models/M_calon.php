<?php
class M_calon extends CI_Model{

	function get_all_calon(){
		$hsl=$this->db->query("SELECT tbl_calonketuart.*,IF(jenisKelamin_calon='L','Laki-Laki','Perempuan') AS jenkel FROM tbl_calonketuart");
		return $hsl;	
	}

	function simpan_calon($nama,$nik,$kk,$jenkel,$tmp_lahir,$tgl_lahir,$umur,$agama,$urut,$visi,$misi,$rt,$gambar){
		
		$this->db->db_debug = false;
		if (!$this->db->query("INSERT INTO tbl_calonketuart (nama_calon,noNik_calon,noKK_calon,jenisKelamin_calon,tempatLahir_calon,tglLahir_calon,umur_calon,agama_calon,calonNo_urut,visi_calon,misi_calon,rt,photo_calon) VALUES ('$nama','$nik','$kk','$jenkel','$tmp_lahir','$tgl_lahir','$umur','$agama','$urut','$visi','$misi','$rt','$gambar')")) {
			$error = $this->db->error();
			if ($error['code'] == 1062) {
				echo $this->session->set_flashdata('msg', 'duplikasi');
				redirect('calon');
			}
		}
		$this->db->db_debug = true;
		
	}

	function simpan_pemilih_tanpa_gambar($nama,$jenkel,$username,$password,$email,$nohp,$level){
		$hsl=$this->db->query("INSERT INTO tbl_pemilih (pemilih_nama,pemilih_jenkel,pemilih_username,pemilih_password,pemilih_email,pemilih_nohp,pemilih_level) VALUES ('$nama','$jenkel','$username',md5('$password'),'$email','$nohp','$level')");
		return $hsl;
	}

	//UPDATE pemilih //
	
	function update_calon($kode, $nama, $nik, $kk, $jenkel, $tmp_lahir, $tgl_lahir, $umur, $agama, $urut, $visi, $misi, $rt, $gambar, $suara){
		$hsl=$this->db->query("UPDATE tbl_calonketuart SET nama_calon='$nama',noNik_calon='$nik',noKK_calon='$kk',jenisKelamin_calon='$jenkel',tempatLahir_calon='$tmp_lahir',tglLahir_calon='$tgl_lahir',umur_calon='$umur',agama_calon='$agama',calonNo_urut='$urut', visi_calon='$visi', misi_calon='$misi', rt='$rt', photo_calon='$gambar' WHERE id_calon='$kode'");
		return $hsl;
	}

	function update_calon_tanpa_gambar($kode, $nama, $nik, $kk, $jenkel, $tmp_lahir, $tgl_lahir, $umur, $agama, $urut, $visi, $misi, $rt){
		$hsl=$this->db->query("UPDATE tbl_calonketuart SET nama_calon='$nama',noNik_calon='$nik',noKK_calon='$kk',jenisKelamin_calon='$jenkel',tempatLahir_calon='$tmp_lahir',tglLahir_calon='$tgl_lahir',umur_calon='$umur',agama_calon='$agama', calonNo_urut='$urut', visi_calon='$visi', misi_calon='$misi', rt='$rt' WHERE id_calon='$kode'");
		return $hsl;
	}
	//END UPDATE pemilih//

	function hapus_calon($kode){
		$hsl=$this->db->query("DELETE FROM tbl_calonketuart where id_calon='$kode'");
		return $hsl;
	}
	function getusername($id){
		$hsl=$this->db->query("SELECT * FROM tbl_pemilih where pemilih_id='$id'");
		return $hsl;
	}
	function resetpass($id,$pass){
		$hsl=$this->db->query("UPDATE tbl_pemilih set pemilih_password=md5('$pass') where pemilih_id='$id'");
		return $hsl;
	}

	function get_calon_login($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_calonketuart where id_calon='$kode'");
		return $hsl;
	}

	function hapus_semua_data(){
		$hsl=$this->db->query("DELETE FROM tbl_calonketuart");
		return $hsl;
	}
}