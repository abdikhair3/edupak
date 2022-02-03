<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pejabat_penilai extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pejabat_penilai');
		is_logged_in();
	}
 
	public function tp()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Pejabat Penilai';
    	$data['description']	= "Halaman Pejabat Penilai";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "master";
    	$data['sub_menu']		= "pejabatpenilai";
    	$id=$this->uri->segment(3);
    	$data['pejabat_penilai']     		= $this->M_pejabat_penilai->get_pejabat_penilai();
    	$data['cb_pegawai']     		= $this->M_pejabat_penilai->get_cb_pegawai();
    	if($this->uri->segment(3)!=null) {
    	$data['uraian_kegiatan_edit']     	= $this->M_pejabat_penilai->get_pejabat_penilai_edit($id); }
    	$data['container']		= $this->load->view('pejabat_penilai/v_pejabat_penilai', $data, true);
    	$this->load->view('admin_template', $data);

	}

	
    public function tp_cb_pejabat_penilai() {
        $data = $this->M_pejabat_penilai->get_cb_pejabat_penilai();
        echo "<option value=''>Pilih Pejabat Penilai</option>";
        foreach ($data->result() as $d) {
            echo "<option value=$d->nip>$d->nama</option>";
        }
    }

	public function tambah_pejabat_penilai()
	{
        $this->form_validation->set_rules('nip_pegawai', 'nip_pegawai', 'required');
        $this->form_validation->set_rules('nip_penilai', 'nip_penilai', 'required');
  

        // periksa data kosong yang belum diisi pada form tambah
       if ($this->form_validation->run() == TRUE)

        {
            
            $nip_pegawai            = $this->input->post('nip_pegawai');
            $nip_penilai            = $this->input->post('nip_penilai');

            $this->M_pejabat_penilai->simpan_pejabat_penilai($nip_pegawai, $nip_penilai);

            $this->session->set_flashdata('notifinput', "sukses_input");

            redirect('pejabat_penilai/tp','refresh');
        }
        
        else

        {

            $this->session->set_flashdata('notifinput', "gagal");

            redirect('pejabat_penilai/tp','refresh');
        }
	}

	public function edit_uraian_kegiatan()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('id_unsur', 'id_unsur', 'required');
        $this->form_validation->set_rules('id_sub_unsur', 'id_sub_unsur', 'required');
        $this->form_validation->set_rules('id_sub_sub_unsur', 'id_sub_sub_unsur', 'required');
        $this->form_validation->set_rules('id_pelaksana_tgs_jabatan', 'id_pelaksana_tgs_jabatan', 'required');
        $this->form_validation->set_rules('uraian_kegiatan', 'uraian_kegiatan', 'required');
        $this->form_validation->set_rules('id_output_kerja', 'id_output_kerja', 'required');
        $this->form_validation->set_rules('angka_kredit', 'angka_kredit', 'required');
  

        // periksa data kosong yang belum diisi pada form tambah
       if ($this->form_validation->run() == TRUE)

        {
            
            $id            = $this->input->post('id');
            $id_unsur            = $this->input->post('id_unsur');
            $id_sub_unsur            = $this->input->post('id_sub_unsur');
            $id_sub_sub_unsur            = $this->input->post('id_sub_sub_unsur');
            $id_pelaksana_tgs_jabatan            = $this->input->post('id_pelaksana_tgs_jabatan');
            $uraian_kegiatan            = $this->input->post('uraian_kegiatan');
            $id_output_kerja            = $this->input->post('id_output_kerja');
            $angka_kredit            = $this->input->post('angka_kredit');

            $this->M_pejabat_penilai->edit_uraian_kegiatan($id, $id_unsur, $id_sub_unsur, $id_sub_sub_unsur, $id_pelaksana_tgs_jabatan, $uraian_kegiatan, $id_output_kerja, $angka_kredit);

            $this->session->set_flashdata('notifinput', "sukses_input");

    		redirect('pejabat_penilai/tp/'.$id,'refresh');
        }
        
        else

        {

            $this->session->set_flashdata('notifinput', "gagal");

            redirect('pejabat_penilai/tp/'.$id,'refresh');
        }
	}

	


}