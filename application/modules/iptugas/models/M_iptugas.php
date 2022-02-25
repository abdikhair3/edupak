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

    public function get_ip_tugas()
        {
            $this->db->where('nip', detail_pegawai()->nip);
            $this->db->order_by('id_tugas', 'DESC');
            $this->db->join('dp_uraian_kegiatan', 'dp_uraian_kegiatan.id_uraian_kegiatan = dp_tugas.id_uraian_kegiatan');
            $this->db->join('dp_kuantitas', 'dp_kuantitas.id_dp_kuantitas = dp_uraian_kegiatan.id_dp_kuantitas');
            $q = $this->db->get('dp_tugas')->result();
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

    public function simpan_ip_tugas($id_uraian_kegiatan, $nip, $nip_atasan, $tanggal, $bukti='', $kuantitas)

    {
        $data = array(
            'id_uraian_kegiatan'              => $id_uraian_kegiatan,
            'nip'                             => $nip,
            'nip_pemeriksa'                   => $nip_atasan,
            'file_bukti'                      => $bukti,
            'tgl_input'                       => $tanggal,
            'kuantitas'                       => $kuantitas,
            'status_periksa'                  => "Diperiksa Atasan",
            'status_tugas'                    => "Baru"
        );
        $this->db->insert('dp_tugas', $data);
        return;

    }  


}
