<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kategori');
		is_logged_in();
	}

	public function tp()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Kategori Kegiatan';
    	$data['description']	= "Halaman Kategori Kegiatan";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "masterkegiatan";
    	$data['sub_menu']		= "kategorikegiatan";
    	$id=$this->uri->segment(3);
    	$data['kategori']     		= $this->M_kategori->get_kategori();
    	if($this->uri->segment(3)!=null) {
    	$data['kategoriedit']     	= $this->M_kategori->get_kategori_edit($id); }
    	$data['container']		= $this->load->view('kegiatan/v_kategori', $data, true);
    	$this->load->view('admin_template', $data);

	}

	public function tambah_kategori()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'required');
  

        // periksa data kosong yang belum diisi pada form tambah
       if ($this->form_validation->run() == TRUE)

        {
            
            $kategori            = $this->input->post('kategori');

            $this->M_kategori->simpan_kategori($kategori);

            $this->session->set_flashdata('notifinput', "sukses_input");

            redirect('kegiatan/tp','refresh');
        }
        
        else

        {

            $this->session->set_flashdata('notifinput', "gagal");

            redirect('kegiatan/tp','refresh');
        }
	}

	public function edit_kategori()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('kategori', 'kategori', 'required');
  

        // periksa data kosong yang belum diisi pada form tambah
       if ($this->form_validation->run() == TRUE)

        {
            
            $id            = $this->input->post('id');
            $kategori            = $this->input->post('kategori');

            $this->M_kategori->edit_kategori($id, $kategori);

            $this->session->set_flashdata('notifinput', "sukses_input");

    		redirect('kegiatan/tp','refresh');
        }
        
        else

        {

            $this->session->set_flashdata('notifinput', "gagal");

            redirect('kegiatan/tp','refresh');
        }
	}

	


}