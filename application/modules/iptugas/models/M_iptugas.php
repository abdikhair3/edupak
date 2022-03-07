<?php
/**
 * Author     : ABDI KHAIR S.T
 * Created By : ABDI KHAIR S.T
 * E-Mail     : abdikhair3@gmail.com
 * No HP      : 082386032838
 * Class      : M_dashboard.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class M_iptugas extends CI_Model {

    public function get_ip_tugas($bulan)
    {
        $this->db->where('nip', detail_pegawai()->nip);
        $this->db->where('MONTH(tgl_input)', $bulan);
        $this->db->order_by('tgl_input', 'ASC');
        $this->db->join('dp_uraian_kegiatan', 'dp_uraian_kegiatan.id_uraian_kegiatan = dp_tugas.id_uraian_kegiatan');
        $this->db->join('dp_kuantitas', 'dp_kuantitas.id_dp_kuantitas = dp_uraian_kegiatan.id_dp_kuantitas');
        $q = $this->db->get('dp_tugas')->result();
        return $q;
    }    
    public function get_ip_tugas_param($id)
    {
        $this->db->where('nip', detail_pegawai()->nip);
        $this->db->where('id_tugas', $id);
        $this->db->join('dp_uraian_kegiatan', 'dp_uraian_kegiatan.id_uraian_kegiatan = dp_tugas.id_uraian_kegiatan');
        $this->db->join('dp_kuantitas', 'dp_kuantitas.id_dp_kuantitas = dp_uraian_kegiatan.id_dp_kuantitas');
        $q = $this->db->get('dp_tugas')->first_row();
        return $q;
    }
   
   public function get_cb_unsur()
    {
        $this->db->order_by('unsur', 'ASC');
        $q = $this->db->get('dp_unsur')->result();
        return $q;
    }

    public function get_cb_uraian_tugas()
    {
        $id_unsur = $this->input->get('id_unsur');
        $this->db->join('dp_pelaksana_tgs_jabatan', 'dp_pelaksana_tgs_jabatan.id_pelaksana_tgs_jabatan = dp_uraian_kegiatan.id_pelaksana_tgs_jabatan');
        $this->db->where('id_unsur', $id_unsur);
        $this->db->order_by('uraian_kegiatan','ASC');
        return $this->db->get('dp_uraian_kegiatan');
    }
    
    
    public function get_bawahan($bulan, $tahun, $tggl, $nama)
    {
        $this->db->where('dp_pegawai.nip_atasan', detail_pegawai()->nip);
        if($bulan != ''){
            $this->db->where('MONTH(tgl_input)', $bulan);
        }else{
            $this->db->where('MONTH(tgl_input)', date('m'));
        }

        if($tahun != ''){
            $this->db->where('YEAR(tgl_input)', $tahun);
        }else{
            $this->db->where('YEAR(tgl_input)', date('Y'));
        }

        if($tggl != ''){
            $this->db->where('DAY(tgl_input)', $tggl);
        }
        
        if($nama != ''){
            $this->db->like('dp_pegawai.nama', $nama, 'both');
        }
        $this->db->join('dp_pegawai','dp_pegawai.nip=dp_tugas.nip','left');
        $this->db->join('dp_uraian_kegiatan','dp_uraian_kegiatan.id_uraian_kegiatan=dp_tugas.id_uraian_kegiatan','left');
        $this->db->join('dp_kuantitas','dp_kuantitas.id_dp_kuantitas=dp_uraian_kegiatan.id_dp_kuantitas','left');
        $q = $this->db->get('dp_tugas')->result();
        return $q;
    } 


    public function get_pelaksana_tgs_jabatan_edit($id)
        {
            if(isset($id))
            { $this->db->where('id_pelaksana_tgs_jabatan', $id); }
            $q = $this->db->get('dp_uraian_kegiatan')->result();
            return $q;
        }  

    public function simpan_ip_tugas($id_uraian_kegiatan, $nip, $nip_atasan, $tanggal, $bukti='', $kuantitas)

    {
        $bulan_inputan = date("m",strtotime($tanggal));
        if($bulan_inputan > 06){
            $semester = 2;
        }else{
            $semester = 1;
        }
        $data = array(
            'id_uraian_kegiatan'              => $id_uraian_kegiatan,
            'nip'                             => $nip,
            'nip_pemeriksa'                   => $nip_atasan,
            'file_bukti'                      => $bukti,
            'tgl_input'                       => $tanggal,
            'semester'                        => $semester,
            'kuantitas'                       => $kuantitas,
            'status_periksa'                  => "Diperiksa Atasan",
            'status_tugas'                    => "Baru"
        );
        $this->db->insert('dp_tugas', $data);
        return;

    }  

    public function simpan_edit_ip_tugas($id_uraian_kegiatan, $nip, $nip_atasan, $tanggal, $bukti='', $kuantitas, $id_tugas)

    {
        $bulan_inputan = date("m",strtotime($tanggal));
        if($bulan_inputan > 06){
            $semester = 2;
        }else{
            $semester = 1;
        }
        if($bukti == ''){
            $data = array(
                'id_uraian_kegiatan'              => $id_uraian_kegiatan,
                'nip'                             => $nip,
                'nip_pemeriksa'                   => $nip_atasan,
                'tgl_input'                       => $tanggal,
                'semester'                        => $semester,
                'kuantitas'                       => $kuantitas,
                'status_periksa'                  => "Diperiksa Atasan",
                'status_tugas'                    => "Baru"
            );
        }else{
            $data = array(
                'id_uraian_kegiatan'              => $id_uraian_kegiatan,
                'nip'                             => $nip,
                'nip_pemeriksa'                   => $nip_atasan,
                'file_bukti'                      => $bukti,
                'tgl_input'                       => $tanggal,
                'semester'                        => $semester,
                'kuantitas'                       => $kuantitas,
                'status_periksa'                  => "Diperiksa Atasan",
                'status_tugas'                    => "Baru"
            );
        }
        
        $this->db->update('dp_tugas', $data, ['id_tugas'=>$id_tugas]);
        return;

    }  

    public function get_tahun()
    {
        $this->db->select('YEAR(dt_ml) as a');
        $this->db->group_by('YEAR(dt_ml)');
        $this->db->order_by('YEAR(dt_ml)');
        $q = $this->db->get('dp_skp_tahunan_ft')->result();
        return $q;
    }

    public function get_kegiatan_tugas($tahun, $nip)
    {
        $this->db->join('dp_uraian_kegiatan','dp_uraian_kegiatan.id_uraian_kegiatan=dp_skp_tahunan.id_uraian_kegiatan','right');
        $this->db->group_by('dp_uraian_kegiatan.id_uraian_kegiatan');
        $this->db->where("DATE_FORMAT(tgl_input,'%Y')", $tahun);
        $this->db->where('nip', $nip);
        $this->db->where('status_periksa', 'Diverifikasi Atasan');
        $get_keg = $this->db->get('dp_skp_tahunan')->result();
        return $get_keg;
    }

    public function get_detail_kuantitas($id){
        $kegiatan = $id;
        $this->db->join('dp_kuantitas','dp_kuantitas.id_dp_kuantitas=dp_uraian_kegiatan.id_dp_kuantitas','left');
        $this->db->join('dp_output_kerja','dp_output_kerja.id_output_kerja=dp_uraian_kegiatan.id_output_kerja','left');
        $q = $this->db->get_where('dp_uraian_kegiatan', ['id_uraian_kegiatan'=>$kegiatan])->first_row();
        return $q;
        
    }
}
