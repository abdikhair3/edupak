<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0"><?= $description ?></h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?= $breadcrumbs ?>
            </ol>
          </div>
        </div>
      </div>
    </div>
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card">
            <?= $this->session->userdata('notifikasi_line'); ?>
              <div class="card-body">
              
              <div class="row">
              
                <div class="col-md-12">
                
                  <form class="form-horizontal" action="<?= base_url()?>iptugas/simpan_laporan" method="post" enctype="multipart/form-data">
                  <div class="card">
                    <div class="card-header bg-secondary ">
                      <h5 class="card-title">Form Laporan Harian</h5>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
  
  
                          <label class="col-form-label" for="inputError">Tanggal Kegiatan / Tugas</label>
  
                          <input type="date" class="form-control is-invalid" id="inputError" name="tanggal">
                      
                          <label for="sel1">Pilih Unsur Kegiatan / Tugas:</label>
                          <select class="form-control" name="id_unsur" id="unsur">
                            <option value="0"></option>
                              <?php
                              foreach ($cb_unsur as $value) {
                                  echo "<option value='$value->id_unsur'>$value->unsur</option>";
                              }
                              ?>
                          </select>
                          <label for="sel1">Pilih Uraian Kegiatan</label>
                          <!-- <select class="form-control" name="id_uraian_kegiatan" id="uraiankegiatan">
                              <option value="0"></option>
                          </select> -->
                          <select id="uraiankegiatan" class="form-control" name="id_uraian_kegiatan"></select>
    
                          <label for="sel1">Bukti Tugas / Kegiatan</label>
                          <input type="file" class="form-control" name="bukti" value="" style="font-size: 12px;">
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="row">
                        <div class="col-sm-3 col-6">
                          <button type="submit" class="btn btn-info">Simpan Data</button>
                          <a href="<?php base_url()?>" class="btn btn-secondary">Reset</a>
                        </div>
                      </div>
                    </div>
                        
                  </div>
                </div>
              </div>
              </form>

                <div class="row">
                  <div class="col-12">
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
                                <label type="button" class="btn btn-block btn-outline-<?php if($rows->status_periksa=="Ditolak") { echo "danger"; } else if($rows->status_periksa=="Diverifikasi Atasan") { echo "success"; } else { echo "primary"; } ?> btn-xs" st><?php echo $rows->status_periksa; ?></label>
                              </td>
                              <td>
                              <?php if($rows->status_periksa=="Diperiksa Atasan") { ?>
                                <a href="<?= base_url()?>iptugas/<?= $rows->id_uraian_kegiatan ?>" title="Hapus Data" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                              <?php } else { echo "-"; } ?>
                              </td>
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