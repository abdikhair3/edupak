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

    public function get_history_harian($bln_cari)
        {
            $bln_now=date('m');
            $bln_now_con=(int)$bln_now;
            if($bln_now_con<=6) { $semester=1; } else { $semester=2; }


            $this->db->where('id_pegawai', $this->session->userdata('id_member'));
            $nip_ses = $this->db->get('dp_pegawai')->first_row();

            $thn_now=date('Y');

            // $this->db->group_by('dp_tugas.id_uraian_kegiatan');
            $this->db->join('dp_uraian_kegiatan', 'dp_uraian_kegiatan.id_uraian_kegiatan = dp_tugas.id_uraian_kegiatan');
            $this->db->where('semester', $semester);         
            $this->db->where('MONTH(tgl_input)',$bln_cari);       
            $this->db->where('YEAR(tgl_input)',$thn_now);
            $this->db->where('nip', $nip_ses->nip);
            $this->db->where('status_periksa', "Diverifikasi Atasan");
            $this->db->group_by('tgl_input');
            $q = $this->db->get('dp_tugas')->result();
            return $q;
        }      

    public function get_history_bulanan($bln_cari)
        {
            $bln_now=date('m');
            $bln_now_con=(int)$bln_now;
            if($bln_now_con<=6) { $semester=1; } else { $semester=2; }


            $this->db->where('id_pegawai', $this->session->userdata('id_member'));
            $nip_ses = $this->db->get('dp_pegawai')->first_row();

            $thn_now=date('Y');

            $this->db->group_by('dp_tugas.id_uraian_kegiatan');
            $this->db->join('dp_uraian_kegiatan', 'dp_uraian_kegiatan.id_uraian_kegiatan = dp_tugas.id_uraian_kegiatan');
            $this->db->where('semester', $semester);            
            $this->db->where('YEAR(tgl_input)',$thn_now);      
            $this->db->where('MONTH(tgl_input)',$bln_cari);
            $this->db->where('nip', $nip_ses->nip);
            $this->db->where('status_periksa', "Diverifikasi Atasan");
            $q = $this->db->get('dp_tugas')->result();
            return $q;
        }        

        public function get_history_semester($semester_cari)
            {
                $bln_now=date('m');
                $bln_now_con=(int)$bln_now;
                if($bln_now_con<=6) { $semester=1; } else { $semester=2; }
    
    
                $this->db->where('id_pegawai', $this->session->userdata('id_member'));
                $nip_ses = $this->db->get('dp_pegawai')->first_row();
    
                $thn_now=date('Y');
    
                $this->db->group_by('dp_tugas.id_uraian_kegiatan');
                $this->db->join('dp_uraian_kegiatan', 'dp_uraian_kegiatan.id_uraian_kegiatan = dp_tugas.id_uraian_kegiatan');
                $this->db->where('semester', $semester);            
                $this->db->where('YEAR(tgl_input)',$thn_now);      
                $this->db->where('MONTH(tgl_input)',$semester_cari);
                $this->db->where('nip', $nip_ses->nip);
                $this->db->where('status_periksa', "Diverifikasi Atasan");
                $q = $this->db->get('dp_tugas')->result();
                return $q;
            }  


}
