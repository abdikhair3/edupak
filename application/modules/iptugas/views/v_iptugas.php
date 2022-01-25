
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
              <div style="overflow-x:scroll">
                <table id="rev_penelitian" class="table table-bordered table-striped" style="width: 100%;">

                <thead>
                    <tr>

                        <th width=1>NO.</th>
                        <th>KEGIATAN / TUGAS</th>
                        <th>TANGGAL</th>
                        <th>BUKTI</th>
                        <th>STATUS</th>
                        <th width=100></th>

                    </tr>
                </thead>
                <tbody>
                 <?php $no=1; foreach ($tp_ip_tugas as $rows) { ?>
                            <tr align="center">
                              <td><?php echo $no;  ?></td>
                              <td><?php echo $rows->uraian_kegiatan; ?></td>
                              <td><?php echo $rows->tgl_input; ?></td>
                              <td>
                                  <a href="<?= base_url()?>assets/bukti/<?php echo $rows->file_bukti; ?>" target="_blank" class="btn btn-default btn-sm"><i class="nav-icon fas fa-file"></i></a>
                              </td>
                              <td>
                                <label type="button" class="btn btn-block btn-outline-primary btn-xs" st><?php echo $rows->status_periksa; ?></label>
                              </td>
                              <td>
                                <a href="<?= base_url()?>iptugas/<?= $rows->id_uraian_kegiatan ?>" title="Hapus Data" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                  <?php $no++;  } ?>
                </tbody>
                </table>
              </div>
              </div>
              <div class="col-6">
                <form class="form-horizontal" action="<?php if($this->uri->segment(3)!=null) { echo base_url()."iptugas/edit_iptugas"; } else { echo base_url()."iptugas/tambah_iptugas"; } ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $this->uri->segment(3); ?>">
                <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">FORM TUGAS / KEGIATAN</h3>
                </div>
                <div class="card-body">
                  <div class="form-group">
                      <label for="sel1">Tanggal Kegiatan / Tugas</label>
                      <input type="date" class="form-control" name="tgl_input" value="" required="required">
                  </div>
                  <div class="form-group">
                      <label for="sel1">Pilih Unsur Kegiatan / Tugas:</label>
                      <select class="form-control" name="id_unsur" id="unsur" required="required">
                        <option value="0"></option>
                          <?php
                          foreach ($cb_unsur as $value) {
                              echo "<option value='$value->id_unsur'>$value->unsur</option>";
                          }
                          ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="sel1">Pilih Uraian Kegiatan</label>
                      <!-- <select class="form-control" name="id_uraian_kegiatan" id="uraiankegiatan">
                          <option value="0"></option>
                      </select> -->
                      <select id="uraiankegiatan" class="form-control" name="id_uraian_kegiatan" required="required"></select>
                  </div>
                  <div class="form-group">
                      <label for="sel1">Bukti Tugas / Kegiatan</label>
                      <input type="file" class="form-control" name="bukti" value="" style="font-size: 12px;" required="required">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <?php if($this->uri->segment(3)!=null) { ?>
                  <button type="submit" class="btn btn-warning">Perbarui Data</button>
                  <a href="../<?php base_url()?>tp" class="btn btn-secondary">Batal</a>
                <?php } else { ?>
                  <button type="submit" class="btn btn-info">Simpan Data</button>
                  <a href="<?php base_url()?>" class="btn btn-secondary">Reset</a>
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

<script type="text/javascript">
    $(document).ready(function(){
        $("#unsur").change(function(){
            var id_unsur = $("#unsur").val();
            $.ajax({
                type: "GET",
                url : "<?php echo base_url();?>iptugas/tp_cb_uraian_tugas",
                data: "id_unsur="+id_unsur,
                success: function(html) {
                    $("#uraiankegiatan").html(html);
                }

            });
        });
    });
    </script>