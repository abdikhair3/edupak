<?php
/**
 * Author     : ABDI KHAIR S.T
 * Created By : ABDI KHAIR S.T
 * E-Mail     : abdikhair3@gmail.com
 * No HP      : 082386032838
 * Class      : M_dashboard.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelaksana_tgs_jabatan extends CI_Model {

    public function get_pelaksana_tgs_jabatan()
        {
            $q = $this->db->get('dp_pelaksana_tgs_jabatan')->result();
            return $q;
        }    

    public function get_pelaksana_tgs_jabatan_edit($id)
        {
            if(isset($id))
            { $this->db->where('id_pelaksana_tgs_jabatan', $id); }
            $q = $this->db->get('dp_pelaksana_tgs_jabatan')->result();
            return $q;
        }  

    public function simpan_pelaksana_tgs_jabatan($pelaksana_tgs_jabatan)

    {

        $data = array(
            'pelaksana_tgs_jabatan'                             => $pelaksana_tgs_jabatan
        );



        $this->db->insert('dp_pelaksana_tgs_jabatan', $data);

        return;

    }  

    public function edit_pelaksana_tgs_jabatan($id, $pelaksana_tgs_jabatan)

    {

        $data = array(
            'pelaksana_tgs_jabatan'                             => $pelaksana_tgs_jabatan
        );

        $this->db->where('id_pelaksana_tgs_jabatan', $id);

        $this->db->update('dp_pelaksana_tgs_jabatan', $data);

        return;

    }  

}
