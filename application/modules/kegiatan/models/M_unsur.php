<?php
/**
 * Author     : ABDI KHAIR S.T
 * Created By : ABDI KHAIR S.T
 * E-Mail     : abdikhair3@gmail.com
 * No HP      : 082386032838
 * Class      : M_dashboard.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class M_unsur extends CI_Model {

    public function get_unsur($id)
        {
            $this->db->where('id_kategori_kegiatan', $id);
            $q = $this->db->get('dp_unsur')->result();
            return $q;
        }    

        public function get_kategori_root($id)
            {
                $this->db->where('id_kategori_kegiatan', $id);
                $q = $this->db->get('dp_kategori_kegiatan')->result();
                return $q;
            }

    public function get_unsur_edit($id, $id_unsur)
        {
            // $this->db->order_by('id_ormas', 'DESC');
            if(isset($id_unsur))
            { $this->db->where('id_unsur', $id_unsur); }
            $q = $this->db->get('dp_unsur')->result();
            return $q;
        }  

    public function simpan_unsur($id_kategori_kegiatan, $unsur)

    {

        $data = array(
            'unsur'                             => $unsur,
            'id_kategori_kegiatan'                             => $id_kategori_kegiatan
        );



        $this->db->insert('dp_unsur', $data);

        return;

    }  

    public function edit_unsur($id, $unsur)

    {

        $data = array(
            'unsur'                             => $unsur
        );

        $this->db->where('id_unsur', $id);

        $this->db->update('dp_unsur', $data);

        return;

    }  

}
