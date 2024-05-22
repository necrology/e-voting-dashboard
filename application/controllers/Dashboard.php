<?php
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['logged_in'])) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_hasil_pemilihan');
	}
	function index()
	{
		$x['data'] = $this->m_hasil_pemilihan->get_hasil_pemilihan();
		$this->load->view('v_dashboard', $x);
	}
}
