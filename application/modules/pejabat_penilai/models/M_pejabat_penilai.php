<?php
/**
 * Author     : ABDI KHAIR S.T
 * Created By : ABDI KHAIR S.T
 * E-Mail     : abdikhair3@gmail.com
 * No HP      : 082386032838
 * Class      : M_dashboard.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pejabat_penilai extends CI_Model {

    public function get_pejabat_penilai()
        {
            $q = $this->db->get('dp_pejabat_penilai')->result();
            return $q;
        }    

   
   public function get_cb_pegawai()
    {
        $this->db->where('id_unit', $this->session->userdata('id_member'));
        $unit_ses = $this->db->get('dp_unit')->first_row();

        $this->db->where('id_unit', $unit_ses->key_unit);
        $this->db->order_by('nama','ASC');
        return $this->db->get('dp_pegawai');
    }
   
   public function get_cb_pejabat_penilai()
    {
        $this->db->where('id_unit', $this->session->userdata('id_member'));
        $unit_ses = $this->db->get('dp_unit')->first_row();

        $nip_pegawai = $this->input->get('nip_pegawai');
        $this->db->where('id_unit', $unit_ses->key_unit);
        $this->db->where('nip !=', $nip_pegawai);
        $this->db->order_by('nama','ASC');
        return $this->db->get('dp_pegawai');
    }

    public function get_pejabat_penilai_edit($id)
        {
            if(isset($id))
            { 
                $this->db->join('dp_unsur', 'dp_unsur.id_unsur = dp_uraian_kegiatan.id_unsur');
                $this->db->join('dp_sub_unsur', 'dp_sub_unsur.id_unsur = dp_unsur.id_unsur');
                $this->db->join('dp_sub_sub_unsur', 'dp_sub_sub_unsur.id_sub_unsur = dp_sub_unsur.id_sub_unsur');
                $this->db->join('dp_pelaksana_tgs_jabatan', 'dp_pelaksana_tgs_jabatan.id_pelaksana_tgs_jabatan = dp_uraian_kegiatan.id_pelaksana_tgs_jabatan')
;                $this->db->join('dp_output_kerja', 'dp_output_kerja.id_output_kerja = dp_uraian_kegiatan.id_output_kerja');
                $this->db->where('dp_uraian_kegiatan.id_uraian_kegiatan', $id); }
            $q = $this->db->get('dp_uraian_kegiatan')->result();
            return $q;
        }  

    public function simpan_pejabat_penilai($nip_pegawai, $nip_penilai)

    {

        $data = array(
            'nip_pegawai'                             => $nip_pegawai,
            'nip_penilai'                         => $nip_penilai
        );



        $this->db->insert('dp_pejabat_penilai', $data);

        return;

    }  

    public function edit_uraian_kegiatan($id, $id_unsur, $id_sub_unsur, $id_sub_sub_unsur, $id_pelaksana_tgs_jabatan, $uraian_kegiatan, $id_output_kerja, $angka_kredit)

    {

        $data = array(
            'id_unsur'                             => $id_unsur,
            'id_sub_unsur'                         => $id_sub_unsur,
            'id_sub_sub_unsur'                     => $id_sub_sub_unsur,
            'id_pelaksana_tgs_jabatan'             => $id_pelaksana_tgs_jabatan,
            'uraian_kegiatan'                      => $uraian_kegiatan,
            'id_output_kerja'                      => $id_output_kerja,
            'angka_kredit'                         => $angka_kredit,
        );

        $this->db->where('id_uraian_kegiatan', $id);

        $this->db->update('dp_uraian_kegiatan', $data);

        return;

    }  

}
