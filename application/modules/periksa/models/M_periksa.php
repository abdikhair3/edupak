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
            $bln_now=date('m');
            $bln_now_con=(int)$bln_now;
            if($bln_now_con<=6) { $semester=1; } else { $semester=2; }


            $thn_now=date('Y');

            $this->db->where('status_periksa', "Diperiksa Atasan");
            $this->db->where('YEAR(dt_ml)',$thn_now);
            $this->db->group_by("dp_pegawai.nip");
            $this->db->join('dp_pegawai', 'dp_pegawai.nip = dp_skp_tahunan_ft.nip');
            $this->db->join('dp_skp_tahunan', 'dp_skp_tahunan.id_skp_tahunan_ft = dp_skp_tahunan_ft.id_skp_tahunan_ft');
            $q = $this->db->get('dp_skp_tahunan_ft')->result();
            return $q;
        }    

    public function get_kegiatan($id)
        {
            $bln_now=date('m');
            $bln_now_con=(int)$bln_now;
            if($bln_now_con<=6) { $semester=1; } else { $semester=2; }

            $thn_now=date('Y');
            
            $this->db->where('YEAR(tgl_input)',$thn_now);
            $this->db->where('dp_skp_tahunan_ft.id_skp_tahunan_ft', $id);
            $this->db->where('status_periksa', "Diperiksa Atasan");
            $this->db->join('dp_skp_tahunan_ft', 'dp_skp_tahunan_ft.id_skp_tahunan_ft = dp_skp_tahunan.id_skp_tahunan_ft');
            $this->db->join('dp_uraian_kegiatan', 'dp_uraian_kegiatan.id_uraian_kegiatan = dp_skp_tahunan.id_uraian_kegiatan');
            $q = $this->db->get('dp_skp_tahunan')->result();
            return $q;
        }

    public function get_kegiatan_selesai($id, $id_skp, $status)

    {

        $data = array(

                'status_periksa'   => $status

        );
        

        $this->db->where('id_skp', $id_skp);

        $this->db->update('dp_skp_tahunan', $data);

        return;

    }

}
