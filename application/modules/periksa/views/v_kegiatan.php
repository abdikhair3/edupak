
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
                  <?php 
                      $this->db->where('id_skp_tahunan_ft', $this->uri->segment(3));
                      $this->db->join('dp_pegawai', 'dp_pegawai.nip = dp_skp_tahunan_ft.nip');
                      $dt_pegawai = $this->db->get('dp_skp_tahunan_ft')->first_row(); ?>
              <div class="col-6">
                <button type="button" class="btn btn-block btn-outline-info btn-sm text-left">NIP PEGAWAI : <?php echo $dt_pegawai->nip; ?></button>
              </div>    
              <div class="col-6">
                <button type="button" class="btn btn-block btn-outline-info btn-sm text-left">NAMA PEGAWAI : <?php echo $dt_pegawai->nama; ?></button>
              </div>    
              <div class="col-12">
                <hr>

                <table id="rev_penelitian" class="table table-bordered table-striped" style="width: 100%;">
                <thead>
                    <tr>

                        <th width=1>NO.</th>
                        <th>KEGIATAN / TUGAS</th>
                        <th>PERIODE</th>
                        <th>TARGET KUANTITAS</th>
                        <th>TARGET ANGKA KREDIT</th>
                        <th width=50></th>

                    </tr>
                </thead>
                <tbody>
                 <?php $no=1; foreach ($tp_ip_tugas as $rows) { ?>
                            <tr align="center">
                              <td><?php echo $no;  ?></td>
                              <td><?php echo $rows->uraian_kegiatan; ?></td>
                              <td><?php echo "$rows->dt_ml - $rows->dt_ak"; ?></td>
                              <td><?php echo $rows->kuantitas; ?></td>
                              <td><?php echo $rows->angka_kredit; ?></td>
                              <td>
                                <form style="float:left" action="<?php echo base_url()."periksa/kegiatan_selesai"; ?>" method="post">
                                  <input type="hidden" name="id_skp" value="<?= $rows->id_skp ?>">
                                  <input type="hidden" name="id" value="<?= $rows->id_skp_tahunan_ft ?>">
                                  <input type="hidden" name="status" value="Diverifikasi Atasan">
                                  <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
                                </form>
                                <form style="float:right;" action="<?php echo base_url()."periksa/kegiatan_selesai"; ?>" method="post">
                                  <input type="hidden" name="id_skp" value="<?= $rows->id_skp ?>">
                                  <input type="hidden" name="id" value="<?= $rows->id_skp_tahunan_ft ?>">
                                  <input type="hidden" name="status" value="Ditolak">
                                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                                </form>
                              </td>
                            </tr>
                  <?php $no++;  } ?>
                </tbody>
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

