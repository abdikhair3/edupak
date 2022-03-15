
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0"><?= $description ?></h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?= $breadcrumbs ?>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
        <div class="row">
          <div class="col-12">

            <div class="card">
              <!-- /.card-header -->

              <div class="card-body">
              <div class="row">
              <div class="col-12">
              <form method="get" action="<?= base_url()?>history_kegiatan/bulanan">
                  <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <select name="tahun" class="form-control select2" style="width: 100%;">
                            <option value="" selected="selected">Pilih Tahun </option>
                            <?php foreach($tahun as $rows){
                              $ps_tahun=explode("-", $rows->tgl_input); ?>
                            <option value="<?= $ps_tahun[0]; ?>" <?php if($this->input->get('tahun')==$ps_tahun[0]){echo "selected";} ?> ><?= $ps_tahun[0]; ?></option>
                            <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                          <?php 
                          $bulan=$this->input->get('bulan');
                          //$bulan = isset ($bln_cari) ? $bln_cari:''; ?>
                            <select name="bulan" class="form-control select2" style="width: 100%;">
                            <option selected="selected">Pilih Bulan</option>
                            <option value="01" <?php if($bulan=="01"){echo "selected";} ?> >Januari</option>
                            <option value="02" <?php if($bulan=="02"){echo "selected";} ?> >Februari</option>
                            <option value="03" <?php if($bulan=="03"){echo "selected";} ?> >Maret</option>
                            <option value="04" <?php if($bulan=="04"){echo "selected";} ?> >April</option>
                            <option value="05" <?php if($bulan=="05"){echo "selected";} ?> >Mei</option>
                            <option value="06" <?php if($bulan=="06"){echo "selected";} ?> >Juni</option>
                            <option value="07" <?php if($bulan=="07"){echo "selected";} ?> >Juli</option>
                            <option value="08" <?php if($bulan=="08"){echo "selected";} ?> >Agustus</option>
                            <option value="09" <?php if($bulan=="09"){echo "selected";} ?> >September</option>
                            <option value="10" <?php if($bulan=="10"){echo "selected";} ?> >Oktober</option>
                            <option value="11" <?php if($bulan=="11"){echo "selected";} ?> >November</option>
                            <option value="12" <?php if($bulan=="12"){echo "selected";} ?> >Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                      <button type="submit" class="btn btn-block btn-info">Cari</button>
                    </div>
                    </form>
                <table border="1" width="100%">
                    <!-- <tr>
                        <td width=1></td>
                        <td>Nama</td>
                        <td align="center" width=1>:</td>
                        <td colspan="31"></td>
                    </tr>
                    <tr>
                        <td width=1></td>
                        <td>NIP</td>
                        <td align="center" width=1>:</td>
                        <td colspan="31"></td>
                    </tr>
                    <tr>
                        <td width=1></td>
                        <td>Pangkat / Golongan</td>
                        <td align="center" width=1>:</td>
                        <td colspan="31"></td>
                    </tr>
                    <tr>
                        <td width=1></td>
                        <td>Jabatan</td>
                        <td align="center" width=1>:</td>
                        <td colspan="31"></td>
                    </tr> -->
                    <tr align="center" style="text-transform: uppercase; font-weight:bold;">
                        <td width=1>NO.</td>
                        <td>URAIAN KREDIT</td>
                        <td>SATUAN HASIL</td>
                        <td>JUMLAH VOLUME</td>
                        <td>ANGKA KREDIT</td>
                        <td>JUMLAH ANGKA KREDIT</td>
                        <td>KETERANGAN / BUKTI FISIK</td>
                    </tr>
                    <?php
                          $thn_now=date('Y');
                          $no=1; foreach ($history_bulanan as $rows) {
                          $this->db->select_sum('angka_kredit');
                          $this->db->where('semester', $rows->semester);            
                          $this->db->where('YEAR(tgl_input)', $thn_now);  
                          $this->db->where('dp_uraian_kegiatan.id_uraian_kegiatan', $rows->id_uraian_kegiatan);
                          $this->db->join('dp_uraian_kegiatan', 'dp_uraian_kegiatan.id_uraian_kegiatan = dp_tugas.id_uraian_kegiatan');
                          $sum_angka_kredit = $this->db->get('dp_tugas')->first_row();
                          

                          $bln_now=date('m');
                          $bln_now_con=(int)$bln_now;
                          if($bln_now_con<=6) { $semester=1; } else { $semester=2; }
                          $thn_now=date('Y');

                          $this->db->where('nip', detail_pegawai()->nip);
                          $this->db->where('dp_tugas.id_uraian_kegiatan', $rows->id_uraian_kegiatan);
                          $this->db->where('status_periksa', 'Diverifikasi Atasan');  
                          $this->db->where('YEAR(tgl_input)', $thn_now);     
                          $this->db->where('MONTH(tgl_input)', $this->input->get('bulan'));
                          $jmltgs = $this->db->get('dp_tugas')->num_rows();

                          // $sum_angka_kredit=$jmltgs*$rows->angka_kredit;
                       ?>
                      <tr>
                        <td align="center"><?php echo $no;  ?></td>
                        <td><?php echo $rows->uraian_kegiatan; ?></td>
                        <td align="center"><?php echo $rows->satuan_kuantitas; ?></td>
                        <td align="center"><?php echo $jmltgs; ?></td>
                        <td align="center"><?php echo $rows->angka_kredit; ?></td>
                        <td align="center"><?php echo round($sum_angka_kredit->angka_kredit,4); ?></td>
                        <td></td>
                      </tr>
                      <?php $no++; } ?>
                </table>
              </div>
              
              </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- TESSSSS -->
