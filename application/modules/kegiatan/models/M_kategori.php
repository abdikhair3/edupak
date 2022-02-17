<?php
/**
 * Author     : ABDI KHAIR S.T
 * Created By : ABDI KHAIR S.T
 * E-Mail     : abdikhair3@gmail.com
 * No HP      : 082386032838
 * Class      : M_dashboard.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

    public function get_kategori()
        {
            $q = $this->db->get('dp_kategori_kegiatan')->result();
            return $q;
        }    

    public function get_kategori_edit($id)
        {
            // $this->db->order_by('id_ormas', 'DESC');
            if(isset($id))
            { $this->db->where('id_kategori_kegiatan', $id); }
            $q = $this->db->get('dp_kategori_kegiatan')->result();
            return $q;
        }  

    public function simpan_kategori($kategori)

    {

        $data = array(
            'kategori_kegiatan'                             => $kategori
        );



        $this->db->insert('dp_kategori_kegiatan', $data);

        return;

    }  

    public function edit_kategori($id, $kategori)

    {

        $data = array(
            'kategori_kegiatan'                             => $kategori
        );

        $this->db->where('id_kategori_kegiatan', $id);

        $this->db->update('dp_kategori_kegiatan', $data);

        return;

    }  

}
