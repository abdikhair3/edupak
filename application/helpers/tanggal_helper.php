<?php

function is_indonesia_time()
{
	date_default_timezone_set('Asia/Jakarta');
	$tanggal = date('d-m-Y');
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[0] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[2];

}

function is_time_convert($tanggal)
{
	date_default_timezone_set('Asia/Jakarta');
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

}

function is_time_bulan($bulan)
{
	$bln = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);

	return $bln[(int)$bulan];
}

