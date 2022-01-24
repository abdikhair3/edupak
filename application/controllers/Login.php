<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');

	}

	public function index()
	{
		if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
		 	$username = $_COOKIE['id'];
		 	$password = $_COOKIE['key'];
		 	$auth     = $this->M_login->auth($username);
		 	if($auth == TRUE){
		 		$rows = $this->M_login->get_by_users($username);
				if ($password == $rows->cookie) {
					$session = array(
		    			'id'		=> $rows->id_users,
		    			'username'	=> $rows->username,
		    			'level'		=> $rows->level,
		    			'id_member'		=> $rows->id_member,
						'logged_in' => TRUE
						);
		 
					$this->session->set_userdata($session); 
					redirect(base_url("dashboard"), $session);
				}else{
					setcookie('id', '', time() - 3600, '/');
		 			setcookie('key', '', time() - 3600, '/');
				}

		 	}else{
		 		setcookie('id', '', time() - 3600, '/');
		 		setcookie('key', '', time() - 3600, '/');
		 	}

		 }

		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Login ';
    	$data['description']	= "Halaman Login ";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$this->load->view('auth_template', $data);
	}

	public function auth()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == TRUE)
        {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$auth     = $this->M_login->auth($username);
			if($auth == TRUE){
				$rows = $this->M_login->get_by_users($username);
				if (password_verify($password, $rows->password)) {

					$remember_me = $this->input->post('remember_me');
					if($remember_me == 'on'){

						$key = hash('sha256', $password);
						setcookie('id', $username, time() * 60, '/');
						setcookie('key', $key, time() * 60, '/');
						$this->db->set('cookie', $key);
						$this->db->where('username', $username);
						$this->db->update('tpp_user');

					}
					$session = array(
		    			'id'		=> $rows->id_users,
		    			'username'	=> $rows->username,
		    			'level'		=> $rows->level,
		    			'id_member'		=> $rows->id_member,
						'logged_in' => TRUE
						);
		 
					$this->session->set_userdata($session); 
					redirect(base_url("dashboard"), $session);
					
				}else{
					$this->session->set_flashdata('notif', $this->Notif->Login_failed4());
					redirect(base_url("login"));
				}
			}else{
				$this->session->set_flashdata('notif', $this->Notif->Login_failed3());
				redirect(base_url("login"));
			}
			exit;
		}else{
			$this->session->set_flashdata('notif', $this->Notif->Login_failed2());
			redirect(base_url("login"));
		}
		
	}

	public function logout()
	{
		$this->session->sess_destroy();
		// $this->db->set('cookie', '');
		// $this->db->where('username', $this->session->userdata('username'));
		// $this->db->update('tpp_user');
		setcookie('id', '', time() - 3600, '/');
		setcookie('key', '', time() - 3600, '/');
        redirect(base_url('login'));
	}





}