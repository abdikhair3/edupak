<?php
/**
 * Author     : ABDI KHAIR S.T
 * Created By : ABDI KHAIR S.T
 * E-Mail     : abdikhair3@gmail.com
 * No HP      : 082386032838
 * Class      : M_dashboard.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class M_periksa extends CI_Model {

    public function get_pegawai()
        {
            $this->db->where('id_pegawai', $this->session->userdata('id_member'));
            $nip_ses = $this->db->get('dp_pegawai')->first_row();

            $this->db->where('nip_pemeriksa', $nip_ses->nip);
            $this->db->group_by("dp_pegawai.nip");
            $this->db->join('dp_pegawai', 'dp_pegawai.nip = dp_tugas.nip');
            $q = $this->db->get('dp_tugas')->result();
            return $q;
        }    

    public function get_kegiatan($nip)
        {
            $this->db->where('nip', $nip);
            $this->db->where('status_periksa', "Diperiksa Atasan");
            $this->db->join('dp_uraian_kegiatan', 'dp_uraian_kegiatan.id_uraian_kegiatan = dp_tugas.id_uraian_kegiatan');
            $q = $this->db->get('dp_tugas')->result();
            return $q;
        }

    public function get_kegiatan_selesai($id, $nip, $status)

    {

        $data = array(

                'status_periksa'   => $status

        );
        

        $this->db->where('id_tugas', $id);

        $this->db->update('dp_tugas', $data);

        return;

    }

}
