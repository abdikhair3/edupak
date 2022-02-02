<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_account extends CI_Model {

	function get_user_pegawai($satuan=null)
	{
        $this->db->join('dp_pegawai','dp_pegawai.id_pegawai=x_users.id_member','left');
        $this->db->where('level','Pegawai');
        if($satuan != null)
        {
            $this->db->where('id_satuan', $satuan);
        }
        $data = $this->db->get('x_users')->result();
        return $data;
	}

    function get_pegawai($satuan='')
    {
        if($satuan != ''){
            $this->db->where('id_satuan', $satuan);
        }
        $data = $this->db->get('dp_pegawai')->result();
        return $data;
    }

    function get_user($id)
    {
        $this->db->join('dp_pegawai','dp_pegawai.id_pegawai=x_users.id_member','left');
        $this->db->where('id_users', $id);
        $data = $this->db->get('x_users')->first_row();
        return $data;
    }

    function get_user_param($id)
    {
        $this->db->join('dp_pegawai','dp_pegawai.id_pegawai=x_users.id_member','left');
        $this->db->where('id_satuan', $id);
        $data = $this->db->get('x_users')->result();
        return $data;
    }
	
    function get_satuan($id)
    {
        $this->db->where('id_satuan', $id);
        $data = $this->db->get('dp_satuan')->first_row();
        return $data;
    }

}
