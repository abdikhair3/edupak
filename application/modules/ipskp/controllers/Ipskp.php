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
    	$data['tp_periode']     		= $this->M_ipskp_tahunan->get_tp_periode();
    	$data['container']		= $this->load->view('ipskp/v_ipskp_tahunan', $data, true);
    	$this->load->view('admin_template', $data);

	}

	public function ipskp_tahunan()
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
    	$data['tp_ip_target_Tahunan']     		= $this->M_ipskp_tahunan->get_tp_ip_target_Tahunan($id);
    	$data['cb_unsur']     		= $this->M_ipskp_tahunan->get_cb_unsur();
    	$data['container']		= $this->load->view('ipskp/v_ipskp_tahunan_dt', $data, true);
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

	public function tambah_ipskp_periode()
	{
        $nip = detail_pegawai()->nip;
        $this->form_validation->set_rules('dt_ml', 'dt_ml', 'required');
        $this->form_validation->set_rules('dt_ak', 'dt_ak', 'required');
    
        $dt_pisah            = explode("-",$this->input->post('dt_ml'));
        $this->db->where('nip', $nip);
        $this->db->where('YEAR(dt_ml)', $dt_pisah[0]);
        $cek_kegiatan = $this->db->get('dp_skp_tahunan_ft')->num_rows();
        if($cek_kegiatan>=1) {
            $this->session->set_flashdata('notifikasi', notif("error", "Periode ini sudah pernah diinputkan"));

                    redirect('ipskp/tp','refresh');
        } else {
                // periksa data kosong yang belum diisi pada form tambah
            if ($this->form_validation->run() == TRUE)

                {
                    $dt_ml            = $this->input->post('dt_ml');
                    $dt_ak            = $this->input->post('dt_ak');

                                $this->M_ipskp_tahunan->simpan_periode($dt_ml, $dt_ak);

                                $this->session->set_flashdata('notifikasi', notif("success", "Berhasil Menambah Target Tahunan"));

                                redirect('ipskp/tp','refresh');

                }
                
                else

                {

                    $this->session->set_flashdata('notifikasi', notif("error", "Gagal Menambah Target Tahunan"));

                    redirect('ipskp/tp','refresh');
                }
            }
	}

	public function tambah_ipskp()
	{
        $nip = detail_pegawai()->nip;
        $this->form_validation->set_rules('id_uraian_kegiatan', 'id_uraian_kegiatan', 'required');
        $this->form_validation->set_rules('totalangkakredit', 'totalangkakredit', 'required');
        $this->form_validation->set_rules('kuantitas', 'kuantitas', 'required');
        $this->form_validation->set_rules('id_skp_tahunan_ft', 'id_skp_tahunan_ft', 'required');
    
        // $thn_cek=explode("-", $this->input->post('thn_input'));
        $this->db->where('id_uraian_kegiatan', $this->input->post('id_uraian_kegiatan'));
        $this->db->where('nip', $nip);
        $this->db->where('id_skp_tahunan_ft', $this->input->post('id_skp_tahunan_ft'));
        $cek_kegiatan = $this->db->get('dp_skp_tahunan')->num_rows();
        if($cek_kegiatan>=1) {
            $this->session->set_flashdata('notifikasi', notif("error", "Kegiatan ini sudah pernah diinputkan"));

                    redirect('ipskp/ipskp_tahunan/'.$this->input->post('id_skp_tahunan_ft'),'refresh');
        } else {
                // periksa data kosong yang belum diisi pada form tambah
            if ($this->form_validation->run() == TRUE)

                {

                    $id_uraian_kegiatan            = $this->input->post('id_uraian_kegiatan');
                    $totalangkakredit            = $this->input->post('totalangkakredit');
                    $kuantitas            = $this->input->post('kuantitas');
                    $id_skp_tahunan_ft            = $this->input->post('id_skp_tahunan_ft');

                                $this->M_ipskp_tahunan->simpan_ip_tugas($id_uraian_kegiatan, $totalangkakredit, $kuantitas, $id_skp_tahunan_ft);

                                $this->session->set_flashdata('notifikasi', notif("success", "Berhasil Menambah Target Tahunan"));

                                redirect('ipskp/ipskp_tahunan/'.$this->input->post('id_skp_tahunan_ft'),'refresh');

                }
                
                else

                {

                    $this->session->set_flashdata('notifikasi', notif("error", "Gagal Menambah Target Tahunan"));

                    redirect('ipskp/ipskp_tahunan/'.$this->input->post('id_skp_tahunan_ft'),'refresh');
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