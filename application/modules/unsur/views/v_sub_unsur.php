
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
                <div class="card-header"> 
                    <label type="button" class="btn btn-block btn-primary btn-sm"><?php echo $unsurroot[0]->unsur; ?> <br>
                    <i class="fa fa-arrow-down"></i>
                    </label>
                </div>
                <div class="card-body">
                <br>
                <table id="rev_penelitian" class="table table-bordered table-striped">

                <thead>
                    <tr>

                        <th width=1>NO.</th>
                        <th>SUB UNSUR KEGIATAN / TUGAS</th>
                        <th width=100></th>

                    </tr>
                </thead>
                <tbody>
                 <?php $no=1; foreach ($unsur as $rows) { ?>
                            <tr align="center">
                              <td><?php echo $no;  ?></td>
                              <td><?php echo $rows->sub_unsur; ?></td>
                              <td>
                                <a href="<?= base_url()?>unsur/sub_sub_unsur/tp/<?= $rows->id_unsur ?>/<?= $rows->id_sub_unsur ?>" title="Tambah Unsur Kegiatan / Tugas" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                <a href="<?= base_url()?>unsur/subunsur/tp/<?= $rows->id_unsur ?>/<?= $rows->id_sub_unsur ?>" title="Edit Data" type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url()?>unsur/<?= $rows->id_unsur ?>" title="Hapus Data" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                  <?php $no++;  } ?>
                </tbody>
                </table>
                <hr>
                <?php if($this->uri->segment(5)==null) { ?>
                <a href="../../<?php base_url()?>tp" class="btn btn btn-warning btn-sm">Kembali <br>
                <i class="fa fa-arrow-left"></i>
                </a>
              <?php } ?>
              </div>
              </div>
              <div class="col-6">
                <form class="form-horizontal" action="<?php if($this->uri->segment(5)!=null) { echo base_url()."unsur/subunsur/edit_unsur"; } else { echo base_url()."unsur/subunsur/tambah_unsur"; } ?>" method="post">
                <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">FORM TAMBAH SUB UNSUR KEGIATAN / TUGAS</h3>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sub Unsur Kegiatan / Tugas</label>
                    <input type="text" class="form-control" name="sub_unsur" placeholder="Sub Unsur Kegiatan / Tugas" value="<?php echo isset ($unsuredit[0]->sub_unsur) ? $unsuredit[0]->sub_unsur:''; ?>">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $this->uri->segment(4); ?>">
                    <input type="hidden" class="form-control" name="id_sub" value="<?php echo $this->uri->segment(5); ?>">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <?php if($this->uri->segment(5)!=null) { ?>
                  <button type="submit" class="btn btn-warning">Perbarui Data</button>
                  <a href="../<?php base_url()?><?php echo $this->uri->segment(4); ?>" class="btn btn-secondary">Batal</a>
                <?php } else { ?>
                  <button type="submit" class="btn btn-info">Simpan Data</button>
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
