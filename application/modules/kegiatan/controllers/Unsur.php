<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Unsur extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_unsur');
		is_logged_in();
	}

	public function tp()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Unsur Tugas';
    	$data['description']	= "Halaman Unsur Tugas";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "masterkegiatan";
    	$data['sub_menu']		= "unsurtugas";
    	$id=$this->uri->segment(4);
    	$id_unsur=$this->uri->segment(5);
    	$data['unsur']     		= $this->M_unsur->get_unsur($id);
    	$data['kategoriroot']     	= $this->M_unsur->get_kategori_root($id, $id_unsur);
    	if($this->uri->segment(5)!=null) {
    	$data['unsuredit']     	= $this->M_unsur->get_unsur_edit($id, $id_unsur); }
    	$data['container']		= $this->load->view('kegiatan/v_unsur', $data, true);
    	$this->load->view('admin_template', $data);

	}

	public function tambah_unsur()
	{
		$this->form_validation->set_rules('unsur', 'unsur', 'required');
  
		$id            = $this->input->post('id');

        // periksa data kosong yang belum diisi pada form tambah
       if ($this->form_validation->run() == TRUE)

        {
            
            $unsur            = $this->input->post('unsur');

            $this->M_unsur->simpan_unsur($id, $unsur);

            $this->session->set_flashdata('notifinput', "sukses_input");

            redirect('kegiatan/unsur/tp/'.$id,'refresh');
        }
        
        else

        {

            $this->session->set_flashdata('notifinput', "gagal");

            redirect('kegiatan/unsur/tp/'.$id,'refresh');
        }
	}

	public function edit_unsur()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('unsur', 'unsur', 'required');
  

        // periksa data kosong yang belum diisi pada form tambah
       if ($this->form_validation->run() == TRUE)

        {
            
            $id            = $this->input->post('id');
            $unsur            = $this->input->post('unsur');

            $this->M_unsur->edit_unsur($id, $unsur);

            $this->session->set_flashdata('notifinput', "sukses_input");

    		redirect('kegiatan/unsur/tp/'.$id,'refresh');
        }
        
        else

        {

            $this->session->set_flashdata('notifinput', "gagal");

            redirect('kegiatan/unsur/tp/'.$id,'refresh');
        }
	}

	


}