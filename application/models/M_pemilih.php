<?php
class M_pemilih extends CI_Model
{

	function get_all_pemilih()
	{
		$hsl = $this->db->query("SELECT tbl_pemilih.*,IF(jenisKelamin_pemilih='L','Laki-Laki','Perempuan') AS jenkel FROM tbl_pemilih");
		return $hsl;
	}

	function hapus_semua_data()
	{
		$hsl = $this->db->query("DELETE FROM tbl_pemilih");
		return $hsl;
	}

	function simpan_pemilih($nama, $nonik, $nokk, $jenkel, $tmplahir, $tgllahir, $tahunmenetap, $agama, $umur, $statuskeluarga, $rt, $nilai, $izin, $statusmemilih)
	{	
		// $this->db->db_debug = false;
		if (!$this->db->query("INSERT INTO tbl_pemilih (nama_pemilih,noNik_pemilih,noKK_pemilih,jenisKelamin_pemilih,tempatLahir_pemilih,tglLahir_pemilih,tahunMenetap_pemilih,agama_pemilih,umur_pemilih,statusKeluarga_pemilih,rt_pemilih,nilai_PmPemilih,izin_pemilih,statusMemilih_pemilih) VALUES ('$nama','$nonik','$nokk','$jenkel','$tmplahir','$tgllahir','$tahunmenetap','$agama','$umur','$statuskeluarga','$rt','$nilai','$izin','$statusmemilih')")) {
			$error = $this->db->error();
			if ($error['code'] == 1062) {
				echo $this->session->set_flashdata('msg', 'duplikasi');
				redirect('pemilih');
			}
		}
		// $this->db->db_debug = true;
	}

	function simpan_pemilih_tanpa_gambar($nama, $jenkel, $username, $password, $email, $nohp, $level)
	{
		$hsl = $this->db->query("INSERT INTO tbl_pemilih (pemilih_nama,pemilih_jenkel,pemilih_username,pemilih_password,pemilih_email,pemilih_nohp,pemilih_level) VALUES ('$nama','$jenkel','$username',md5('$password'),'$email','$nohp','$level')");
		return $hsl;
	}

	//UPDATE pemilih //
	function update_pemilih_tanpa_pass($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level, $gambar)
	{
		$hsl = $this->db->query("UPDATE tbl_pemilih set pemilih_nama='$nama',pemilih_jenkel='$jenkel',pemilih_username='$username',pemilih_email='$email',pemilih_nohp='$nohp',pemilih_level='$level',pemilih_photo='$gambar' where pemilih_id='$kode'");
		return $hsl;
	}
	function update_pemilih($kode, $nama, $nonik, $nokk, $jenkel, $tmplahir, $tgllahir, $tahunmenetap, $agama, $umur, $statuskeluarga, $rt, $nilai, $izin, $statusmemilih)
	{
		$hsl = $this->db->query("UPDATE tbl_pemilih set nama_pemilih='$nama', noNik_pemilih='$nonik', noKK_pemilih='$nokk', jenisKelamin_pemilih='$jenkel', tempatLahir_pemilih='$tmplahir', tglLahir_pemilih='$tgllahir', tahunMenetap_pemilih='$tahunmenetap', agama_pemilih='$agama', umur_pemilih='$umur', statusKeluarga_pemilih='$statuskeluarga', rt_pemilih='$rt', nilai_PmPemilih='$nilai', izin_pemilih='$izin', statusMemilih_pemilih='$statusmemilih' where id_pemilih='$kode'");
		return $hsl;
	}

	function update_pemilih_tanpa_pass_dan_gambar($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level)
	{
		$hsl = $this->db->query("UPDATE tbl_pemilih set pemilih_nama='$nama',pemilih_jenkel='$jenkel',pemilih_username='$username',pemilih_email='$email',pemilih_nohp='$nohp',pemilih_level='$level' where pemilih_id='$kode'");
		return $hsl;
	}
	function update_pemilih_tanpa_gambar($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level)
	{
		$hsl = $this->db->query("UPDATE tbl_pemilih set pemilih_nama='$nama',pemilih_jenkel='$jenkel',pemilih_username='$username',pemilih_password=md5('$password'),pemilih_email='$email',pemilih_nohp='$nohp',pemilih_level='$level' where pemilih_id='$kode'");
		return $hsl;
	}
	//END UPDATE pemilih//

	function hapus_pemilih($kode)
	{
		$hsl = $this->db->query("DELETE FROM tbl_pemilih where id_pemilih='$kode'");
		return $hsl;
	}
	function getusername($id)
	{
		$hsl = $this->db->query("SELECT * FROM tbl_pemilih where id_pemilih='$id'");
		return $hsl;
	}
	function resetpass($id, $pass)
	{
		$hsl = $this->db->query("UPDATE tbl_pemilih set pemilih_password=md5('$pass') where pemilih_id='$id'");
		return $hsl;
	}

	function get_pemilih_login($kode)
	{
		$hsl = $this->db->query("SELECT * FROM tbl_pemilih where id_pemilih='$kode'");
		return $hsl;
	}
}
