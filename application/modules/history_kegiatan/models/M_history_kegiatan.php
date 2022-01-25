<?php
/**
 * Author     : ABDI KHAIR S.T
 * Created By : ABDI KHAIR S.T
 * E-Mail     : abdikhair3@gmail.com
 * No HP      : 082386032838
 * Class      : M_dashboard.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class M_history_kegiatan extends CI_Model {

    public function get_history_harian()
        {
            $this->db->where('id_pegawai', $this->session->userdata('id_member'));
            $nip_ses = $this->db->get('dp_pegawai')->first_row();

            // $this->db->group_by('dp_tugas.id_uraian_kegiatan');
            $this->db->join('dp_uraian_kegiatan', 'dp_uraian_kegiatan.id_uraian_kegiatan = dp_tugas.id_uraian_kegiatan');
            $this->db->where('nip', $nip_ses->nip);
            $this->db->where('status_periksa', "Diverifikasi Atasann");
            $q = $this->db->get('dp_tugas')->result();
            return $q;
        }      


}
