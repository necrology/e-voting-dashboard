<?php
class Pengumuman extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pengumuman');
		$this->load->model('m_pemilih');
		$this->load->library('upload');
	}


	function index(){
		$x['data']=$this->m_pengumuman->get_all_pengumuman();
		$this->load->view('v_pengumuman',$x);
	}
	function add_pengumuman(){
		$this->load->view('v_add_pengumuman');
	}
	function get_edit(){
		$kode=$this->uri->segment(3);
		$x['data']=$this->m_pengumuman->get_pengumuman_by_kode($kode);
		$this->load->view('v_edit_pengumuman',$x);
	}
	function simpan_pengumuman(){

							$judul=strip_tags($this->input->post('xjudul'));
							$isi=$this->input->post('xisi');
	
							$this->m_pengumuman->simpan_pengumuman($judul,$isi);
							echo $this->session->set_flashdata('msg','success');
							redirect('pengumuman');
	}
	
	function update_pengumuman(){
				
	                        $pengumuman_id=$this->input->post('kode');
	                        $judul=strip_tags($this->input->post('xjudul'));
							$isi=$this->input->post('xisi');

							$this->m_pengumuman->update_pengumuman($pengumuman_id,$judul,$isi);
							echo $this->session->set_flashdata('msg','info');
							redirect('pengumuman');

	}

	function hapus_pengumuman(){
		$kode=$this->input->post('kode');
		$this->m_pengumuman->hapus_pengumuman($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('pengumuman');
	}

	function hapus_semua_pengumuman(){
		$this->m_pengumuman->hapus_semua_data();
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('pengumuman');
	}

}