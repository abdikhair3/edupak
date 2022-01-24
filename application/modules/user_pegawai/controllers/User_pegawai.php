<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_pegawai extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user_pegawai');
		is_logged_in();
	}

	public function tp()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman User Pegawai';
    	$data['description']	= "Halaman User Pegawai";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "masteruser";
    	$data['sub_menu']		= "userpegawai";

        $this->db->where('id_unit', $this->session->userdata('id_member'));
        $unit_ses = $this->db->get('dp_unit')->first_row();

        $this->db->join('dp_pegawai', 'dp_pegawai.id_pegawai = x_users.id_member');
        $this->db->where('dp_pegawai.id_unit', $unit_ses->key_unit);
        $cek_jml_pegawai = $this->db->get('x_users')->num_rows();
        if($cek_jml_pegawai>=1) {
            	$data['user_pegawai']     		= $this->M_user_pegawai->get_user_pegawai($unit_ses->key_unit); }
    	$data['container']		= $this->load->view('user_pegawai/v_user_pegawai', $data, true);
    	$this->load->view('admin_template', $data);

	}

	public function tambah_user_auto() {

			$this->M_user_pegawai->get_tambah_user_auto();

			$this->session->set_flashdata('notifinput', "sukses_input");

            redirect('user_pegawai/tp','refresh');
    }

}