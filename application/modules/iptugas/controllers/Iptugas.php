<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Iptugas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_iptugas');
		is_logged_in();
	}

	public function index()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Input Kegiatan / Tugas';
    	$data['description']	= "Halaman Input Kegiatan / Tugas";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= $this->load->view('iptugas/extra_js');
    	$data['menu_active']	= "iptugas";
    	$data['sub_menu']		= "iptugas";
    	$id=$this->uri->segment(3);
    	$data['tp_ip_tugas']     		= $this->M_iptugas->get_ip_tugas();
    	$data['cb_unsur']     		= $this->M_iptugas->get_cb_unsur();
        if($this->uri->segment(3)!=null) {
    	$data['uraian_kegiatan_edit']     	= $this->M_iptugas->get_uraian_kegiatan_edit($id); }
    	$data['container']		= $this->load->view('iptugas/v_iptugas', $data, true);
    	$this->load->view('admin_template', $data);

	}

    public function simpan_laporan()
    {
        $tanggal = $this->input->post('tanggal');

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('id_unsur', 'Unsur', 'required');
        $this->form_validation->set_rules('id_uraian_kegiatan', 'Uraian', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('notifikasi', notif("error", "Ada Kesalahan pada penginputan"));
            $this->index();
        }
        else
        {
            
        }
    }

    public function tes()
    {
        $this->session->set_flashdata('notifikasi', notif("danger", "Ada Kesalahan pada penginputan"));
        $this->session->set_flashdata('notifikasi_line', notif_line("success", "Ada Kesalahan pada penginputan"));
        redirect('iptugas','refresh');
    }
    
    public function tp_cb_uraian_tugas() {
        $data = $this->M_iptugas->get_cb_uraian_tugas();
        echo "<option value=''>Pilih Uraian Kegiatan</option>";
        foreach ($data->result() as $d) {
            echo "<option value=$d->id_uraian_kegiatan>$d->uraian_kegiatan ($d->pelaksana_tgs_jabatan)</option>";
        }
    }


	public function tambah_iptugas()
	{
        $this->form_validation->set_rules('id_uraian_kegiatan', 'id_uraian_kegiatan', 'required');
        $this->form_validation->set_rules('tgl_input', 'tgl_input', 'required');
  

        // periksa data kosong yang belum diisi pada form tambah
       if ($this->form_validation->run() == TRUE)

        {
            
            $id_uraian_kegiatan            = $this->input->post('id_uraian_kegiatan');
            $nip                           = $this->input->post('nip');
            $nip_pemeriksa            = $this->input->post('nip_pemeriksa');
            $tgl_input            = $this->input->post('tgl_input');

            $bln_now=date('m');
            $bln_now_con=(int)$bln_now;
            $bln_input=explode("-", $tgl_input);
            $bln_input_con=(int)$bln_input[1];
              if($bln_input_con<=6) { $batas_ml=1; $batas_sl=6; $semester=1; } else { $batas_ml=7; $batas_sl=12; $semester=2;}
                    if($bln_now_con >= $batas_ml && $bln_now_con <= $batas_sl) {
                        $random        = time().'_'.rand();

                        $config['upload_path'] = './assets/bukti/'; //path folder

                        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan

                        $config['encrypt_name'] = FALSE; //nama yang terupload nantinya

                        $config['file_size'] = TRUE; 

                        $config['file_name'] = $random;

                        $this->load->library('upload',$config);
                        
                            if(!empty($_FILES['bukti']['name'])){

                                    if (!$this->upload->do_upload('bukti')) {
                                        
                                        $this->session->set_flashdata('notiformas', "gagal_upload");

                                        redirect('penelitian/penelitian','refresh');

                                    }else{

                                        $this->M_iptugas->simpan_ip_tugas($id_uraian_kegiatan, $nip, $nip_pemeriksa, $tgl_input,$semester, $this->upload->data('file_name'));

                                        $this->session->set_flashdata('notifinput', "sukses_input");

                                        redirect('iptugas/tp','refresh');
                                    }   
                            
                        } else {

                              $this->session->set_flashdata('notifinput', "gagal_upload");

                                      redirect('iptugas/tp','refresh');
                        }
                    } else {
                         $this->session->set_flashdata('notifinput', "tanggal_salah");

                                      redirect('iptugas/tp','refresh');
                    }

        }
        
        else

        {

            $this->session->set_flashdata('notifinput', "gagal");

            redirect('iptugas/tp','refresh');
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

            $this->M_iptugas->edit_uraian_kegiatan($id, $uraian_kegiatan);

            $this->session->set_flashdata('notifinput', "sukses_input");

    		redirect('uraian_kegiatan/tp/'.$id,'refresh');
        }
        
        else

        {

            $this->session->set_flashdata('notifinput', "gagal");

            redirect('uraian_kegiatan/tp/'.$id,'refresh');
        }
	}

	public function get_skp_bulanan()
    {
        $tggl = $_POST['tggl'];
        $pecah = explode('-', $tggl);
        $t = $pecah[0].'-'.$pecah[1];
        $this->db->join('dp_uraian_kegiatan','dp_uraian_kegiatan.id_uraian_kegiatan=dp_skp_tahunan.id_uraian_kegiatan','right');
        $this->db->group_by('dp_uraian_kegiatan.id_uraian_kegiatan');
        $this->db->where("DATE_FORMAT(tgl_input,'%Y-%m')", $t);
        $get_keg = $this->db->get('dp_skp_tahunan')->result();
        foreach($get_keg as $rows){
            echo "<option value=".$rows->id_uraian_kegiatan.">".$rows->uraian_kegiatan."</option>";
        }
        
    }


}