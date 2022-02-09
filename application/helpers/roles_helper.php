<?php

function is_logged_in()
{
	 $ci = get_instance();
	 if ($ci->session->userdata('logged_in')==FALSE) {
	 		redirect('');
	 }

}

function detail_pegawai()
{
	$ci = get_instance();
	$data = $ci->db->get_where('dp_pegawai', ['id_pegawai'=>$ci->session->userdata('id_member')])->first_row();
	return $data;
}
