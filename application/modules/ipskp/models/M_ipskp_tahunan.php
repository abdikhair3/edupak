<?php
/**
 * Author     : ABDI KHAIR S.T
 * Created By : ABDI KHAIR S.T
 * E-Mail     : abdikhair3@gmail.com
 * No HP      : 082386032838
 * Class      : M_dashboard.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ipskp_tahunan extends CI_Model {

    public function get_ip_tugas()
        {
            $bln_now=date('m');
            $bln_now_con=(int)$bln_now;
            if($bln_now_con<=6) { $semester=1; } else { $semester=2; }

            $this->db->where('nip', detail_pegawai()->nip);
            $this->db->order_by('id_skp', 'DESC');
            $this->db->join('dp_uraian_kegiatan', 'dp_uraian_kegiatan.id_uraian_kegiatan = dp_skp_tahunan.id_uraian_kegiatan');
            $q = $this->db->get('dp_skp_tahunan')->result();
            return $q;
        }    
        
    public function get_cb_unsur()
    {
        $this->db->order_by('kategori_kegiatan', 'ASC');
        $q = $this->db->get('dp_kategori_kegiatan')->result();
        return $q;
    }

    public function get_cb_uraian_tugas()
    {
        $id_kategori_kegiatan = $this->input->get('id_kategori_kegiatan');
        // $this->db->join('dp_kategori_kegiatan', 'dp_kategori_kegiatan.id_kategori_kegiatan = dp_uraian_kegiatan.id_kategori_kegiatan');
        $this->db->where('id_kategori_kegiatan', $id_kategori_kegiatan);
        $this->db->order_by('uraian_kegiatan','ASC');
        return $this->db->get('dp_uraian_kegiatan');
    }

    public function get_tp_detail()
    {
        $id_uraian_kegiatan = $this->input->get('id_uraian_kegiatan');
        $this->db->where('id_uraian_kegiatan', $id_uraian_kegiatan);
        $this->db->order_by('uraian_kegiatan','ASC');
        return $this->db->get('dp_uraian_kegiatan');
    }
    // public function get_cb_sub_sub_unsur($id_sub_unsur)
    // {
    //     $this->db->order_by('sub_sub_unsur', 'ASC');
    //     $q = $this->db->get('dp_sub_sub_unsur')->result();
    //     return $q;
    // }

    public function get_pelaksana_tgs_jabatan_edit($id)
        {
            if(isset($id))
            { $this->db->where('id_pelaksana_tgs_jabatan', $id); }
            $q = $this->db->get('dp_uraian_kegiatan')->result();
            return $q;
        }  

    public function simpan_ip_tugas($id_uraian_kegiatan, $nip, $tgl_input, $totalangkakredit, $kuantitas)

    {
        $tgl_now = date('Y-m-d');
        $data = array(
            'id_uraian_kegiatan'              => $id_uraian_kegiatan,
            'nip'                             => detail_pegawai()->nip,
            'id_pegawai'                             => detail_pegawai()->id_pegawai,
            'id_satuan'                             => detail_pegawai()->id_satuan,
            'id_unit'                             => detail_pegawai()->id_unit,
            'id_pangkat'                             => detail_pegawai()->id_pangkat,
            'id_jabatan'                             => detail_pegawai()->id_jabatan,
            'kuantitas'                       => $kuantitas,
            'ttl_angkakredit'                 => $totalangkakredit,
            'tgl_input'                       => $tgl_now,
            'status_periksa'                  => "Diperiksa Atasan"
        );



        $this->db->insert('dp_skp_tahunan', $data);

        return;

    }  


}
