<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function api_in()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= 'Halaman Api In';
    	$data['description']	= "Halaman Api In";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "api";
    	$data['sub_menu']		= "api_in";
        $data['api_data']       = $this->db->get('dp_api')->result();
    	$data['container']		= $this->load->view('api/v_api_in', $data, true);
    	$this->load->view('admin_template', $data);

	}
	
    public function form_edit()
	{
		$breadcrumbs 		= $this->breadcrumbs;

		$breadcrumbs->add('Home', base_url().'home');
		$breadcrumbs->add('Dashboard', base_url().'home');
		$breadcrumbs->render();

    	$data['title']			= "Halaman Edit Api";
    	$data['description']	= "Halaman Edit Api";
    	$data['breadcrumbs']	= $breadcrumbs->render();
    	$data['extra_css']		= "";
    	$data['extra_js']		= "";
    	$data['menu_active']	= "master";
    	$data['sub_menu']		= "uraiankeg";
        
        $data['api_data']       = $this->db->get_where('dp_api', ['id'=>$this->uri->segment(3)])->first_row();
        if(!$data['api_data']){
            $this->session->set_flashdata('notifinput', "Aksi Ini Dilarang !");
            redirect('api/api_in','refresh');
        }
    	$data['container']		= $this->load->view('api/v_form_api_in', $data, true);
    	$this->load->view('admin_template', $data);

	}
 
    public function simpan_api()
    {
        $id = $this->input->post('id');
        $url = $this->input->post('url');
        $data = ['url'=>$url];
        $this->db->update('dp_api', $data, ['id'=>$id]);
        $this->session->set_flashdata('notifinput', "Data Berhasil Diperbaharui !");
        redirect('api/api_in','refresh');
    }

    public function sync()
    {
        $id = $this->uri->segment(3);
        $get = $this->db->get_where('dp_api', ['id'=>$id])->first_row();
        if(!$get){
            $this->session->set_flashdata('notifinput', "Terjadi Kesalahan pada sistem !");
            redirect('api/api_in','refresh');
        }
        $data = file_get_contents($get->url);
    	$json = json_decode($data, TRUE);
		$tanggal = date('Y-m-d H:i:s');

        if($get->id == 1){
            $this->db->empty_table('dp_satuan');
            foreach ($json['result'] as $rows) {
                $id = $rows['id'];
                $satuan = $rows['satuan'];
                $key = $rows['key'];
                $data = [
                    'id_satuan' => $id,
                    'key' => $key,
                    'nm_satuan' => $satuan,
                    'create_by' => 1,
                    'create_date' => $tanggal,
                ];
                $this->db->insert('dp_satuan', $data);
            }
            $this->db->update('dp_api', ['last_sync'=>$tanggal], ['id'=>1]);
        }else if($get->id == 2){
            $this->db->empty_table('dp_unit');
            foreach ($json['result'] as $rows) {
                $id = $rows['id'];
                $key_unit = $rows['key'];
                $nm_unit = $rows['unit'];
                $satuan_key = $rows['satuan'];
                $data = [
                    'id_unit' => $id,
                    'key_unit' => $key_unit,
                    'nm_unit' => $nm_unit,
                    'satuan' => $satuan_key,
                    'create_by' => 1,
                    'create_date' => $tanggal,
                ];
                $this->db->insert('dp_unit', $data);
            }
            $this->db->update('dp_api', ['last_sync'=>$tanggal], ['id'=>2]);
        }else if($get->id == 3){
            $this->db->empty_table('dp_jenis_jabatan');
            foreach ($json['result'] as $rows) {
                $id = $rows['id'];
                $jenis_jabatan = $rows['jenis_jabatan'];
                $data = [
                    'id_jenis_jabatan' => $id,
                    'jenis' => $jenis_jabatan,
                    'create_by' => 1,
                    'create_date' => $tanggal,
                ];
                $this->db->insert('dp_jenis_jabatan', $data);
            }
            $this->db->update('dp_api', ['last_sync'=>$tanggal], ['id'=>3]);
        }else if($get->id == 4){
            $this->db->empty_table('dp_jabatan');
            foreach ($json['result'] as $rows) {
                $id = $rows['id'];
                $jabatan = $rows['jabatan'];
                $keterangan = $rows['keterangan'];
                $jenis = $rows['jenis'];
                $data = [
                    'id_jabatan' => $id,
                    'id_jenis_jabatan' => $jenis,
                    'jabatan' => $jabatan,
                    'keterangan' => $keterangan,
                    'create_by' => 1,
                    'create_date' => $tanggal,
                ];
                $this->db->insert('dp_jabatan', $data);
            }
            $this->db->update('dp_api', ['last_sync'=>$tanggal], ['id'=>4]);
        }else if($get->id == 5){
            $this->db->empty_table('dp_pangkat');
            foreach ($json['result'] as $rows) {
                $id = $rows['id'];
                $pangkat = $rows['pangkat'];
                $keterangan = $rows['keterangan'];
                $data = [
                    'id_pangkat' => $id,
                    'pangkat' => $pangkat,
                    'keterangan' => $keterangan,
                    'create_by' => 1,
                    'create_date' => $tanggal,
                ];
                $this->db->insert('dp_pangkat', $data);
            }
            $this->db->update('dp_api', ['last_sync'=>$tanggal], ['id'=>5]);
        }else if($get->id == 6){
            $this->db->empty_table('dp_pegawai');
            foreach ($json['result'] as $rows) {
                $id = $rows['id'];
                $nama = $rows['nama'];
                $nip = $rows['nip'];
                $gelar_depan = $rows['gelar_depan'];
                $gelar_belakang = $rows['nip'];
                $id_satuan = $rows['id_satuan'];
                $id_unit = $rows['key_unit'];
                $id_pangkat = $rows['id_pangkat'];
                $id_jabatan = $rows['id_jabatan'];
                $data = [
                    'nama' => $nama,
                    'nip' => $nip,
                    'gelar_depan' => $gelar_depan,
                    'gelar_belakang' => $gelar_belakang,
                    'id_satuan' => $id_satuan,
                    'id_unit' => $id_unit,
                    'id_pangkat' => $id_pangkat,
                    'id_jabatan' => $id_jabatan,
                    'create_by' => 1,
                    'create_date' => $tanggal,
                ];
                $this->db->insert('dp_pegawai', $data);
            }
            $this->db->update('dp_api', ['last_sync'=>$tanggal], ['id'=>6]);
        }

        $this->session->set_flashdata('notifinput', "Data Berhasil Di sinkron kan !");
        redirect('api/api_in','refresh');
    }
}