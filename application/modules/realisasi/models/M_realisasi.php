<?php
/**
 * Author     : ABDI KHAIR S.T
 * Created By : ABDI KHAIR S.T
 * E-Mail     : abdikhair3@gmail.com
 * No HP      : 082386032838
 * Class      : M_dashboard.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class M_realisasi extends CI_Model {

    public function get_tp_periode()
        {
            $this->db->where('nip', detail_pegawai()->nip);
            $q = $this->db->get('dp_skp_tahunan_ft')->result();
            return $q;
        }    

        public function get_realisasi($id)
            {
                $this->db->where('nip', detail_pegawai()->nip);
                $this->db->where('status_periksa', "Diverifikasi Atasan");
                $this->db->where('id_skp_tahunan_ft', $id);
                $this->db->join('dp_uraian_kegiatan', 'dp_uraian_kegiatan.id_uraian_kegiatan = dp_skp_tahunan.id_uraian_kegiatan');
                $q = $this->db->get('dp_skp_tahunan')->result();
                return $q;
            }    
        
}
