<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelaksana_tgs_jabatan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pelaksana_tgs_jabatan');
		is_logged_in();
	}

	public function tp()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Jenjang Pelaksana Tugas Jabatan';
    	$data['description']	= "Halaman Jenjang Pelaksana Tugas Jabatan";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "masterkegiatan";
    	$data['sub_menu']		= "pelaksana_tgs_jabatan";
    	$id=$this->uri->segment(3);
    	$data['pelaksana_tgs_jabatan']     		= $this->M_pelaksana_tgs_jabatan->get_pelaksana_tgs_jabatan();
    	if($this->uri->segment(3)!=null) {
    	$data['pelaksana_tgs_jabatan_edit']     	= $this->M_pelaksana_tgs_jabatan->get_pelaksana_tgs_jabatan_edit($id); }
    	$data['container']		= $this->load->view('pelaksana_tgs_jabatan/v_pelaksana_tgs_jabatan', $data, true);
    	$this->load->view('admin_template', $data);

	}

	public function tambah_pelaksana_tgs_jabatan()
	{
		$this->form_validation->set_rules('pelaksana_tgs_jabatan', 'pelaksana_tgs_jabatan', 'required');
  

        // periksa data kosong yang belum diisi pada form tambah
       if ($this->form_validation->run() == TRUE)

        {
            
            $pelaksana_tgs_jabatan            = $this->input->post('pelaksana_tgs_jabatan');

            $this->M_pelaksana_tgs_jabatan->simpan_pelaksana_tgs_jabatan($pelaksana_tgs_jabatan);

            $this->session->set_flashdata('notifinput', "sukses_input");

            redirect('pelaksana_tgs_jabatan/tp','refresh');
        }
        
        else

        {

            $this->session->set_flashdata('notifinput', "gagal");

            redirect('pelaksana_tgs_jabatan/tp','refresh');
        }
	}

	public function edit_pelaksana_tgs_jabatan()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('pelaksana_tgs_jabatan', 'pelaksana_tgs_jabatan', 'required');
  

        // periksa data kosong yang belum diisi pada form tambah
       if ($this->form_validation->run() == TRUE)

        {
            
            $id            = $this->input->post('id');
            $pelaksana_tgs_jabatan            = $this->input->post('pelaksana_tgs_jabatan');

            $this->M_pelaksana_tgs_jabatan->edit_pelaksana_tgs_jabatan($id, $pelaksana_tgs_jabatan);

            $this->session->set_flashdata('notifinput', "sukses_input");

    		redirect('pelaksana_tgs_jabatan/tp/'.$id,'refresh');
        }
        
        else

        {

            $this->session->set_flashdata('notifinput', "gagal");

            redirect('pelaksana_tgs_jabatan/tp/'.$id,'refresh');
        }
	}

	


}