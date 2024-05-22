<?php
class Pemilih extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['logged_in'])) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_admin');
		$this->load->model('m_pemilih');
		$this->load->library('upload');
	}

	function index()
	{
		$kode = $this->session->userdata('idadmin');
		$x['user'] = $this->m_admin->get_admin_login($kode);
		$x['data'] = $this->m_pemilih->get_all_pemilih();
		$this->load->view('v_pemilih', $x);
	}

	function simpan_admin()
	{

		$nama = $this->input->post('xnama'); //nama
		$nonik = $this->input->post('xnik'); //nik
		$nokk = $this->input->post('xkk'); //kk
		$jenkel = $this->input->post('xjenkel'); //jenis kelamin
		$tmplahir = $this->input->post('xtmp_lahir'); //tempat lahir
		$tgllahir = $this->input->post('xtgl_lahir'); //tanggal lahir
		$agama = $this->input->post('xagama'); //agama
		$status = $this->input->post('xstatus'); //status Keluarga
		if ($status == "1") {
			$statuskeluarga = "Kepala Keluarga";
			$xf3 = 1;
		} else if ($status == "2") {
			$statuskeluarga = "Istri";
			$xf3 = 0;
		} else {
			$statuskeluarga = "Anak";
			$xf3 = 0;
		}

		$rukuntetangga = $this->input->post('xrt');
		if ($rukuntetangga == "1") {
			$rt = "1";
		} else if ($rukuntetangga == "2") {
			$rt = "2";
		} else if ($rukuntetangga == "3") {
			$rt = "3";
		} else if ($rukuntetangga == "4") {
			$rt = "4";
		} else {
			$rt = "5";
		}

		$tahunmenetap = $this->input->post('xdateA');
		$dateB = '01-01-2015';
		if (strtotime($tahunmenetap) >= strtotime($dateB)) {
			$xf1 = 0;
		} else {
			$xf1 = 1;
		}

		$tgllahir1 = new DateTime($tgllahir);
		$today = new DateTime("today");
		$umur = $today->diff($tgllahir1)->y;

		if ($umur > 18) {
			$xf2 = 1;
		} else {
			$xf2 = 0;
		}

		$status = $this->input->post('xstatus');
		if ($status == "1") {
			$xf3 = 1;
		} else {
			$xf3 = 0;
		}

		if ($xf1 == 1 && $xf2 == 1 && $xf3 == 1) {
			$gap1 = 5;
			$gap2 = 5;
			$gap3 = 5;
			$jumlah = $gap1 + $gap2 + $gap3;
			$nilai = $jumlah / 3;
			$izin = "diizinkan";
		} else if ($xf1 == 0 && $xf2 == 1 && $xf3 == 1) {
			$gap1 = 4;
			$gap2 = 5;
			$gap3 = 5;
			$jumlah = $gap1 + $gap2 + $gap3;
			$nilai = $jumlah / 3;
			$izin = " tidak diizinkan";
		} else if ($xf1 == 1 && $xf2 == 0 && $xf3 == 1) {
			$gap1 = 5;
			$gap2 = 4;
			$gap3 = 5;
			$jumlah = $gap1 + $gap2 + $gap3;
			$nilai = $jumlah / 3;
			$izin = " tidak diizinkan";
		} else if ($xf1 == 1 && $xf2 == 1 && $xf3 == 0) {
			$gap1 = 5;
			$gap2 = 5;
			$gap3 = 4;
			$jumlah = $gap1 + $gap2 + $gap3;
			$nilai = $jumlah / 3;
			$izin = " tidak diizinkan";
		} else if ($xf1 == 0 && $xf2 == 0 && $xf3 == 1) {
			$gap1 = 4;
			$gap2 = 4;
			$gap3 = 5;
			$jumlah = $gap1 + $gap2 + $gap3;
			$nilai = $jumlah / 3;
			$izin = " tidak diizinkan";
		} else if ($xf1 == 1 && $xf2 == 0 && $xf3 == 0) {
			$gap1 = 5;
			$gap2 = 4;
			$gap3 = 4;
			$jumlah = $gap1 + $gap2 + $gap3;
			$nilai = $jumlah / 3;
			$izin = " tidak diizinkan";
		} else if ($xf1 == 0 && $xf2 == 1 && $xf3 == 0) {
			$gap1 = 4;
			$gap2 = 5;
			$gap3 = 4;
			$jumlah = $gap1 + $gap2 + $gap3;
			$nilai = $jumlah / 3;
			$izin = " tidak diizinkan";
		} else {
			$gap1 = 4;
			$gap2 = 4;
			$gap3 = 4;
			$jumlah = $gap1 + $gap2 + $gap3;
			$nilai = $jumlah / 3;
			$izin = " tidak diizinkan";
		}
		$statusmemilih = "0";
		$this->m_pemilih->simpan_pemilih($nama, $nonik, $nokk, $jenkel, $tmplahir, $tgllahir, $tahunmenetap, $agama, $umur, $statuskeluarga, $rt, $nilai, $izin, $statusmemilih);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('pemilih');
	}

	function update_pemilih()
	{
		$kode = $this->input->post('kode'); //kode id
		$nama = $this->input->post('xnama'); //nama
		$nonik = $this->input->post('xnik'); //nik
		$nokk = $this->input->post('xkk'); //kk
		$jenkel = $this->input->post('xjenkel'); //jenis kelamin
		$tmplahir = $this->input->post('xtmp_lahir'); //tempat lahir
		$tgllahir = $this->input->post('xtgl_lahir'); //tanggal lahir
		$agama = $this->input->post('xagama'); //agama
		$status = $this->input->post('xstatus'); //status Keluarga
		if ($status == "1") {
			$statuskeluarga = "Kepala Keluarga";
			$xf3 = 1;
		} else if ($status == "2") {
			$statuskeluarga = "Istri";
			$xf3 = 0;
		} else {
			$statuskeluarga = "Anak";
			$xf3 = 0;
		}

		$rukuntetangga = $this->input->post('xrt');
		if ($rukuntetangga == "1") {
			$rt = "1";
		} else if ($rukuntetangga == "2") {
			$rt = "2";
		} else if ($rukuntetangga == "3") {
			$rt = "3";
		} else if ($rukuntetangga == "4") {
			$rt = "4";
		} else {
			$rt = "5";
		}

		$tahunmenetap = $this->input->post('xdateA');
		$dateB = '01-01-2015';
		if (strtotime($tahunmenetap) >= strtotime($dateB)) {
			$xf1 = 0;
		} else {
			$xf1 = 1;
		}

		$tgllahir1 = new DateTime($tgllahir);
		$today = new DateTime("today");
		$umur = $today->diff($tgllahir1)->y;

		if ($umur > 18) {
			$xf2 = 1;
		} else {
			$xf2 = 0;
		}

		$status = $this->input->post('xstatus');
		if ($status == "1") {
			$xf3 = 1;
		} else {
			$xf3 = 0;
		}

		if ($xf1 == 1 && $xf2 == 1 && $xf3 == 1) {
			$gap1 = 5;
			$gap2 = 5;
			$gap3 = 5;
			$jumlah = $gap1 + $gap2 + $gap3;
			$nilai = $jumlah / 3;
			$izin = "diizinkan";
		} else if ($xf1 == 0 && $xf2 == 1 && $xf3 == 1) {
			$gap1 = 4;
			$gap2 = 5;
			$gap3 = 5;
			$jumlah = $gap1 + $gap2 + $gap3;
			$nilai = $jumlah / 3;
			$izin = " tidak diizinkan";
		} else if ($xf1 == 1 && $xf2 == 0 && $xf3 == 1) {
			$gap1 = 5;
			$gap2 = 4;
			$gap3 = 5;
			$jumlah = $gap1 + $gap2 + $gap3;
			$nilai = $jumlah / 3;
			$izin = " tidak diizinkan";
		} else if ($xf1 == 1 && $xf2 == 1 && $xf3 == 0) {
			$gap1 = 5;
			$gap2 = 5;
			$gap3 = 4;
			$jumlah = $gap1 + $gap2 + $gap3;
			$nilai = $jumlah / 3;
			$izin = " tidak diizinkan";
		} else if ($xf1 == 0 && $xf2 == 0 && $xf3 == 1) {
			$gap1 = 4;
			$gap2 = 4;
			$gap3 = 5;
			$jumlah = $gap1 + $gap2 + $gap3;
			$nilai = $jumlah / 3;
			$izin = " tidak diizinkan";
		} else if ($xf1 == 1 && $xf2 == 0 && $xf3 == 0) {
			$gap1 = 5;
			$gap2 = 4;
			$gap3 = 4;
			$jumlah = $gap1 + $gap2 + $gap3;
			$nilai = $jumlah / 3;
			$izin = " tidak diizinkan";
		} else if ($xf1 == 0 && $xf2 == 1 && $xf3 == 0) {
			$gap1 = 4;
			$gap2 = 5;
			$gap3 = 4;
			$jumlah = $gap1 + $gap2 + $gap3;
			$nilai = $jumlah / 3;
			$izin = " tidak diizinkan";
		} else {
			$gap1 = 4;
			$gap2 = 4;
			$gap3 = 4;
			$jumlah = $gap1 + $gap2 + $gap3;
			$nilai = $jumlah / 3;
			$izin = " tidak diizinkan";
		}
		$statusmemilih = "0";
		$this->m_pemilih->update_pemilih($kode, $nama, $nonik, $nokk, $jenkel, $tmplahir, $tgllahir, $tahunmenetap, $agama, $umur, $statuskeluarga, $rt, $nilai, $izin, $statusmemilih);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('pemilih');
	}

	function hapus_pemilih()
	{
		$kode = $this->input->post('kode');
		$data = $this->m_pemilih->get_pemilih_login($kode);
		$this->m_pemilih->hapus_pemilih($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('pemilih');
	}

	function hapus_semua_pemilih(){
		$this->m_pemilih->hapus_semua_data();
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('pemilih');
	}
}
