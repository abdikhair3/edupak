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

	public function index()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Account Pegawai';
    	$data['description']	= "Halaman Account Pegawai";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "account satuan";
    	$data['sub_menu']		= "pegawai";
        $data['pegawai']        = $this->M_user_pegawai->get_user_pegawai($this->session->userdata('id_member'));
    	$data['container']		= $this->load->view('account_satuan/v_user_pegawai', $data, true);

        
    	$this->load->view('admin_template', $data);

	}

	public function form_edit()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Account';
    	$data['description']	= "Halaman Account";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "account satuan";
    	$data['sub_menu']		= "pegawai";
		$q = $this->M_user_pegawai->get_user($this->uri->segment('4'));
		if(!$q){
			$this->session->set_flashdata('notifinput', "Data Tidak Ditemukan !");
            redirect('account_satuan/akun_pegawai','refresh');
		}
        $data['user']     		= $q;
    	$data['container']		= $this->load->view('account_satuan/form_edit_akun', $data, true);
    	$this->load->view('admin_template', $data);
	}

	public function simpan_edit_akun()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$id = $this->input->post('id');
		$q = $this->M_user_pegawai->get_user($id);
		if(!$q){
			$this->session->set_flashdata('notifinput', "Data Tidak Ditemukan !");
            redirect('account_satuan/user_pegawai','refresh');
		}

		if($password){
			$data = ['username'=>$username, 'password'=>password_hash($password, PASSWORD_DEFAULT)];
			$this->db->update('x_users', $data, ['id_users'=>$id]);
		}else{
			$data = ['username'=>$username];
			$this->db->update('x_users', $data, ['id_users'=>$id]);
		}
		$this->session->set_flashdata('notifinput', $this->Notif->global('success', 'Data Berhasil di ubah'));
        redirect('account_satuan/user_pegawai','refresh');
	}

	public function print_akun()
	{
		$id = $this->session->userdata('id_member');
		$data = array(
			"dataku" => array(
				"nama" => "Data Akun",
				"url" => "e-dupak.padangpariamankab.go.id"
			),
			'user' => $this->M_user_pegawai->get_user_param($id),
			'satuan' => $this->M_user_pegawai->get_satuan($id),
		);
	
		$this->load->library('pdf');
	
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan_akun.pdf";
		$this->pdf->load_view('account_satuan/laporan_akun', $data);
	}

	
    public function generate()
    {
		$satuan = $this->session->userdata('id_member');
       if(!$satuan){
		$this->session->set_flashdata('notifinput', $this->Notif->global('danger', 'Aksi ini di cekal !'));
        redirect('account_satuan/user_pegawai','refresh');
       }
       $q = $this->M_user_pegawai->get_pegawai($satuan);
       foreach($q as $rows){
           $cek = $this->db->get_where('x_users', ['id_member'=>$rows->id_pegawai])->first_row();
           if(!$cek){
                $data = [
                    'id_member' => $rows->id_pegawai,
                    'username'  => $rows->nip,
                    'password'  => password_hash($rows->nip, PASSWORD_DEFAULT),
                    'level'     => 'Pegawai'
                ];
                $this->db->insert('x_users', $data);
           }
       }
	   $this->session->set_flashdata('notifinput', $this->Notif->global('success', 'Account berhasil di generate sistem!'));
       redirect('account_satuan/user_pegawai','refresh');
    }

}