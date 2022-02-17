

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
                        <th>KATEGORI / TUGAS KEGIATAN</th>
                        <th width=100></th>

                    </tr>
                </thead>
                <tbody>
                 <?php $no=1; foreach ($kategori as $rows) { ?>
                            <tr align="center">
                              <td><?php echo $no;  ?></td>
                              <td><?php echo $rows->kategori_kegiatan; ?></td>
                              <td>
                                <a href="<?= base_url()?>kegiatan/unsur/tp/<?= $rows->id_kategori_kegiatan ?>" title="Tambah Unsur Kegiatan / Tugas" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                <a href="<?= base_url()?>kegiatan/tp/<?= $rows->id_kategori_kegiatan ?>" title="Edit Data" type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url()?>kegiatan/<?= $rows->id_kategori_kegiatan ?>" title="Hapus Data" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                  <?php $no++;  } ?>
                </tbody>
                </table>
              </div>
              <div class="col-6">
                <form class="form-horizontal" action="<?php if($this->uri->segment(3)!=null) { echo base_url()."kegiatan/edit_kategori"; } else { echo base_url()."kegiatan/tambah_kategori"; } ?>" method="post">
                <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">FORM TAMBAH KATEGORI KEGIATAN TUGAS</h3>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Kegiatan / Tugas</label>
                    <input type="text" class="form-control" name="kategori" placeholder="Kategori Kegiatan / Tugas" value="<?php echo isset ($kategoriedit[0]->kategori_kegiatan) ? $kategoriedit[0]->kategori_kegiatan:''; ?>">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $this->uri->segment(3); ?>">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  
                  <?php if($this->uri->segment(3)!=null) { ?>
                  <button type="submit" class="btn btn-warning">Perbarui Data</button>
                  <a href="../<?php base_url()?>tp" class="btn btn-secondary">Batal</a>
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
