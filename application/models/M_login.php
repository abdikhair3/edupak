<?php
/**
 * Author     : ABDI KHAIR S.T
 * Created By : ABDI KHAIR S.T
 * E-Mail     : abdikhair3@gmail.com
 * No HP      : 082386032838
 * Class      : M_login.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function auth($username)
	{
		$query = $this->db->get_where('x_users',array('username' => $username));
		if ($query->num_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}	
	}

	function get_by_users($username)
	{

		$this->db->where('username', $username);

		return $this->db->get('x_users')->row();
	}

	

}
