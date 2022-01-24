<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Periksa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_periksa');
		is_logged_in();
	}

	public function tp()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Periksa Kegiatan / Tugas';
    	$data['description']	= "Halaman Periksa Kegiatan / Tugas";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "";
    	$data['sub_menu']		= "periksatugas";
    	$data['pegawai']     		= $this->M_periksa->get_pegawai();
    	$data['container']		= $this->load->view('periksa/v_pegawai', $data, true);
    	$this->load->view('admin_template', $data);

	}

    public function kegiatan()
    {
        $breadcrumbs        = $this->breadcrumbs;

        $breadcrumbs->add('Home', base_url().'home');
        $breadcrumbs->add('Dashboard', base_url().'home');
        $breadcrumbs->render();

        $data['title']          = 'Halaman Periksa Kegiatan / Tugas';
        $data['description']    = "Halaman Periksa Kegiatan / Tugas";
        $data['breadcrumbs']    = $breadcrumbs->render();
        $data['extra_css']      = "";
        $data['extra_js']       = "";
        $data['menu_active']    = "";
        $data['sub_menu']       = "periksatugas";
        $nip=$this->uri->segment(3);
        $data['tp_ip_tugas']            = $this->M_periksa->get_kegiatan($nip);
        $data['container']      = $this->load->view('periksa/v_kegiatan', $data, true);
        $this->load->view('admin_template', $data);

    }

    public function kegiatan_selesai()
    {
        $id_tugas        = $this->uri->segment(3);
        $nip        = $this->uri->segment(4);

		$this->M_periksa->get_kegiatan_selesai($id_tugas);

        $this->session->set_flashdata('notifinput', "sukses_input");

        redirect('periksa/tp/'.$nip,'refresh');

    }
	
	


}