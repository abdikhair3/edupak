<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function satuan()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Master Satuan';
    	$data['description']	= "Halaman Master Satuan";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "master";
    	$data['sub_menu']		= "satuan";
        $data['satuan']       = $this->db->get('dp_satuan')->result();
    	$data['container']		= $this->load->view('master/v_satuan', $data, true);
    	$this->load->view('admin_template', $data);

	}

    public function unit()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Master Unit';
    	$data['description']	= "Halaman Master Unit";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "master";
    	$data['sub_menu']		= "unit";
        $data['unit']       = $this->db->get('dp_unit')->result();
    	$data['container']		= $this->load->view('master/v_unit', $data, true);
    	$this->load->view('admin_template', $data);

	}

    public function jenis()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Master Jenis';
    	$data['description']	= "Halaman Master Jenis";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "master";
    	$data['sub_menu']		= "jenis";
        $data['jenis']       = $this->db->get('dp_jenis_jabatan')->result();
    	$data['container']		= $this->load->view('master/v_jenis', $data, true);
    	$this->load->view('admin_template', $data);

	}

    public function jabatan()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Master Jabatan';
    	$data['description']	= "Halaman Master Jabatan";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "master";
    	$data['sub_menu']		= "jabatan";
        $data['jabatan']       = $this->db->get('dp_jabatan')->result();
    	$data['container']		= $this->load->view('master/v_jabatan', $data, true);
    	$this->load->view('admin_template', $data);

	}

    public function pangkat()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Master Pangkat';
    	$data['description']	= "Halaman Master Pangkat";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "master";
    	$data['sub_menu']		= "pangkat";
        $data['pangkat']       = $this->db->get('dp_pangkat')->result();
    	$data['container']		= $this->load->view('master/v_pangkat', $data, true);
    	$this->load->view('admin_template', $data);

	}

    public function pegawai()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Master Pegawai';
    	$data['description']	= "Halaman Master Pegawai";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "master";
    	$data['sub_menu']		= "pegawai";
        $data['pegawai']       = $this->db->get('dp_pegawai')->result();
    	$data['container']		= $this->load->view('master/v_pegawai', $data, true);
    	$this->load->view('admin_template', $data);

	}

}