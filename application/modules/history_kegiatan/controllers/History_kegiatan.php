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
    	// $bln_cari=$this->uri->segment(3);
    	$data['history_harian']   = $this->M_history_kegiatan->get_history_harian();
    	$data['tahun']   = $this->M_history_kegiatan->get_tahun();
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
    	$data['tahun']   = $this->M_history_kegiatan->get_tahun();
    	$data['history_bulanan']   = $this->M_history_kegiatan->get_history_bulanan();
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
    	$data['tahun']   = $this->M_history_kegiatan->get_tahun();
    	$data['history_semester']     		= $this->M_history_kegiatan->get_history_semester();
    	$data['container']		= $this->load->view('history_kegiatan/v_semester', $data, true);
    	$this->load->view('admin_template', $data);

	}

}