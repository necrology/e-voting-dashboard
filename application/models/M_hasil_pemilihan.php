<?php
class M_hasil_pemilihan extends CI_Model{

	function get_hasil_pemilihan(){
		$hsl=$this->db->query("SELECT * FROM tbl_hasil_pemilihan");
		return $hsl;
	}
	
	function get_hasil_pemilihan_pdf(){
		$hsl=$this->db->query("SELECT * FROM tbl_hasil_pemilihan ORDER BY hasil_pemilihan_rt ASC, calon_noUrut ASC");
		return $hsl;
	}

	function get_data_belum_memilih(){
		$hsl=$this->db->query("SELECT * FROM tbl_pemilih WHERE statusMemilih_pemilih = 0 AND izin_pemilih = 'diizinkan'");
		return $hsl->result_array();
	}

	function simpan_hasil_pemilihan($rt,$urut,$nik,$nama,$suara,$golput){
		
		$this->db->db_debug = false;
		if (!$this->db->query("INSERT INTO tbl_hasil_pemilihan(hasil_pemilihan_rt,calon_noUrut,nik_calon,hasil_pemilihan_calon,hasil_pemilihan_suara,hasil_pemilihan_golput) VALUES ('$rt','$urut','$nik','$nama','$suara','$golput')")) {
			$error = $this->db->error();
			if ($error['code'] == 1062) {
				echo $this->session->set_flashdata('msg', 'duplikasi');
				redirect('calon');
			}
		}
		$this->db->db_debug = true;

	}
	
	function reply_hasil_pemilihan($kode,$hasil_pemilihan,$tulisan_id){
		$nama=$this->session->userdata('nama');
		$hsl=$this->db->query("INSERT INTO tbl_hasil_pemilihan(hasil_pemilihan_nama,hasil_pemilihan_isi,hasil_pemilihan_status,hasil_pemilihan_tulisan_id,hasil_pemilihan_parent) VALUES ('$nama','$hasil_pemilihan','1','$tulisan_id','$kode')");
		return $hsl;
	}

	function publish_hasil_pemilihan($kode){
		$hsl=$this->db->query("UPDATE tbl_hasil_pemilihan SET hasil_pemilihan_status='1' WHERE hasil_pemilihan_id='$kode'");
		return $hsl;
	}

	function hapus_hasil_pemilihan($kode){
		$hsl=$this->db->query("DELETE FROM tbl_hasil_pemilihan WHERE hasil_pemilihan_id='$kode'");
		return $hsl;
	}

	function hapus_semua_data(){
		$hsl=$this->db->query("DELETE FROM tbl_hasil_pemilihan");
		return $hsl;
	}
}