<?php
/**
 * Author     : ABDI KHAIR S.T
 * Created By : ABDI KHAIR S.T
 * E-Mail     : abdikhair3@gmail.com
 * No HP      : 082386032838
 * Class      : M_dashboard.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class M_output_kerja extends CI_Model {

    public function get_output_kerja()
        {
            $q = $this->db->get('dp_output_kerja')->result();
            return $q;
        }    

    public function get_output_kerja_edit($id)
        {
            if(isset($id))
            { $this->db->where('id_output_kerja', $id); }
            $q = $this->db->get('dp_output_kerja')->result();
            return $q;
        }  

    public function simpan_output_kerja($output_kerja)

    {

        $data = array(
            'output_kerja'                             => $output_kerja
        );



        $this->db->insert('dp_output_kerja', $data);

        return;

    }  

    public function edit_output_kerja($id, $output_kerja)

    {

        $data = array(
            'output_kerja'                             => $output_kerja
        );

        $this->db->where('id_output_kerja', $id);

        $this->db->update('dp_output_kerja', $data);

        return;

    }  

}
