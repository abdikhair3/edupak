
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
                <center><h2>
                  Silahkan tekan tombol berikut untuk membuat user otomatis <br>
                  <a href="user_pegawai/tambah_user_auto" class="btn btn-primary" id="tombolloading"><i class="fas fa-plus-circle"></i> <br>Buat User Otomatis</a>
                </h2></center>
              </div>
              <?php $this->db->where('id_unit', $this->session->userdata('id_member'));
                      $unit_ses = $this->db->get('dp_unit')->first_row();

                      $this->db->join('dp_pegawai', 'dp_pegawai.id_pegawai = x_users.id_member');
                      $this->db->where('dp_pegawai.id_unit', $unit_ses->key_unit);
                      $cek_jml_pegawai = $this->db->get('x_users')->num_rows();
                      if($cek_jml_pegawai>=1) { ?>
              <div class="col-12">
                <table id="rev_penelitian" class="table table-bordered table-striped" style="width: 100%;">

                <thead>
                    <tr>

                        <th width=1>NO.</th>
                        <th>NIP</th>
                        <th>NAMA</th>
                        <!-- <th width=100></th> -->

                    </tr>
                </thead>
                <tbody>
                 <?php $no=1; foreach ($user_pegawai as $rows) { ?>
                            <tr align="center">
                              <td><?php echo $no;  ?></td>
                              <td><?php echo "$rows->nip"; ?></td>
                              <td><?php echo "$rows->nama"; ?></td>
                            </tr>
                  <?php $no++;  } ?>
                </tbody>
                </table>
              <?php } ?>
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
