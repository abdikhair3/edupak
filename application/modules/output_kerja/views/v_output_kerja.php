
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
              <div class="col-6">

                <table id="rev_penelitian" class="table table-bordered table-striped">

                <thead>
                    <tr>

                        <th width=1>NO.</th>
                        <th>OUTPUT HASIL KERJA</th>
                        <th width=100></th>

                    </tr>
                </thead>
                <tbody>
                 <?php $no=1; foreach ($output_kerja as $rows) { ?>
                            <tr align="center">
                              <td><?php echo $no;  ?></td>
                              <td><?php echo $rows->output_kerja; ?></td>
                              <td>
                                <a href="<?= base_url()?>output_kerja/tp/<?= $rows->id_output_kerja ?>" title="Edit Data" type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url()?>output_kerja/<?= $rows->id_output_kerja ?>" title="Hapus Data" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                  <?php $no++;  } ?>
                </tbody>
                </table>
              </div>
              <div class="col-6">
                <form class="form-horizontal" action="<?php if($this->uri->segment(3)!=null) { echo base_url()."output_kerja/edit_output_kerja"; } else { echo base_url()."output_kerja/tambah_output_kerja"; } ?>" method="post">
                <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">FORM OUTPUT HASIL KERJA</h3>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Output Hasil Kerja</label>
                    <input type="text" class="form-control" name="output_kerja" placeholder="Output Hasil Kerja" value="<?php echo isset ($output_kerja_edit[0]->output_kerja) ? $output_kerja_edit[0]->output_kerja:''; ?>">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $this->uri->segment(3); ?>">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <?php if($this->uri->segment(3)!=null) { ?>
                  <button type="submit" id="tombolloading" class="btn btn-warning">Perbarui Data</button>
                  <a href="../<?php base_url()?>tp" class="btn btn-secondary">Batal</a>
                <?php } else { ?>
                  <button type="submit" id="tombolloading" class="btn btn-info">Simpan Data</button>
                <?php } ?>
                </div>
                <!-- /.card-footer -->
                </div>
                </form>
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