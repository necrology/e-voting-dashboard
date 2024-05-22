<?php
class Jadwal extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['logged_in'])) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_admin');
		$this->load->model('m_jadwal');
		$this->load->library('upload');
	}

	function index()
	{
		$kode = $this->session->userdata('idadmin');
		$x['user'] = $this->m_admin->get_admin_login($kode);
		$x['data'] = $this->m_jadwal->get_all_jadwal();
		$this->load->view('v_jadwal', $x);
	}

	function simpan_jadwal()
	{

		$rt = $this->input->post('xrt');
		$mulai = $this->input->post('xmulai');
		$selesai = $this->input->post('xselesai');
		
		$this->m_jadwal->simpan_jadwal($rt,$mulai,$selesai);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('jadwal');
	}

	function update_jadwal()
	{
		$kode = $this->input->post('kode');
		$rt = $this->input->post('xrt');
		$mulai = $this->input->post('xmulai');
		$selesai = $this->input->post('xselesai');

		$this->m_jadwal->update_jadwal($kode,$rt,$mulai,$selesai);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('jadwal');
	}

	function hapus_jadwal()
	{
		$kode = $this->input->post('kode');
		$this->m_jadwal->hapus_jadwal($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('jadwal');
	}

	function hapus_semua_jadwal(){
		$this->m_jadwal->hapus_semua_data();
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('jadwal');
	}
}
