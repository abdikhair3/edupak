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
                          <input type="date" class="form-control <?php if(form_error('tanggal')){echo "is-invalid";}?>" id="tggl_kegiatan"  onchange="kredit(this)" name="tanggal">
                          <div class="invalid-feedback"><?= form_error('name') ?></div>
                          <label for="sel1">Pilih Uraian Kegiatan</label>
                          <select id="form_kegiatan" class="form-control <?php if(form_error('id_uraian_kegiatan')){echo "is-invalid";}?>" name="id_uraian_kegiatan"  onchange="keg_get(this)" >
                          </select>
                          <label for="sel1">Output Kerja</label>
                          <input id="outputkerja" type="text" class="form-control" value="" style="font-size: 12px;" disabled>
                          </select>
                          <label for="sel1">Bukti Tugas / Kegiatan</label>
                          <input type="file" class="form-control" name="bukti" value="" style="font-size: 12px;">
                          <div class="row">
                            <div class="col-md-4">
                              <label for="sel1">Kuantitas</label>
                              <input type="text" class="form-control <?php if(form_error('kuantitas')){echo "is-invalid";}?>" name="kuantitas" style="font-size: 12px;">
                            </div>
                            <div class="col-md-8">
                              <label for="sel1">Satuan</label>
                              <input id="satuan" type="text" class="form-control" name="satuan" value="" style="font-size: 12px;" disabled>
                            </div>
                          </div>
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
                      <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width=1>NO.</th>
                                <th>TANGGAL</th>
                                <th>KEGIATAN / TUGAS</th>
                                <th>Kuantitas</th>   
                                <th>BUKTI</th>
                                <th>STATUS</th>
                                <th width=100>Aksi</th>
                            </tr>
                        </thead>
                          <tbody>
                          <?php $no=1; foreach ($tp_ip_tugas as $rows) { ?>
                            <tr align="center">
                              <td><?php echo $no;  ?></td>
                              <td><?php echo is_time_convert($rows->tgl_input); ?></td>
                              <td><?php echo $rows->uraian_kegiatan; ?></td>
                              <td><?= $rows->kuantitas ?> <?= $rows->satuan_kuantitas ?></td> 
                              <td>
                                <?php if($rows->file_bukti != null){?>
                                  <a href="<?= base_url()?>assets/bukti/<?php echo $rows->file_bukti; ?>" target="_blank" class="btn btn-default btn-sm"><i class="nav-icon fas fa-file"></i></a>
                                <?php }else{ echo "-";}?>
                              </td>
                              <td>
                                <label type="button" class="btn btn-block btn-outline-<?php if($rows->status_periksa=="Ditolak") { echo "danger"; } else if($rows->status_periksa=="Diverifikasi Atasan") { echo "success"; } else { echo "primary"; } ?> btn-xs" st><?php echo $rows->status_periksa; ?></label>
                              </td>
                              <td>
                              <?php if($rows->status_periksa=="Diperiksa Atasan") { ?>
                                <a onclick="return confirm('Are You Sure ?')" href="<?= base_url()?>iptugas/hapus_tugas/<?= $rows->id_tugas ?>" title="Hapus Data" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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