<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ipskp extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_ipskp_tahunan');
		is_logged_in();
	}

	public function tp()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Input SKP Tahunan';
    	$data['description']	= "Halaman Input SKP Tahunan";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "ipskp";
    	$data['sub_menu']		= "ipskp_tahunan";
    	$id=$this->uri->segment(3);
    	$data['tp_ip_tugas']     		= $this->M_ipskp_tahunan->get_ip_tugas();
    	$data['cb_unsur']     		= $this->M_ipskp_tahunan->get_cb_unsur();
        if($this->uri->segment(3)!=null) {
    	$data['uraian_kegiatan_edit']     	= $this->M_ipskp_tahunan->get_uraian_kegiatan_edit($id); }
    	$data['container']		= $this->load->view('ipskp/v_ipskp_tahunan', $data, true);
    	$this->load->view('admin_template', $data);

	}
    
    public function tp_cb_uraian_tugas() {
        $data = $this->M_ipskp_tahunan->get_cb_uraian_tugas();
        echo "<option value=''>Pilih Uraian Kegiatan</option>";
        foreach ($data->result() as $d) {
            echo "<option value=$d->id_uraian_kegiatan>$d->uraian_kegiatan </option>";
        }
    }
    
    public function tp_detail() {
        $data = $this->M_ipskp_tahunan->get_tp_detail();
        foreach ($data->result() as $d) {
            // echo "<option value=$d->satuan_kuantitas>$d->satuan_kuantitas </option>";
            echo "<input type=\"text\" class=\"form-control\" placeholder=\"Satuan\" readonly value='".$d->satuan_kuantitas."'>";
            
        }
    }
    
    public function tp_detail_angka() {
        $data = $this->M_ipskp_tahunan->get_tp_detail();
        foreach ($data->result() as $d) {
            // echo "<option value=$d->angka_kredit>$d->angka_kredit </option>";
            echo "<input type=\"text\" class=\"form-control\" placeholder=\"Satuan\" readonly value='".$d->angka_kredit."' id=\"angkakredittp\">";
            
        }
    }

	// public function tp_cb_sub_sub_unsur(){
 //        $id_sub_unsur=$this->input->post('id_sub_unsur');
 //        $data=$this->M_ipskp_tahunan->get_cb_sub_sub_unsur($id_sub_unsur);
 //        echo json_encode($data);
 //    }

	public function tambah_ipskp()
	{
        $id_pegawai = detail_pegawai()->id_pegawai;
        $this->form_validation->set_rules('id_uraian_kegiatan', 'id_uraian_kegiatan', 'required');
        $this->form_validation->set_rules('totalangkakredit', 'totalangkakredit', 'required');
        $this->form_validation->set_rules('kuantitas', 'kuantitas', 'required');
    
        $thn_cek=date('Y');
        $this->db->where('id_uraian_kegiatan', $this->input->post('id_uraian_kegiatan'));
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->where('YEAR(tgl_input)', $thn_cek);
        $cek_kegiatan = $this->db->get('dp_skp_tahunan')->num_rows();
        if($cek_kegiatan>=1) {
            $this->session->set_flashdata('notifinput', "gagal");

                    redirect('ipskp/tp','refresh');
        } else {
                // periksa data kosong yang belum diisi pada form tambah
            if ($this->form_validation->run() == TRUE)

                {

                    $id_uraian_kegiatan            = $this->input->post('id_uraian_kegiatan');
                    $nip                           = $this->input->post('nip');
                    $tgl_input            = $this->input->post('tgl_input');
                    $totalangkakredit            = $this->input->post('totalangkakredit');
                    $kuantitas            = $this->input->post('kuantitas');

                                $this->M_ipskp_tahunan->simpan_ip_tugas($id_uraian_kegiatan, $nip, $tgl_input, $totalangkakredit, $kuantitas);

                                $this->session->set_flashdata('notifinput', "sukses_input");

                                redirect('ipskp/tp','refresh');

                }
                
                else

                {

                    $this->session->set_flashdata('notifinput', "gagal");

                    redirect('ipskp/tp','refresh');
                }
            }
	}

	public function edit_uraian_kegiatan()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('uraian_kegiatan', 'uraian_kegiatan', 'required');
  

        // periksa data kosong yang belum diisi pada form tambah
       if ($this->form_validation->run() == TRUE)

        {
            
            $id            = $this->input->post('id');
            $uraian_kegiatan            = $this->input->post('uraian_kegiatan');

            $this->M_ipskp_tahunan->edit_uraian_kegiatan($id, $uraian_kegiatan);

            $this->session->set_flashdata('notifinput', "sukses_input");

    		redirect('uraian_kegiatan/tp/'.$id,'refresh');
        }
        
        else

        {

            $this->session->set_flashdata('notifinput', "gagal");

            redirect('uraian_kegiatan/tp/'.$id,'refresh');
        }
	}

	


}