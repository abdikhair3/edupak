
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
                <div >
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
                    </tr>
                    <tr>
                        <td width=1></td>
                        <td>Bulan Kegiatan</td>
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
