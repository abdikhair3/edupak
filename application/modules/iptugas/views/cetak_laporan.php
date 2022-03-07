<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Harian</title>
        <style>
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                font-size:10px;
                border-collapse: collapse;
                width: 100%;
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                /* background-color: #4CAF50; */
                color: black;
            }
            hr.style15 {
                border-top: 4px double #8c8b8b;
                text-align: center;
            }
            .cop {
                background-repeat: no-repeat;
                padding-left: 18px !important;
                background-size: 5%;
                background-position-y: 5px;
                position:relative;
                width:5%;
                top: 60px;
                }
                span.small {
                font-size: 8px;
                text-align:center;
                }
            footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 50px; 

                /** Extra personal styles **/
                /* background-color: #03a9f4; */
                color: black;
                text-align: center;
                line-height: 35px;
            }
        </style>
    </head>
    <body>
            <img class="cop" src="<?= base_url()?>assets/image/pdg.png" alt="" >
            <div style="text-align:center; font-size:13px; font-weight:bold; text-transform: uppercase;">
                Laporan Harian E-dupak<br>
                Bulan <?= is_time_bulan($bulan) ?> <br>
                Kabupaten Padang Pariaman <br>
                <span class="small">Sumber : <?= base_url()?> | Dicetak Pada : <?= date("d F Y", strtotime("now"))."\n"; ?></span>
            </div>
            
            <hr class="style15">

        <table id="table">
            <thead>
                <tr>
                    <th width=1>NO.</th>
                    <th>TANGGAL</th>
                    <th>KEGIATAN / TUGAS</th>
                    <th>Kuantitas</th>   
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($laporan as $rows){?>
                <tr>
                    <td><?php echo $no;  ?></td>
                    <td><?php echo is_time_convert($rows->tgl_input); ?></td>
                    <td><?php echo $rows->uraian_kegiatan; ?></td>
                    <td><?= $rows->kuantitas ?> <?= $rows->satuan_kuantitas ?></td> 
                   
                    <td>
                    <label type="button" class="btn btn-block btn-outline-<?php if($rows->status_periksa=="Ditolak") { echo "danger"; } else if($rows->status_periksa=="Verifikasi Atasan") { echo "success"; } else { echo "primary"; } ?> btn-xs" st><?php echo $rows->status_periksa; ?></label>
                    </td>
                   
                </tr>
                <?php $no++; }?>

            </tbody>
        </table>

        
    </body>
</html>