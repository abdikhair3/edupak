
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

                <table id="rev_penelitian" class="table table-bordered table-striped" style="width: 100%;">

                <thead>
                    <tr>
                        <th width=1>NO.</th>
                        <th>NIP</th>
                        <th>NAMA</th>
                        <th>JUMLAH KEGIATAN</th>
                        <th width=100></th>
                    </tr>
                </thead>
                <tbody>
                 <?php $no=1; foreach ($pegawai as $rows) {
                              $this->db->where('id_skp_tahunan_ft', $rows->id_skp_tahunan_ft);
                        $q =  $this->db->get('dp_skp_tahunan')->num_rows(); ?>
                            <tr align="center">
                              <td><?php echo $no;  ?></td>
                              <td><?php echo $rows->nip; ?></td>
                              <td><?php echo $rows->nama; ?></td>
                              <td>
                                <?php echo $q; ?>
                              </td>
                              <td>
                                <a href="<?= base_url()?>periksa/kegiatan/<?= $rows->id_skp_tahunan_ft; ?>" title="Detail" type="button" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></a>
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
 