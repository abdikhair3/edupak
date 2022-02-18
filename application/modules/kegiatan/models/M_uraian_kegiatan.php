<?php
/**
 * Author     : ABDI KHAIR S.T
 * Created By : ABDI KHAIR S.T
 * E-Mail     : abdikhair3@gmail.com
 * No HP      : 082386032838
 * Class      : M_dashboard.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class M_uraian_kegiatan extends CI_Model {

    public function get_uraian_kegiatan()
        {
            $this->db->join('dp_kategori_kegiatan', 'dp_kategori_kegiatan.id_kategori_kegiatan = dp_uraian_kegiatan.id_kategori_kegiatan');
            $this->db->join('dp_unsur', 'dp_unsur.id_unsur = dp_uraian_kegiatan.id_unsur');
            $this->db->join('dp_sub_unsur', 'dp_sub_unsur.id_sub_unsur = dp_uraian_kegiatan.id_sub_unsur');
            $this->db->join('dp_sub_sub_unsur', 'dp_sub_sub_unsur.id_sub_sub_unsur = dp_uraian_kegiatan.id_sub_sub_unsur');
            $this->db->join('dp_jabatan', 'dp_jabatan.id_jabatan = dp_uraian_kegiatan.id_pelaksana_tgs_jabatan');
            // $this->db->group_by("dp_uraian_kegiatan.id_output_kerja");
            $this->db->join('dp_output_kerja', 'dp_output_kerja.id_output_kerja = dp_uraian_kegiatan.id_output_kerja');
            $this->db->join('dp_kuantitas', 'dp_kuantitas.id_dp_kuantitas = dp_uraian_kegiatan.id_dp_kuantitas');
            $q = $this->db->get('dp_uraian_kegiatan')->result();
            return $q;
        }    

   
   public function get_cb_output_kerja()
    {
        $this->db->order_by('output_kerja', 'ASC');
        $q = $this->db->get('dp_output_kerja')->result();
        return $q;
    }
   
   public function cb_pel_tgs_jabatan()
    {
        $this->db->order_by('jabatan', 'ASC');
        $q = $this->db->get('dp_jabatan ')->result();
        return $q;
    }
   
    public function cb_kuantitas()
     {
         $this->db->order_by('satuan_kuantitas', 'ASC');
         $q = $this->db->get('dp_kuantitas ')->result();
         return $q;
     }

    public function get_uraian_kegiatan_edit($id, $id_kategori_kegiatan)
        {
            if(isset($id))
            { 
                $this->db->join('dp_kategori_kegiatan', 'dp_kategori_kegiatan.id_kategori_kegiatan = dp_uraian_kegiatan.id_kategori_kegiatan');
                $this->db->join('dp_unsur', 'dp_unsur.id_unsur = dp_uraian_kegiatan.id_unsur');
                $this->db->join('dp_sub_unsur', 'dp_sub_unsur.id_sub_unsur = dp_uraian_kegiatan.id_sub_unsur');
                $this->db->join('dp_sub_sub_unsur', 'dp_sub_sub_unsur.id_sub_sub_unsur = dp_uraian_kegiatan.id_sub_sub_unsur');
                $this->db->join('dp_jabatan', 'dp_jabatan.id_jabatan = dp_uraian_kegiatan.id_pelaksana_tgs_jabatan');
                $this->db->join('dp_output_kerja', 'dp_output_kerja.id_output_kerja = dp_uraian_kegiatan.id_output_kerja');
                $this->db->where('dp_uraian_kegiatan.id_uraian_kegiatan', $id_kategori_kegiatan); }
            $q = $this->db->get('dp_uraian_kegiatan')->result();
            return $q;
        }  

    public function get_unsur_root($id, $id_sub_sub)
        {
            $this->db->where('id_sub_sub_unsur', $id);
            $this->db->join('dp_sub_unsur', 'dp_sub_unsur.id_sub_unsur = dp_sub_sub_unsur.id_sub_sub_unsur');
            $this->db->join('dp_unsur', 'dp_unsur.id_unsur = dp_sub_unsur.id_unsur');
            $this->db->join('dp_kategori_kegiatan', 'dp_kategori_kegiatan.id_kategori_kegiatan = dp_unsur.id_kategori_kegiatan');
            $q = $this->db->get('dp_sub_sub_unsur')->result();
            return $q;
        } 

    public function simpan_uraian_kegiatan($id_unsur, $id_kategori_kegiatan, $id_sub_unsur, $id_sub_sub_unsur, $id_pelaksana_tgs_jabatan, $uraian_kegiatan, $id_output_kerja, $satuan_kuantitas, $angka_kredit, $detail_uraian)

    {

        $data = array(
            'id_kategori_kegiatan'                 => $id_kategori_kegiatan,
            'id_unsur'                             => $id_unsur,
            'id_sub_unsur'                         => $id_sub_unsur,
            'id_sub_sub_unsur'                     => $id_sub_sub_unsur,
            'id_pelaksana_tgs_jabatan'             => $id_pelaksana_tgs_jabatan,
            'uraian_kegiatan'                      => $uraian_kegiatan,
            'id_output_kerja'                      => $id_output_kerja,
            'id_dp_kuantitas'                     => $satuan_kuantitas,
            'angka_kredit'                         => $angka_kredit,
            'detail_uraian'                         => $detail_uraian,
        );



        $this->db->insert('dp_uraian_kegiatan', $data);

        return;

    }  

    public function edit_uraian_kegiatan($id, $id_kategori_kegiatan, $id_unsur, $id_sub_unsur, $id_sub_sub_unsur, $id_pelaksana_tgs_jabatan, $uraian_kegiatan, $id_output_kerja, $satuan_kuantitas, $angka_kredit)

    {

        $data = array(
            'id_kategori_kegiatan'                 => $id_kategori_kegiatan,
            'id_unsur'                             => $id_unsur,
            'id_sub_unsur'                         => $id_sub_unsur,
            'id_sub_sub_unsur'                     => $id_sub_sub_unsur,
            'id_pelaksana_tgs_jabatan'             => $id_pelaksana_tgs_jabatan,
            'uraian_kegiatan'                      => $uraian_kegiatan,
            'id_output_kerja'                      => $id_output_kerja,
            'id_dp_kuantitas'                     => $satuan_kuantitas,
            'angka_kredit'                         => $angka_kredit,
        );

        $this->db->where('id_uraian_kegiatan', $id);

        $this->db->update('dp_uraian_kegiatan', $data);

        return;

    }  

}
