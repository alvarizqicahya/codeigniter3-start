<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('App');

		// cek login
		$this->auth->cek();
	}

	public function index()
	{
		$data['_title'] = "Dashboard";
		$data['nama_user'] = $this->session->userdata('nama');
		$akses = $this->session->userdata('akses');

		$data['login_as'] = $akses;

		$this->template->display_theme('pages/V_dashboard', $data);
		unset($_SESSION['alert']);
	}

	public function redirect()
	{
		redirect(base_url('dashboard'));
	}
}
