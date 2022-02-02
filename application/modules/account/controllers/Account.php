<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
        $this->load->model('M_account');
	}

	public function superadmin()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Account Superadmin';
    	$data['description']	= "Halaman Account Superadmin";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "account";
    	$data['sub_menu']		= "superadmin";
        $data['superadmin']     = $this->db->get_where('x_users', ['level'=>'Superadmin'])->result();
    	$data['container']		= $this->load->view('account/v_superadmin', $data, true);
    	$this->load->view('admin_template', $data);
	}

    public function admin()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Account Admin';
    	$data['description']	= "Halaman Account Admin";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "account";
    	$data['sub_menu']		= "admin";
        $data['admin']          = $this->db->get_where('x_users', ['level'=>'Admin_opd'])->result();
    	$data['container']		= $this->load->view('account/v_admin', $data, true);
    	$this->load->view('admin_template', $data);

	}

    public function akun_pegawai()
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
    	$data['menu_active']	= "account";
    	$data['sub_menu']		= "user_pegawai";
        $data['satuan']		    = $this->db->get('dp_satuan')->result();
        $data['pegawai']        = $this->M_account->get_user_pegawai($this->input->get('satuan'));
    	$data['container']		= $this->load->view('account/v_user_pegawai', $data, true);

        if($this->input->get('subject')=="generate"){
            $this->generate($this->input->get('satuan'));
            $this->session->set_flashdata('notifinput', "Aksi Ini Dilarang !");
            redirect('account/akun_pegawai?satuan='.$this->input->get('satuan').'&subject=tampildata','refresh');
        }
		else if($this->input->get('subject')=="print_akun"){
            $this->print_akun($this->input->get('satuan'));
        }
        
    	$this->load->view('admin_template', $data);

	}

    public function generate($satuan)
    {
       if(!$satuan){
            $this->session->set_flashdata('notifinput', "Aksi Ini Dilarang !");
            redirect('account/akun_pegawai','refresh');
       }
       $q = $this->M_account->get_pegawai($satuan);
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
    }

	public function form_edit()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Account Superadmin';
    	$data['description']	= "Halaman Account Superadmin";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "account";
    	$data['sub_menu']		= "superadmin";
		$q = $this->M_account->get_user($this->uri->segment('3'));
		if(!$q){
			$this->session->set_flashdata('notifinput', "Data Tidak Ditemukan !");
            redirect('account/akun_pegawai','refresh');
		}
        $data['user']     		= $q;
    	$data['container']		= $this->load->view('account/v_edit_akun', $data, true);
    	$this->load->view('admin_template', $data);
	}

	public function simpan_edit_akun()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$id = $this->input->post('id');
		$q = $this->M_account->get_user($id);
		if(!$q){
			$this->session->set_flashdata('notifinput', "Data Tidak Ditemukan !");
            redirect('account/akun_pegawai','refresh');
		}

		if($password){
			$data = ['username'=>$username, 'password'=>password_hash($password, PASSWORD_DEFAULT)];
			$this->db->update('x_users', $data, ['id_users'=>$id]);
		}else{
			$data = ['username'=>$username];
			$this->db->update('x_users', $data, ['id_users'=>$id]);
		}
		$this->session->set_flashdata('notifinput', "Data Tidak Ditemukan !");
        redirect('account/akun_pegawai','refresh');
	}

	public function print_akun($id)
	{
		if(!$id){
			$this->session->set_flashdata('notifinput', "Pilih Satuan Sebelum Melakukan Cetak !");
        	redirect('account/akun_pegawai','refresh');
		}
		$data = array(
			"dataku" => array(
				"nama" => "Data Akun",
				"url" => "e-dupak.padangpariamankab.go.id"
			),
			'user' => $this->M_account->get_user_param($id),
			'satuan' => $this->M_account->get_satuan($id),
		);
	
		$this->load->library('pdf');
	
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan_akun.pdf";
		$this->pdf->load_view('account/laporan_akun', $data);
	}

}