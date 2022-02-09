<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_dashboard');
		is_logged_in();
	}

	public function index()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Utama';
    	$data['description']	= "Halaman Utama";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "";
    	$data['sub_menu']		= "";
    	$data['container']		= $this->load->view('dashboard/v_dashboard', $data, true);
    	$this->load->view('admin_template', $data);

	}
	
	


}