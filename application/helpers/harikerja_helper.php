<?php
// fungsi di bawah adalah menghitung hari kerja di antara tanggal cuti, mengembalikan data hitung / count
function harikerja($t1, $t2)
{
    $ci = get_instance();
	$awal_cuti = strtotime($t1);
    $akhir_cuti = strtotime($t2);

    $haricuti = array();
    $sabtuminggu = array();
     
    for ($i=$awal_cuti; $i <= $akhir_cuti; $i += (60 * 60 * 24)) {

        if (date('w', $i) !== '0' && date('w', $i) !== '6') {
            $haricuti[] = $i;
        } else {
            $sabtuminggu[] = $i;
        }
     
    }
    $i=0;
    foreach ($haricuti as $value) {
        $tggl = date('Y-m-d', $value);
        $ci->db->where('tanggal', $tggl);
        $q = $ci->db->count_all_results('tpp_libur_nasional');
        
        if($q == 0){
            $totalkerja[] = $value; 
            $i++;
        }
    }


    if($i == 0){
        return 0; 
    }else{
        $jumlah_cuti = count($totalkerja);
        return $jumlah_cuti;
    } 

}

// // fungsi di bawah adalah menghitung hari kerja di antara tanggal cuti, mengembalikan data tanggal array

function harikerja_tampilantanggal($t1, $t2)
{
    $ci = get_instance();
    $awal_cuti = strtotime($t1);
    $akhir_cuti = strtotime($t2);

    $haricuti = array();
    $sabtuminggu = array();
     
    for ($i=$awal_cuti; $i <= $akhir_cuti; $i += (60 * 60 * 24)) {

        if (date('w', $i) !== '0' && date('w', $i) !== '6') {
            $haricuti[] = $i;
        } else {
            $sabtuminggu[] = $i;
        }
     
    }
    $i=0;
    foreach ($haricuti as $value) {
        $tggl = date('Y-m-d', $value);
        $ci->db->where('tanggal', $tggl);
        $q = $ci->db->count_all_results('tpp_libur_nasional');
        
        if($q == 0){
            $totalkerja[] = $value; 
            $i++;
        }
    }


    if($i == 0){
        return 0; 
    }else{
        $jumlah_cuti = count($totalkerja);
        return $totalkerja;
    } 

}

//fungsi untuk laporan absensi, menampilkan tanggal kerja dalam sebulan

function all_hari_kerja_sebulan($tahun_c, $bulan_c)
{
    $hari_ini =$tahun_c.'-'.$bulan_c.'-01';
    $t1 = date('Y-m-01', strtotime($hari_ini));
    $t2 = date('Y-m-t', strtotime($hari_ini));

    $awal_tanggal = strtotime($t1);
    $akhir_tanggal = strtotime($t2);

    $harikerja = array();
    $sabtuminggu = array();
     
    for ($i=$awal_tanggal; $i <= $akhir_tanggal; $i += (60 * 60 * 24)) {

        if (date('w', $i) !== '0' && date('w', $i) !== '6') {
                $harikerja[] = $i;
        } else {
                $sabtuminggu[] = $i;
        }
         
    }

    foreach ($harikerja as $value) {
        $tggl[] = date('Y-m-d', $value);
    }

    return $tggl;
}