
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
                <form method="get" action="<?= base_url()?>history_kegiatan/harian">
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
                   <!--  <tr>
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
                    <tr align="center">
                        <td width=1 rowspan="2">No.</td>
                        <td rowspan="2">Uraian Kegiatan</td>
                        <td colspan="33">Tanggal</td>
                    </tr>
                    <tr align="center">
                      <?php
                      $bln=date('m');
                      $thn=date('y');
                      $jml_hari = cal_days_in_month(CAL_GREGORIAN, $bln, $thn);
                        for ($x = 1; $x <= $jml_hari; $x++) { ?>
                        <td align="center" width="20"><?php echo $x; ?></td>
                      <?php } ?> 
                      <td>Jumlah</td>
                    </tr>
                      <?php $no=1; foreach ($history_harian as $rows) {
                          $psh_tgl=explode("-", $rows->tgl_input)
                       ?>
                    <tr>
                        <td align="center"><?php echo $no;  ?></td>
                        <td><?php echo $rows->uraian_kegiatan; ?></td>
                        <?php $jml_hari = cal_days_in_month(CAL_GREGORIAN, $bln, $thn);
                              for ($x = 1; $x <= $jml_hari; $x++) { ?>
                        <td align="center"><?php  if($psh_tgl[2]==$x) { echo "&check;"; } ?></td>
                      <?php } 
                        $this->db->where('tgl_input', $rows->tgl_input);
                        $this->db->where('nip', $rows->nip);
                        $jml_kegiatan_harian = $this->db->get('dp_tugas')->num_rows();
                        ?>
                        <td align="center"><?php echo $jml_kegiatan_harian ?></td>
                    </tr>
                      <?php $no++; } ?>
                <tr>
                    <td colspan="2" align="center">Paraf Atasan Langsung</td>
                </tr>
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
