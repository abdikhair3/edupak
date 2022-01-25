<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');

	}

	public function index()
	{
	
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Daftar ';
    	$data['description']	= "Halaman Daftar ";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$this->load->view('daftar_template', $data);
	}

	public function proses()
    {
        $data = array(
            'nik' => $this->input->post('nik'),
            'nm_member' => $this->input->post('nm_member'),
            'alamat' => $this->input->post('alamat'),
            'notelp' => $this->input->post('notelp'),
            'institusi' => $this->input->post('institusi')
        );
        $this->db->insert('bp_member', $data);

        $this->db->order_by("id_member", "desc");
		$dt_tr=$this->db->get('bp_member')->first_row();

		$password = $this->input->post('password');
		$key = password_hash($password, PASSWORD_DEFAULT);
        $data1 = array(
            'id_member' => $dt_tr->id_member,
            'username' => $this->input->post('username'),
            'password' => $key,
            'level' => 'User_Member',
            'nm_users' => $this->input->post('nm_member')
        );

        $this->db->insert('x_users', $data1);

			$this->session->set_flashdata('notif', $this->Notif->Daftar_success());
			redirect(base_url("login"));

    }

	





}