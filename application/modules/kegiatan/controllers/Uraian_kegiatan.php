<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Uraian_kegiatan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_uraian_kegiatan');
		is_logged_in();
	}

	public function tp()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Uraian Tugas / Kegiatan';
    	$data['description']	= "Halaman Uraian Tugas / Kegiatan";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "masterkegiatan";
    	$data['sub_menu']		= "uraiankeg";
    	$id=$this->uri->segment(4);
    	$id_kategori_kegiatan=$this->uri->segment(5);
    	$data['uraian_kegiatan']     		= $this->M_uraian_kegiatan->get_uraian_kegiatan();
    	$data['cb_output_kerja']     		= $this->M_uraian_kegiatan->get_cb_output_kerja();
        $data['cb_pel_tgs_jabatan']            = $this->M_uraian_kegiatan->cb_pel_tgs_jabatan();
    	$data['unsurroot']     	= $this->M_uraian_kegiatan->get_unsur_root($id, $id_kategori_kegiatan);
    	if($this->uri->segment(5)!=null) {
    	$data['uraian_kegiatan_edit']     	= $this->M_uraian_kegiatan->get_uraian_kegiatan_edit($id, $id_kategori_kegiatan); }
    	$data['container']		= $this->load->view('kegiatan/v_uraian_kegiatan', $data, true);
    	$this->load->view('admin_template', $data);

	}
	public function tambah_uraian_kegiatan()
	{
        $this->form_validation->set_rules('id_kategori_kegiatan', 'id_kategori_kegiatan', 'required');
        $this->form_validation->set_rules('id_unsur', 'id_unsur', 'required');
        $this->form_validation->set_rules('id_sub_unsur', 'id_sub_unsur', 'required');
        $this->form_validation->set_rules('id_sub_sub_unsur', 'id_sub_sub_unsur', 'required');
        $this->form_validation->set_rules('id_pelaksana_tgs_jabatan', 'id_pelaksana_tgs_jabatan', 'required');
        $this->form_validation->set_rules('uraian_kegiatan', 'uraian_kegiatan', 'required');
        $this->form_validation->set_rules('id_output_kerja', 'id_output_kerja', 'required');
        $this->form_validation->set_rules('satuan_kuantitas', 'satuan_kuantitas', 'required');
        $this->form_validation->set_rules('angka_kredit', 'angka_kredit', 'required');
        $this->form_validation->set_rules('detail_uraian', 'detail_uraian', 'required');
  
        $id            = $this->input->post('id');

        // periksa data kosong yang belum diisi pada form tambah
       if ($this->form_validation->run() == TRUE)

        {
            
            $id_kategori_kegiatan            = $this->input->post('id_kategori_kegiatan');
            $id_unsur            = $this->input->post('id_unsur');
            $id_sub_unsur            = $this->input->post('id_sub_unsur');
            $id_sub_sub_unsur            = $this->input->post('id_sub_sub_unsur');
            $id_pelaksana_tgs_jabatan            = $this->input->post('id_pelaksana_tgs_jabatan');
            $uraian_kegiatan            = $this->input->post('uraian_kegiatan');
            $id_output_kerja            = $this->input->post('id_output_kerja');
            $satuan_kuantitas            = $this->input->post('satuan_kuantitas');
            $angka_kredit            = $this->input->post('angka_kredit');
            $detail_uraian            = $this->input->post('detail_uraian');

            $this->M_uraian_kegiatan->simpan_uraian_kegiatan($id_kategori_kegiatan, $id_unsur, $id_sub_unsur, $id_sub_sub_unsur, $id_pelaksana_tgs_jabatan, $uraian_kegiatan, $id_output_kerja, $satuan_kuantitas, $angka_kredit, $detail_uraian);

            $this->session->set_flashdata('notifinput', "sukses_input");

            redirect('kegiatan/uraian_kegiatan/tp/'.$id,'refresh');
        }
        
        else

        {

            $this->session->set_flashdata('notifinput', "gagal");

            redirect('kegiatan/uraian_kegiatan/tp/'.$id,'refresh');
        }
	}

	public function edit_uraian_kegiatan()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('id_kategori_kegiatan', 'id_kategori_kegiatan', 'required');
		$this->form_validation->set_rules('id_unsur', 'id_unsur', 'required');
        $this->form_validation->set_rules('id_sub_unsur', 'id_sub_unsur', 'required');
        $this->form_validation->set_rules('id_sub_sub_unsur', 'id_sub_sub_unsur', 'required');
        $this->form_validation->set_rules('id_pelaksana_tgs_jabatan', 'id_pelaksana_tgs_jabatan', 'required');
        $this->form_validation->set_rules('uraian_kegiatan', 'uraian_kegiatan', 'required');
        $this->form_validation->set_rules('id_output_kerja', 'id_output_kerja', 'required');
        $this->form_validation->set_rules('satuan_kuantitas', 'satuan_kuantitas', 'required');
        $this->form_validation->set_rules('angka_kredit', 'angka_kredit', 'required');

        $id            = $this->input->post('id');
  

        // periksa data kosong yang belum diisi pada form tambah
       if ($this->form_validation->run() == TRUE)

        {
            $id_kategori_kegiatan            = $this->input->post('id_kategori_kegiatan');
            $id_unsur            = $this->input->post('id_unsur');
            $id_sub_unsur            = $this->input->post('id_sub_unsur');
            $id_sub_sub_unsur            = $this->input->post('id_sub_sub_unsur');
            $id_pelaksana_tgs_jabatan            = $this->input->post('id_pelaksana_tgs_jabatan');
            $uraian_kegiatan            = $this->input->post('uraian_kegiatan');
            $id_output_kerja            = $this->input->post('id_output_kerja');
            $satuan_kuantitas            = $this->input->post('satuan_kuantitas');
            $angka_kredit            = $this->input->post('angka_kredit');

            $this->M_uraian_kegiatan->edit_uraian_kegiatan($id, $id_kategori_kegiatan, $id_unsur, $id_sub_unsur, $id_sub_sub_unsur, $id_pelaksana_tgs_jabatan, $uraian_kegiatan, $id_output_kerja, $satuan_kuantitas, $angka_kredit);

            $this->session->set_flashdata('notifinput', "sukses_input");

    		redirect('kegiatan/uraian_kegiatan/tp/'.$id,'refresh');
        }
        
        else

        {

            $this->session->set_flashdata('notifinput', "gagal");

            redirect('kegiatan/uraian_kegiatan/tp/'.$id,'refresh');
        }
	}

	


}