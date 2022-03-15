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

            $bln_now=$this->input->get('bulan');
            $bln_now_con=(int)$bln_now;
            if($bln_now_con<=6) { $semester=1; } else { $semester=2; }

            $thn_now=$this->input->get('tahun');

            // $this->db->group_by('dp_tugas.id_uraian_kegiatan');
            $this->db->where('nip', detail_pegawai()->nip);
            $this->db->where('semester', $semester);         
            $this->db->where('MONTH(tgl_input)',$bln_now);       
            $this->db->where('YEAR(tgl_input)',$thn_now);
            $this->db->where('status_periksa', "Diverifikasi Atasan");
            $this->db->group_by('tgl_input');
            $this->db->join('dp_uraian_kegiatan', 'dp_uraian_kegiatan.id_uraian_kegiatan = dp_tugas.id_uraian_kegiatan');
            $q = $this->db->get('dp_tugas')->result();
            return $q;
        }      

        

    public function get_tahun()
    {
        $this->db->group_by('YEAR(tgl_input)');
        $q = $this->db->get('dp_tugas')->result();
        return $q;
    }   

    public function get_history_bulanan()
        {
            $bln_now=$this->input->get('bulan');
            $bln_now_con=(int)$bln_now;
            if($bln_now_con<=6) { $semester=1; } else { $semester=2; }

            $thn_now=$this->input->get('tahun');

            $this->db->where('nip', detail_pegawai()->nip);
            $this->db->group_by('dp_tugas.id_uraian_kegiatan');
            $this->db->join('dp_uraian_kegiatan', 'dp_uraian_kegiatan.id_uraian_kegiatan = dp_tugas.id_uraian_kegiatan');
            $this->db->join('dp_kuantitas', 'dp_kuantitas.id_dp_kuantitas = dp_uraian_kegiatan.id_dp_kuantitas');
            $this->db->where('semester', $semester);            
            $this->db->where('YEAR(tgl_input)',$thn_now);      
            $this->db->where('MONTH(tgl_input)',$bln_now);
            $this->db->where('status_periksa', "Diverifikasi Atasan");
            $q = $this->db->get('dp_tugas')->result();
            return $q;
        }        

        public function get_history_semester()
            {
                $bln_now=$this->input->get('bulan');
                $bln_now_con=(int)$bln_now;
                if($bln_now_con<=6) { $semester=1; } else { $semester=2; }
    
                $thn_now=$this->input->get('tahun');
    
                $this->db->where('nip', detail_pegawai()->nip);
                $this->db->group_by('dp_tugas.id_uraian_kegiatan');
                $this->db->join('dp_uraian_kegiatan', 'dp_uraian_kegiatan.id_uraian_kegiatan = dp_tugas.id_uraian_kegiatan');
                $this->db->join('dp_kuantitas', 'dp_kuantitas.id_dp_kuantitas = dp_uraian_kegiatan.id_dp_kuantitas');
                $this->db->where('semester', $this->input->get('semester'));            
                $this->db->where('YEAR(tgl_input)',$thn_now);      
                $this->db->where('status_periksa', "Diverifikasi Atasan");
                $q = $this->db->get('dp_tugas')->result();
                return $q;
            }  


}
