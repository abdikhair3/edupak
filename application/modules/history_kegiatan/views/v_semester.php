
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
                <form method="get" action="<?= base_url()?>history_kegiatan/semester">
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
                          $semester=$this->input->get('semester');
                          //$bulan = isset ($bln_cari) ? $bln_cari:''; ?>
                            <select name="semester" class="form-control select2" style="width: 100%;">
                            <option selected="selected">Pilih Semester</option>
                            <option value="01" <?php if($semester=="1"){echo "selected";} ?> >Ganjil</option>
                            <option value="02" <?php if($semester=="2"){echo "selected";} ?> >Genap</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                      <button type="submit" class="btn btn-block btn-info">Cari</button>
                    </div>
                    </form>
                <table border="1" width="100%">
                    <tr align="center" style="text-transform: uppercase; font-weight:bold;">
                        <td width=1 rowspan="2">NO.</td>
                        <td rowspan="2">URAIAN KREDIT</td>
                        <td rowspan="2">SATUAN HASIL</td>
                        <td colspan="6">VOLUME KEGIATAN BULANAN</td>
                        <td rowspan="2">JUMLAH VOLUME KEGIATAN</td>
                        <td rowspan="2">ANGKA KREDIT</td>
                        <td rowspan="2">JUMLAH ANGKA KREDIT</td>
                        <td rowspan="2">KETERANGAN / BUKTI FISIK</td>
                    </tr>
                    <tr align="center" style="text-transform: uppercase; font-weight:bold;">
                      <?php if($semester=="1") {  ?>
                        <td>JAN</td>
                        <td>FEB</td>
                        <td>MAR</td>
                        <td>APR</td>
                        <td>MEI</td>
                        <td>JUN</td>
                      <?php } else if($semester=="2") { ?>
                        <td>JUL</td>
                        <td>AGU</td>
                        <td>SEP</td>
                        <td>OKT</td>
                        <td>NOV</td>
                        <td>DES</td>
                      <?php } ?>
                    </tr>
                    <?php $no=1; 
                          $thn_ft=$this->input->get('tahun');
                          foreach ($history_semester as $rows) {
                       ?>
                    <tr>
                        <td align="center"><?php echo $no;  ?></td>
                        <td><?php echo $rows->uraian_kegiatan; ?></td>
                        <td align="center"><?php echo $rows->satuan_kuantitas; ?></td>
                        <?php if($semester=="1") {                                  
                          for ($x = 1; $x <= 6; $x++) { ?>
                        <td align="center">
                                <?php 
                                $this->db->where('MONTH(tgl_input)',$x);
                                $this->db->where('YEAR(tgl_input)',$thn_ft);
                                $this->db->where('nip', $rows->nip);
                                $this->db->where('id_uraian_kegiatan', $rows->id_uraian_kegiatan);
                                echo $jml_kegiatan = $this->db->get('dp_tugas')->num_rows(); ?>
                        </td>
                          <?php } ?>
                        <?php } else if($semester=="2") { ?>
                          <?php for ($x = 6; $x <= 6; $x++) { ?>
                        <td align="center">
                                <?php 
                                $this->db->where('MONTH(tgl_input)',$x);
                                $this->db->where('YEAR(tgl_input)',$thn_ft);
                                $this->db->where('nip', $rows->nip);
                                $this->db->where('id_uraian_kegiatan', $rows->id_uraian_kegiatan);
                                echo $jml_kegiatan = $this->db->get('dp_tugas')->num_rows(); ?>
                        </td>
                          <?php } ?>
                        <?php } ?>
                        <td align="center">
                              <?php
                                $this->db->where('nip', detail_pegawai()->nip);
                              $this->db->where('dp_tugas.id_uraian_kegiatan', $rows->id_uraian_kegiatan);
                              $this->db->where('status_periksa', 'Diverifikasi Atasan');
                              $this->db->where('semester', $rows->semester);            
                              $this->db->where('YEAR(tgl_input)', $thn_ft);  
                              echo $jmltgs = $this->db->get('dp_tugas')->num_rows();
                              ?>
                        </td>
                        <td align="center"><?php echo $rows->angka_kredit; ?></td>
                        <td align="center">
                          <?php
                          $this->db->select_sum('angka_kredit');
                          $this->db->where('semester', $rows->semester);            
                          $this->db->where('YEAR(tgl_input)', $thn_ft);  
                          $this->db->where('dp_uraian_kegiatan.id_uraian_kegiatan', $rows->id_uraian_kegiatan);
                          $this->db->join('dp_uraian_kegiatan', 'dp_uraian_kegiatan.id_uraian_kegiatan = dp_tugas.id_uraian_kegiatan');
                          $sum_angka_kredit = $this->db->get('dp_tugas')->first_row();
                          echo round($sum_angka_kredit->angka_kredit,4);
                          ?>
                        </td>
                    </tr>
                    <?php $no++; } ?>
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
