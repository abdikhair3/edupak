<?php
/**
 * Author     : ABDI KHAIR S.T
 * Created By : ABDI KHAIR S.T
 * E-Mail     : abdikhair3@gmail.com
 * No HP      : 082386032838
 * Class      : M_dashboard.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user_pegawai extends CI_Model {

    public function get_user_pegawai($key_unit)
        {
            $this->db->where('dp_pegawai.id_unit', $key_unit);
            $q = $this->db->get('dp_pegawai')->result();
            return $q;
        } 

    public function get_tambah_user_auto()
        {

            $this->db->where('id_unit', $this->session->userdata('id_member'));
            $unit_ses = $this->db->get('dp_unit')->first_row();

            $this->db->where('id_unit', $unit_ses->key_unit);
            $kirim = $this->db->get('dp_pegawai')->result();
            foreach ($kirim as $d) {
                
            $password = "$d->nip";
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
                $data = array(
                'id_member'               => $d->id_pegawai,
                'username'             => $d->nip,
                'password'             => $password_hash,
                'level'             => "Pegawai"
                    );



                    $this->db->insert('x_users', $data);
            }

                    return;
        }    

}
