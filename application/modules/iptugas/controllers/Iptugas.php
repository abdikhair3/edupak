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
    	$data['sub_menu']		= "laporan harian";
    	$id=$this->uri->segment(3);
    	$data['tp_ip_tugas']     = $this->M_iptugas->get_ip_tugas();
    	$data['container']		= $this->load->view('iptugas/v_iptugas', $data, true);
    	$this->load->view('admin_template', $data);

	}

    public function simpan_laporan()
    {
        if(detail_pegawai()->nip_atasan == NULL){
            $this->session->set_flashdata('notifikasi_line', notif_line("danger", "Atasan Langasung Belum dipilih, Harap pilih atasan langsung anda terlebih dahulu ..!"));
            redirect('iptugas','refresh');
        }

        $cek_tggl = $this->db->get_where('dp_tugas',['tgl_input'=>$this->input->post('tanggal'), 'nip'=>detail_pegawai()->nip])->first_row();
        if($cek_tggl){
            $this->session->set_flashdata('notifikasi_line', notif_line("danger", "Tanggal yang sama sudah di inputkan !"));
            redirect('iptugas','refresh');
            die();
        }
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('id_uraian_kegiatan', 'Uraian', 'required');
        $this->form_validation->set_rules('kuantitas', 'kuantitas', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('notifikasi', notif("error", "Ada Kesalahan pada penginputan"));
            $this->index();
        }
        else
        {
            $tanggal = $this->input->post('tanggal');
            $id_uraian_kegiatan = $this->input->post('id_uraian_kegiatan');
            $cek_sah_kegiatan = $this->db->get_where('dp_skp_tahunan',['id_pegawai'=>$this->session->userdata('id_member'),'id_uraian_kegiatan'=>$id_uraian_kegiatan])->num_rows();
            if($cek_sah_kegiatan > 0){
                 $id_uraian_kegiatan  = $this->input->post('id_uraian_kegiatan');
                 $kuantitas           = $this->input->post('kuantitas');
                 $nip                 = detail_pegawai()->nip;
                 $nip_atasan          = detail_pegawai()->nip_atasan;
                 $tanggal             = $this->input->post('tanggal');

                $config['upload_path'] = './assets/bukti/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size']      = 300;
                $config['encrypt_name'] = TRUE;
                $config['file_size'] = TRUE; 
                $this->load->library('upload',$config);
                

                if(!empty($_FILES['bukti']['name'])){
                    if (!$this->upload->do_upload('bukti')) { 
                        $this->session->set_flashdata('notifikasi', notif("error", "Ada Kesalahan pada File Bukti, pastikan file yang diupload sesuai dengan ketentuan !"));
                        redirect('iptugas','refresh');
                    }else{

                        $this->M_iptugas->simpan_ip_tugas($id_uraian_kegiatan, $nip, $nip_atasan, $tanggal, $this->upload->data('file_name'), $kuantitas);
                        $this->session->set_flashdata('notifikasi', notif("success", "Berhasil menambahkan kegiatan harian"));
                        redirect('iptugas','refresh');
                    }              
                } else {
                    $this->M_iptugas->simpan_ip_tugas($id_uraian_kegiatan, $nip, $nip_atasan, $tanggal,'', $kuantitas);
                    $this->session->set_flashdata('notifikasi', notif("success", "Berhasil menambahkan kegiatan harian"));
                    redirect('iptugas','refresh');
                }
            }else{
                $this->session->set_flashdata('notifikasi', notif("error", "Ada Kesalahan pada penginputan"));
                $this->index();
            }
        }
    }

    public function hapus_tugas()
    {
        $id = $this->uri->segment(3);
        $cek = $this->db->get_where('dp_tugas',['id_tugas'=>$id])->first_row();
        if($cek){
            $this->db->delete('dp_tugas',['id_tugas'=>$id]);
            $this->session->set_flashdata('notifikasi', notif("success", "Data Berhasil Dihapus"));
            redirect('iptugas','refresh');
        }else{
            $this->session->set_flashdata('notifikasi', notif("error", "Data Tidak Ditemukan"));
            redirect('iptugas','refresh');
        }
    }
	public function get_skp_bulanan()
    {
        $tggl = $_POST['tggl'];
        $pecah = explode('-', $tggl);
        $t = $pecah[0];
        $this->db->join('dp_uraian_kegiatan','dp_uraian_kegiatan.id_uraian_kegiatan=dp_skp_tahunan.id_uraian_kegiatan','right');
        $this->db->group_by('dp_uraian_kegiatan.id_uraian_kegiatan');
        $this->db->where("DATE_FORMAT(tgl_input,'%Y')", $t);
        $this->db->where('id_pegawai', $this->session->userdata('id_member'));
        $this->db->where('status_periksa', 'Diverifikasi Atasan');
        $get_keg = $this->db->get('dp_skp_tahunan')->result();
            echo "<option value=''>-----------Pilih Uraian Kegiatan----------------</option>";
        foreach($get_keg as $rows){
            echo "<option value=".$rows->id_uraian_kegiatan.">".$rows->uraian_kegiatan."</option>";
        }
        
    }

    public function get_satuan()
    {
        $kegiatan = $_POST['kegiatan'];
        $this->db->join('dp_kuantitas','dp_kuantitas.id_dp_kuantitas=dp_uraian_kegiatan.id_dp_kuantitas','left');
        $this->db->join('dp_output_kerja','dp_output_kerja.id_output_kerja=dp_uraian_kegiatan.id_output_kerja','left');
        $satuan = $this->db->get_where('dp_uraian_kegiatan', ['id_uraian_kegiatan'=>$kegiatan])->first_row();
        $data['kuantitas'] = $satuan->satuan_kuantitas;
        $data['output'] = $satuan->output_kerja;
        echo json_encode($data);
    }


}