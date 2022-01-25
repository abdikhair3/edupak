<?php
// fungsi di bawah adalah menghitung hari kerja di antara tanggal cuti, mengembalikan data hitung / count
function harikerjasatubulan($tahun_c, $bulan_c, $nip)
{
    $ci = get_instance();
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
        ///////////////////////
        // cek cuti
    $ci->db->where('nip', $nip);
    $ci->db->like('mulai_cuti', $tahun_c.'-'.$bulan_c,'AFTER');
    $cek = $ci->db->get('tpp_cuti')->first_row();

    if($cek){
        $t1 = $cek->mulai_cuti;
        $t2 = $cek->akhir_cuti;
        $tanggal_cuti = harikerja_tampilantanggal($t1, $t2);
    }else{
        $tanggal_cuti=array();
    }

        
        //////////////////////

        $i=1;
        $_set='';
         $harikerja_sebenarnya=array();
        foreach ($harikerja as $value) {
            $tggl = date('Y-m-d', $value);
            $ci->db->where('tanggal', $tggl);
            $q = $ci->db->count_all_results('tpp_libur_nasional');
            
            if($q == 0){
                if(in_array($value, $tanggal_cuti)){
                    $_set = "kosong";
                }else{
                    $harikerja_sebenarnya[] = $value;

                }
               
            }

            
        }

      return $harikerja_sebenarnya; 

    

}

// // fungsi di bawah adalah menghitung hari kerja di antara tanggal cuti, mengembalikan data tanggal array

