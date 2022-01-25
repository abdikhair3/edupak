<?php
// fungsi di bawah adalah menghitung hari kerja di antara tanggal cuti, mengembalikan data hitung / count
function satuan()
{
    $data = file_get_contents("http://localhost/API-SIMPEG/api/satuan");
    $json = json_decode($data, TRUE);
    return $json;
}

function pegawai_where_satuan($id_satuan)
{
    $data = file_get_contents("http://localhost/API-SIMPEG/api/pegawai_where_satuan?id_satuan=".$id_satuan."");
    $json = json_decode($data, TRUE);

    if($json['result'] == 0){
        return null;
    }else{
        return $json;
    }
    
}

function pegawai_where_satuan_dan_unit($id_satuan, $id_unit)
{
    $data = file_get_contents("http://localhost/API-SIMPEG/api/pegawai_where_satuan_dan_unit?id_satuan=".$id_satuan."&id_unit=".$id_unit."");
    $json = json_decode($data, TRUE);

    if($json['result'] == 0){
        return null;
    }else{
        return $json;
    }
    
}

function pegawai_where_satuan_dan_multi_unit($id_satuan, $id_unit)
{
    $data = file_get_contents("http://localhost/API-SIMPEG/api/pegawai_where_satuan_dan_multi_unit?id_satuan=".$id_satuan."&id_unit=".$id_unit."");
    $json = json_decode($data, TRUE);

    if($json['result'] == 0){
        return null;
    }else{
        return $json;
    }
    
}

function satuan_where($id_satuan)
{
    $data = file_get_contents("http://localhost/API-SIMPEG/api/satuan_where?id=".$id_satuan."");
    $json = json_decode($data, TRUE);
    return $json;
}

function unit_where($id_unit)
{
    $data = file_get_contents("http://localhost/API-SIMPEG/api/unit_where?id_unit=".$id_unit."");
    $json = json_decode($data, TRUE);
    return $json;
}

function unit_multi_where($id_unit)
{
    $data = file_get_contents("http://localhost/API-SIMPEG/api/unit_multi_where?id_unit=".$id_unit."");
    $json = json_decode($data, TRUE);
    return $json;
}

function get_unit_satuan_where($id_satuan)
{
    $data = file_get_contents("http://localhost/API-SIMPEG/api/unit_where_satuan?id=".$id_satuan."");
    $json = json_decode($data, TRUE);
    return $json;
}

function count_asn_where_unit($id_satuan, $id_unit)
{
    $data = file_get_contents("http://localhost/API-SIMPEG/api/count_asn_where_unit?id_satuan=".$id_satuan."&id_unit=".$id_unit."");
    $json = json_decode($data, TRUE);
    return $json;
}

function pegawai_where_nip($nip)
{
    $data = file_get_contents("http://localhost/API-SIMPEG/api/pegawai_where_nip?nip=".$nip."");
    $json = json_decode($data, TRUE);

    if($json['result'] == 0){
        return null;
    }else{
        return $json;
    }
    
}