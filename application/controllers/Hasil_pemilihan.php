<?php
class Hasil_pemilihan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_hasil_pemilihan');
	}

	function index(){
		$x['data']=$this->m_hasil_pemilihan->get_hasil_pemilihan();
		$this->load->view('v_hasil_pemilihan',$x);
	}

	function hapus_semua_hasil_pemilihan(){
		$this->m_hasil_pemilihan->hapus_semua_data();
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('hasil_pemilihan');
	}
} 