<?php
/**
 * Author     : ABDI KHAIR S.T
 * Created By : ABDI KHAIR S.T
 * E-Mail     : abdikhair3@gmail.com
 * No HP      : 082386032838
 * Class      : M_dashboard.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sub_sub_unsur extends CI_Model {

    public function get_unsur($id, $id_sub_sub)
        {
            $this->db->where('id_sub_unsur', $id);
            $q = $this->db->get('dp_sub_sub_unsur')->result();
            return $q;
        }    

    public function get_unsur_root($id, $id_sub_sub)
        {
            $this->db->where('id_sub_unsur', $id);
            $this->db->join('dp_unsur', 'dp_unsur.id_unsur = dp_sub_unsur.id_unsur');
            $this->db->join('dp_kategori_kegiatan', 'dp_kategori_kegiatan.id_kategori_kegiatan = dp_unsur.id_kategori_kegiatan');
            $q = $this->db->get('dp_sub_unsur')->result();
            return $q;
        } 

    public function get_unsur_edit($id, $id_sub_sub)
        {
            // $this->db->order_by('id_ormas', 'DESC');
            if(isset($id_sub_sub))
            { $this->db->where('id_sub_sub_unsur', $id_sub_sub); }
            $q = $this->db->get('dp_sub_sub_unsur')->result();
            return $q;
        }  

    public function simpan_unsur($id, $sub_sub_unsur)

    {

        $data = array(
            'id_sub_unsur'                             => $id,
            'sub_sub_unsur'                             => $sub_sub_unsur
        );



        $this->db->insert('dp_sub_sub_unsur', $data);

        return;

    }  

    public function edit_unsur($id_sub_sub, $sub_sub_unsur)

    {

        $data = array(
            'sub_sub_unsur'                             => $sub_sub_unsur
        );

        $this->db->where('id_sub_sub_unsur', $id_sub_sub);

        $this->db->update('dp_sub_sub_unsur', $data);

        return;

    }  

}
