
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
                <!-- <label type="button" class="btn btn-block btn-primary btn-sm"><?php echo $unsurroot[0]->kategori_kegiatan; ?> <br>
                <i class="fa fa-arrow-down"></i>
                </label>
                <label type="button" class="btn btn-block btn-info btn-sm"><b><?php echo $unsurroot[0]->unsur; ?></b> <br>
                <i class="fa fa-arrow-down"></i> 
                </label>
                <label type="button" class="btn btn-block btn-success btn-sm"><?php echo $unsurroot[0]->sub_unsur; ?> <br>
                <i class="fa fa-arrow-down"></i>
                </label>
                <label type="button" class="btn btn-block btn-warning btn-sm"><?php echo $unsurroot[0]->sub_sub_unsur; ?> <br>
                <i class="fa fa-arrow-down"></i>
                </label> -->
                <div class="tree ">
                  <ul style="margin:0; padding:0;">
                    <li><span class="btn btn-block btn-primary" style="text-align:left">&rarr;<a href="#!" style="font-size:14px; color:#000;"> <?php echo $unsurroot[0]->kategori_kegiatan; ?></a></span>
                      <div id="Web" class="collapse show">
                        <ul>
                          <li><span class="btn btn-block btn-info" style="text-align:left">&rarr;<a href="#!" style="font-size:14px; color:#000;"> <?php echo $unsurroot[0]->unsur; ?></a></span>
                            <ul>
                                <li><span class="btn btn-block btn-success" style="text-align:left">&rarr;<a href="#!" style="font-size:14px; color:#000;"> <?php echo $unsurroot[0]->sub_unsur; ?></a></span>
                                  <ul>
                                    <li><span class="btn btn-block btn-warning" style="text-align:left">&rarr;<a href="#!" style="font-size:14px; color:#000;"> <?php echo $unsurroot[0]->sub_sub_unsur; ?></a></span></li>
                                  </ul>
                                </li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </div>
                <br>
              <div style="overflow-x:scroll" >

                <table id="rev_penelitian" class="table table-bordered table-striped" style="width: 100%;">
                <thead>
                    <tr>

                        <th width=1>NO.</th>
                        <th>KATEGORI</th>
                        <th>UNSUR</th>
                        <th>SUB UNSUR</th>
                        <th>BUTIR</th>
                        <th>JENJANG</th>
                        <th>URAIAN KEGIATAN</th>
                        <th>OUTPUT</th>
                        <th>ANGKA KREDIT</th>
                        <th width=100></th>

                    </tr>
                </thead>
                <tbody>
                 <?php $no=1; foreach ($uraian_kegiatan as $rows) { ?>
                            <tr align="center">
                              <td><?php echo $no;  ?></td>
                              <td><?php echo $rows->kategori_kegiatan; ?></td>
                              <td><?php echo $rows->unsur; ?></td>
                              <td><?php echo $rows->sub_unsur; ?></td>
                              <td><?php echo $rows->sub_sub_unsur; ?></td>
                              <td><?php echo $rows->jabatan; ?></td>
                              <td><?php echo $rows->uraian_kegiatan; ?></td>
                              <td><?php echo $rows->output_kerja; ?></td>
                              <td><?php echo $rows->angka_kredit; ?></td>
                              <td>
                                <a href="<?= base_url()?>kegiatan/uraian_kegiatan/tp/<?php echo $this->uri->segment(4); ?>/<?= $rows->id_uraian_kegiatan ?>" title="Edit Data" type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url()?>kegiatan/uraian_kegiatan/<?= $rows->id_uraian_kegiatan ?>" title="Hapus Data" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                  <?php $no++;  } ?>
                </tbody>
                </table>
              </div>
              </div>
              <div class="col-6">
                <form class="form-horizontal" action="<?php if($this->uri->segment(5)!=null) { echo base_url()."kegiatan/uraian_kegiatan/edit_uraian_kegiatan"; } else { echo base_url()."kegiatan/uraian_kegiatan/tambah_uraian_kegiatan"; } ?>" method="post">
                <input type="hidden" class="form-control" name="id" value="<?php echo $this->uri->segment(4); ?>">
                <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">FORM TAMBAH URAIAN TUGAS / KEGIATAN</h3>
                </div>
                <div class="card-body">
                  
                  <div class="form-group">
                      <label for="sel1">Uraian Kegiatan</label>
                      <input type="text" class="form-control" name="uraian_kegiatan" value="<?php echo isset ($uraian_kegiatan_edit[0]->uraian_kegiatan) ? $uraian_kegiatan_edit[0]->uraian_kegiatan:''; ?>">
                      <input type="hidden" class="form-control" name="id_kategori_kegiatan" value="<?php echo $unsurroot[0]->id_kategori_kegiatan; ?>">
                      <input type="hidden" class="form-control" name="id_unsur" value="<?php echo $unsurroot[0]->id_unsur; ?>">
                      <input type="hidden" class="form-control" name="id_sub_unsur" value="<?php echo $unsurroot[0]->id_sub_unsur; ?>">
                      <input type="hidden" class="form-control" name="id_sub_sub_unsur" value="<?php echo $unsurroot[0]->id_sub_sub_unsur; ?>">
                </div>
                  <div class="form-group">
                      <label for="sel1">Pilih Jenjang Jabatan</label>
                      <select class="form-control" name="id_pelaksana_tgs_jabatan">
                          <option value="<?php echo isset ($uraian_kegiatan_edit[0]->id_jabatan) ? $uraian_kegiatan_edit[0]->id_jabatan:''; ?>"><?php echo isset ($uraian_kegiatan_edit[0]->id_jabatan  ) ? $uraian_kegiatan_edit[0]->jabatan:''; ?></option>
                          <?php
                          foreach ($cb_pel_tgs_jabatan as $value) {
                              echo "<option value='$value->id_jabatan'>$value->jabatan</option>";
                          }
                          ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="sel1">Pilih Output Hasil Kerja</label>
                      <select class="form-control" name="id_output_kerja">
                          <option value="<?php echo isset ($uraian_kegiatan_edit[0]->id_output_kerja) ? $uraian_kegiatan_edit[0]->id_output_kerja:''; ?>"><?php echo isset ($uraian_kegiatan_edit[0]->output_kerja) ? $uraian_kegiatan_edit[0]->output_kerja:''; ?></option>
                          <?php
                          foreach ($cb_output_kerja as $value) {
                              echo "<option value='$value->id_output_kerja'>$value->output_kerja</option>";
                          }
                          ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="sel1">Angka Kredit</label>
                      <input type="text" class="form-control allow_decimal" name="angka_kredit" value="<?php echo isset ($uraian_kegiatan_edit[0]->angka_kredit) ? $uraian_kegiatan_edit[0]->angka_kredit:''; ?>">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <?php if($this->uri->segment(5)!=null) { ?>
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
                url : "<?php echo base_url();?>uraian_kegiatan/tp_cb_sub_unsur",
                data: "id_unsur="+id_unsur,
                success: function(html) {
                    $("#subunsur").html(html);
                }

            });
        });
    });

     $(document).ready(function(){
        $("#subunsur").change(function(){
            var id_sub_unsur = $("#subunsur").val();
            $.ajax({
                type: "GET",
                url : "<?php echo base_url();?>uraian_kegiatan/tp_cb_sub_sub_unsur",
                data: "id_sub_unsur="+id_sub_unsur,
                success: function(html) {
                    $("#subsubunsur").html(html);
                }

            });
        });
    });
    </script>

    <script>
$(document).ready(function(){


 $(".allow_decimal").on("input", function(evt) {
   var self = $(this);
   self.val(self.val().replace(/[^0-9\.]/g, ''));
   if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) 
   {
     evt.preventDefault();
   }
 });

});

</script>