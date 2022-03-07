
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
                  <div style="overflow-x:scroll">
                    <table id="rev_penelitian" class="table table-bordered table-striped" style="width: 100%;">

                    <thead>
                        <tr>

                            <th width=1>NO.</th>
                            <th>KEGIATAN / TUGAS</th>
                            <th>TARGET KUANTITAS</th>
                            <th>REALiSASI</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach ($realisasi as $rows) {
                      $this->db->where('id_dp_kuantitas', $rows->id_dp_kuantitas);
                      $satuan = $this->db->get('dp_kuantitas')->first_row();
                      $this->db->where('status_periksa', "Diverifikasi Atasan");
                      $this->db->where('id_dp_kuantitas', $rows->id_dp_kuantitas);
                      $real = $this->db->get('dp_kuantitas')->num_rows();
                      ?>
                                <tr align="center">
                                  <td><?php echo $no;  ?></td>
                                  <td><?php echo $rows->uraian_kegiatan; ?></td>
                                  <td><?php echo "$rows->kuantitas "; echo $satuan->satuan_kuantitas; ?></td>
                                  <td><?php echo $real; echo $satuan->satuan_kuantitas;?></td>
                                </tr>
                      <?php $no++;  } ?>
                    </tbody>
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
  
