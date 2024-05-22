<?php
class Calon extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['logged_in'])) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_admin');
		$this->load->model('m_calon');
		$this->load->model('m_hasil_pemilihan');
		$this->load->library('upload');
	}

	function index()
	{
		$kode = $this->session->userdata('idadmin');
		$x['user'] = $this->m_admin->get_admin_login($kode);
		$x['data'] = $this->m_calon->get_all_calon();
		$this->load->view('v_calon', $x);
	}

	function simpan_calon()
	{
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '100%';
				$config['width'] = 300;
				$config['height'] = 300;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
				$nama = $this->input->post('xnama');
				$nik = $this->input->post('xnik');
				$kk = $this->input->post('xkk');
				$jenkel = $this->input->post('xjenkel');
				$tmp_lahir = $this->input->post('xtmp_lahir');
				$tgl_lahir = $this->input->post('xtgl_lahir');
				$tgllahir1 = new DateTime($tgl_lahir);
				$today = new DateTime("today");
				$umur = $today->diff($tgllahir1)->y;
				$agama = $this->input->post("xagama");
				$urut = $this->input->post("xurut");
				$visi = $this->input->post("xvisi");
				$misi = $this->input->post("xmisi");
				$rt = $this->input->post("xrt");
				$suara = "0";
				$golput1 = $this->m_hasil_pemilihan->get_data_belum_memilih();
				$golput = count($golput1);
				
				$this->m_calon->simpan_calon($nama, $nik, $kk, $jenkel, $tmp_lahir, $tgl_lahir, $umur, $agama, $urut, $visi, $misi, $rt, $gambar);
				$this->m_hasil_pemilihan->simpan_hasil_pemilihan($rt,$urut,$nik,$nama,$suara,$golput);
				echo $this->session->set_flashdata('msg', 'success');
				redirect('calon');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('calon');
			}
		} else {
			echo $this->session->set_flashdata('msg', 'warning');
			redirect('calon');
		}
	}

	function update_calon()
	{
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 300;
				$config['height'] = 300;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
				$kode = $this->input->post('kode');
				$nama = $this->input->post('xnama');
				$nik = $this->input->post('xnik');
				$kk = $this->input->post('xkk');
				$jenkel = $this->input->post('xjenkel');
				$tmp_lahir = $this->input->post('xtmp_lahir');
				$tgl_lahir = $this->input->post('xtgl_lahir');
				$tgllahir1 = new DateTime($tgl_lahir);
				$today = new DateTime("today");
				$umur = $today->diff($tgllahir1)->y;
				$agama = $this->input->post("xagama");
				$visi = $this->input->post("xvisi");
				$misi = $this->input->post("xmisi");
				$rt = $this->input->post("xrt");
				$urut = $this->input->post("xurut");
				

				$this->m_calon->update_calon($kode, $nama, $nik, $kk, $jenkel, $tmp_lahir, $tgl_lahir, $umur, $agama, $urut, $visi, $misi, $rt, $gambar);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('calon');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('calon');
			}
		} else {
			$kode = $this->input->post('kode');
			$nama = $this->input->post('xnama');
			$nik = $this->input->post('xnik');
			$kk = $this->input->post('xkk');
			$jenkel = $this->input->post('xjenkel');
			$tmp_lahir = $this->input->post('xtmp_lahir');
			$tgl_lahir = $this->input->post('xtgl_lahir');
			$tgllahir1 = new DateTime($tgl_lahir);
			$today = new DateTime("today");
			$umur = $today->diff($tgllahir1)->y;
			$agama = $this->input->post("xagama");
			$visi = $this->input->post("xvisi");
			$misi = $this->input->post("xmisi");
			$rt = $this->input->post("xrt");
			$urut = $this->input->post("xurut");

			$this->m_calon->update_calon_tanpa_gambar($kode, $nama, $nik, $kk, $jenkel, $tmp_lahir, $tgl_lahir, $umur, $agama, $urut, $visi, $misi, $rt);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('calon');
		}
	}

	function hapus_calon()
	{
		$kode = $this->input->post('kode');
		$data = $this->m_calon->get_calon_login($kode);
		$q = $data->row_array();
		$p = $q['photo_calon'];
		$path = base_url() . 'assets/images/' . $p;
		delete_files($path);
		$this->m_calon->hapus_calon($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('calon');
	}

	function hapus_semua_calon(){
		$this->m_calon->hapus_semua_data();
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('calon');
	}
	
}
