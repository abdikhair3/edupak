<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class History_kegiatan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_history_kegiatan');
		is_logged_in();
	}

	public function harian()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman History Kegiatan / Tugas Harian';
    	$data['description']	= "Halaman History Kegiatan / Tugas Harian";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "historytugas";
    	$data['sub_menu']		= "historytugasharian";
    	$data['history_harian']   = $this->M_history_kegiatan->get_history_harian();
    	$data['container']		= $this->load->view('history_kegiatan/v_harian', $data, true);
    	$this->load->view('admin_template', $data);

	}

	public function bulanan()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman History Kegiatan / Tugas Bulanan';
    	$data['description']	= "Halaman History Kegiatan / Tugas Bulanan";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "historytugas";
    	$data['sub_menu']		= "historytugasbulanan";
    	$bln_cari=$this->uri->segment(3);
    	$data['history_bulanan']   = $this->M_history_kegiatan->get_history_bulanan($bln_cari);
    	$data['container']		= $this->load->view('history_kegiatan/v_bulanan', $data, true);
    	$this->load->view('admin_template', $data);

	}

	public function semester()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman History Kegiatan / Tugas Semester';
    	$data['description']	= "Halaman History Kegiatan / Tugas Semester";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "historytugas";
    	$data['sub_menu']		= "historytugassemester";
    	// $id=$this->uri->segment(3);
    	// $data['output_kerja']     		= $this->M_output_kerja->get_output_kerja();
    	$data['container']		= $this->load->view('history_kegiatan/v_semester', $data, true);
    	$this->load->view('admin_template', $data);

	}

}