<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Output_kerja extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_output_kerja');
		is_logged_in();
	}

	public function tp()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Output Kerja';
    	$data['description']	= "Halaman Output Kerja";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "masterkegiatan";
    	$data['sub_menu']		= "output_kerja";
    	$id=$this->uri->segment(3);
    	$data['output_kerja']     		= $this->M_output_kerja->get_output_kerja();
    	if($this->uri->segment(3)!=null) {
    	$data['output_kerja_edit']     	= $this->M_output_kerja->get_output_kerja_edit($id); }
    	$data['container']		= $this->load->view('output_kerja/v_output_kerja', $data, true);
    	$this->load->view('admin_template', $data);

	}

	public function tambah_output_kerja()
	{
		$this->load->view('load_temp');
		$this->form_validation->set_rules('output_kerja', 'output_kerja', 'required');
  

        // periksa data kosong yang belum diisi pada form tambah
       if ($this->form_validation->run() == TRUE)

        {
            
            $output_kerja            = $this->input->post('output_kerja');

            $this->M_output_kerja->simpan_output_kerja($output_kerja);

            $this->session->set_flashdata('notifinput', "sukses_input");

            redirect('output_kerja/tp','refresh');
        }
        
        else

        {

            $this->session->set_flashdata('notifinput', "gagal");

            redirect('output_kerja/tp','refresh');
        }
	}

	public function edit_output_kerja()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('output_kerja', 'output_kerja', 'required');
  

        // periksa data kosong yang belum diisi pada form tambah
       if ($this->form_validation->run() == TRUE)

        {
            
            $id            = $this->input->post('id');
            $output_kerja            = $this->input->post('output_kerja');

            $this->M_output_kerja->edit_output_kerja($id, $output_kerja);

            $this->session->set_flashdata('notifinput', "sukses_input");

    		redirect('output_kerja/tp','refresh');
        }
        
        else

        {

            $this->session->set_flashdata('notifinput', "gagal");

            redirect('output_kerja/tp','refresh');
        }
	}

	


}