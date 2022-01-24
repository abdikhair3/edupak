<?php
/**
 * Author     : ABDI KHAIR S.T
 * Created By : ABDI KHAIR S.T
 * E-Mail     : abdikhair3@gmail.com
 * No HP      : 082386032838
 * Class      : M_dashboard.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sub_unsur extends CI_Model {

    public function get_unsur($id)
        {
            $this->db->where('id_unsur', $id);
            $q = $this->db->get('dp_sub_unsur')->result();
            return $q;
        }    

    public function get_unsur_root($id)
        {
            $this->db->where('id_unsur', $id);
            $q = $this->db->get('dp_unsur')->result();
            return $q;
        } 

    public function get_unsur_edit($id, $id_sub)
        {
            // $this->db->order_by('id_ormas', 'DESC');
            if(isset($id))
            { $this->db->where('id_sub_unsur', $id_sub); }
            $q = $this->db->get('dp_sub_unsur')->result();
            return $q;
        }  

    public function simpan_unsur($id, $sub_unsur)

    {

        $data = array(
            'id_unsur'                             => $id,
            'sub_unsur'                             => $sub_unsur
        );



        $this->db->insert('dp_sub_unsur', $data);

        return;

    }  

    public function edit_unsur($id_sub, $sub_unsur)

    {

        $data = array(
            'sub_unsur'                             => $sub_unsur
        );

        $this->db->where('id_sub_unsur', $id_sub);

        $this->db->update('dp_sub_unsur', $data);

        return;

    }  

}
