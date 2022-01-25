<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_sub_unsur extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_sub_sub_unsur');
		is_logged_in();
	}

	public function tp()
	{
		$breadcrumbs 		= $this->breadcrumbs;
		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();
    	$data['title']			= 'Halaman Butir Tugas / Kegiatan';
    	$data['description']	= "Halaman Butir Tugas / Kegiatan";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "masterkegiatan";
    	$data['sub_menu']		= "unsurtugas";
    	$id=$this->uri->segment(4);
    	$id_sub=$this->uri->segment(5);
    	$id_sub_sub=$this->uri->segment(6);
    	$data['unsur']     		= $this->M_sub_sub_unsur->get_unsur($id, $id_sub);
    	$data['unsurroot']     	= $this->M_sub_sub_unsur->get_unsur_root($id, $id_sub);
    	if($this->uri->segment(6)!=null) {
    	$data['unsuredit']     	= $this->M_sub_sub_unsur->get_unsur_edit($id, $id_sub, $id_sub_sub); }
    	$data['container']		= $this->load->view('unsur/v_sub_sub_unsur', $data, true);
    	$this->load->view('admin_template', $data);
	}

	public function tambah_unsur()
	{
		$this->form_validation->set_rules('sub_sub_unsur', 'sub_sub_unsur', 'required');
  
        $id            = $this->input->post('id');
  
        $id_sub        = $this->input->post('id_sub');

        // periksa data kosong yang belum diisi pada form tambah
       if ($this->form_validation->run() == TRUE)

        {
            
            $sub_sub_unsur            = $this->input->post('sub_sub_unsur');

            $this->M_sub_sub_unsur->simpan_unsur($id_sub, $sub_sub_unsur);

            $this->session->set_flashdata('notifinput', "sukses_input");

            redirect('unsur/sub_sub_unsur/tp/'.$id.'/'.$id_sub,'refresh');
        }
        
        else

        {

            $this->session->set_flashdata('notifinput', "gagal");

            redirect('unsur/sub_sub_unsur/tp/'.$id.'/'.$id_sub,'refresh');
        }
	}


	public function edit_unsur()
	{
		$this->form_validation->set_rules('id_sub_sub', 'id_sub_sub', 'required');
		$this->form_validation->set_rules('sub_sub_unsur', 'sub_sub_unsur', 'required');
  

        // periksa data kosong yang belum diisi pada form tambah
       if ($this->form_validation->run() == TRUE)

        {
            
            $id            	= $this->input->post('id');
            $id_sub         	= $this->input->post('id_sub');
            $id_sub_sub         = $this->input->post('id_sub_sub');
            $sub_sub_unsur          = $this->input->post('sub_sub_unsur');

            $this->M_sub_sub_unsur->edit_unsur($id_sub, $id_sub_sub, $sub_sub_unsur);

            $this->session->set_flashdata('notifinput', "sukses_edit");

    		redirect('unsur/sub_sub_unsur/tp/'.$id.'/'.$id_sub,'refresh');
        }
        
        else

        {

            $this->session->set_flashdata('notifinput', "gagal");

            redirect('unsur/sub_sub_unsur/tp/'.$id.'/'.$id_sub,'refresh');
        }
	}

}