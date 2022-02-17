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

    public function get_unsur()
        {
            $q = $this->db->get('dp_unsur')->result();
            return $q;
        }    

    public function get_unsur_edit($id)
        {
            // $this->db->order_by('id_ormas', 'DESC');
            if(isset($id))
            { $this->db->where('id_unsur', $id); }
            $q = $this->db->get('dp_unsur')->result();
            return $q;
        }  

    public function simpan_unsur($unsur)

    {

        $data = array(
            'unsur'                             => $unsur
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
