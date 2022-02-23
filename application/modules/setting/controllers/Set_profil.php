<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Set_profil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

    public function index()
    {
        $breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Setting Profil';
    	$data['description']	= "Halaman Setting Profil";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "";
    	$data['sub_menu']		= "";
        $this->db->join('dp_pegawai','dp_pegawai.id_pegawai=x_users.id_member','left');
        $data['profil']         = $this->db->get_where('x_users', ['id_member'=>$this->session->userdata('id_member')])->first_row();
        $this->db->join('dp_jabatan','dp_jabatan.id_jabatan=dp_pegawai.id_jabatan','left');
        $data['atasan']         = $this->db->get_where('dp_pegawai', ['id_satuan'=> $data['profil']->id_satuan])->result();
    	$data['container']		= $this->load->view('setting/v_set_profil', $data, true);
    	$this->load->view('admin_template', $data);
    }

	public function simpan_edit()
	{
		$id_user = $this->session->userdata('id_member');
		$password = $this->input->post('password');
		$atasan = $this->input->post('atasan');
		if($password == null){
			$this->db->update('dp_pegawai', ['nip_atasan'=>$atasan], ['id_pegawai'=>$id_user]);
		}else{
			$this->db->update('dp_pegawai', ['nip_atasan'=>$atasan], ['id_pegawai'=>$id_user]);
			$this->db->update('x_users', ['password'=> password_hash($password, PASSWORD_DEFAULT)], ['id_users'=>$id_user]);
		}
		$this->session->set_flashdata('notif', $this->Notif->global('success', 'Update Profil Berhasil!'));
       	redirect('setting/set_profil','refresh');
	}

}