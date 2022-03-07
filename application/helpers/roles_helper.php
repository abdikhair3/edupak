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

function notif($jenis, $pesan)
{
	return '<script>
	Command: toastr["'.$jenis.'"]("'.$pesan.'");
	
	$(document).ready(function() {
	toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "newestOnTop": false,
	  "progressBar": true,
	  "positionClass": "toast-top-center",
	  "preventDuplicates": false,
	  "onclick": null,
	  "showDuration": "300",
	  "hideDuration": "1000",
	  "timeOut": "5000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}

	});

</script>
	';
}

function notif_line($warna, $pesan)
{
	$notif = '
                <div class="alert alert-'.$warna.' alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  '.$pesan.'
                </div>
		';
		return $notif;
}
