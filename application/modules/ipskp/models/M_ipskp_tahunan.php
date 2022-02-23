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

    public function get_tp_periode()
        {
            $this->db->where('id_pegawai', detail_pegawai()->id_pegawai);
            $q = $this->db->get('dp_skp_tahunan_ft')->result();
            return $q;
        }    

        public function get_tp_ip_target_Tahunan($id)
            {
                $this->db->where('id_pegawai', detail_pegawai()->id_pegawai);
                $this->db->where('id_skp_tahunan_ft', $id);
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
        $this->db->where('dp_uraian_kegiatan.id_uraian_kegiatan', $id_uraian_kegiatan);
        $this->db->order_by('uraian_kegiatan','ASC');
        $this->db->join('dp_kuantitas', 'dp_kuantitas.id_dp_kuantitas = dp_uraian_kegiatan.id_dp_kuantitas');
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

    public function simpan_periode($id_pegawai, $dt_ml, $dt_ak)

    {
        $data = array(
            'id_pegawai'                             => detail_pegawai()->id_pegawai,
            'dt_ml'                       => $dt_ml,
            'dt_ak'                       => $dt_ak
        );



        $this->db->insert('dp_skp_tahunan_ft', $data);

        return;

    }  

    public function simpan_ip_tugas($id_uraian_kegiatan, $nip, $totalangkakredit, $kuantitas, $id_skp_tahunan_ft)

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
            'id_skp_tahunan_ft'                       => $id_skp_tahunan_ft,
            'kuantitas'                       => $kuantitas,
            'ttl_angkakredit'                 => $totalangkakredit,
            'tgl_input'                       => $tgl_now,
            'status_periksa'                  => "Diperiksa Atasan"
        );

        $this->db->insert('dp_skp_tahunan', $data);

        return;
    }
}
