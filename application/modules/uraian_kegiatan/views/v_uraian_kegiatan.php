
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
              <div style="overflow:scroll" >

                <table id="rev_penelitian" class="table table-bordered table-striped" style="width: 100%;">

                <thead>
                    <tr>

                        <th width=1>NO.</th>
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
                              <td><?php echo $rows->unsur; ?></td>
                              <td><?php echo $rows->sub_unsur; ?></td>
                              <td><?php echo $rows->sub_sub_unsur; ?></td>
                              <td><?php echo $rows->pelaksana_tgs_jabatan; ?></td>
                              <td><?php echo $rows->uraian_kegiatan; ?></td>
                              <td><?php echo $rows->output_kerja; ?></td>
                              <td><?php echo $rows->angka_kredit; ?></td>
                              <td>
                                <a href="<?= base_url()?>uraian_kegiatan/tp/<?= $rows->id_uraian_kegiatan ?>" title="Edit Data" type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url()?>uraian_kegiatan/<?= $rows->id_uraian_kegiatan ?>" title="Hapus Data" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                  <?php $no++;  } ?>
                </tbody>
                </table>
              </div>
              </div>
              <div class="col-6">
                <form class="form-horizontal" action="<?php if($this->uri->segment(3)!=null) { echo base_url()."uraian_kegiatan/edit_uraian_kegiatan"; } else { echo base_url()."uraian_kegiatan/tambah_uraian_kegiatan"; } ?>" method="post">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $this->uri->segment(3); ?>">
                <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">FORM TAMBAH URAIAN TUGAS / KEGIATAN</h3>
                </div>
                <div class="card-body">
                  <div class="form-group">
                      <label for="sel1">Pilih Unsur Kegiatan / Tugas:</label>
                      <select class="form-control" name="id_unsur" id="unsur">
                        <option value="<?php echo isset ($uraian_kegiatan_edit[0]->id_unsur) ? $uraian_kegiatan_edit[0]->id_unsur:''; ?>"><?php echo isset ($uraian_kegiatan_edit[0]->unsur) ? $uraian_kegiatan_edit[0]->unsur:''; ?></option>
                          <?php
                          foreach ($cb_unsur as $value) { ?>
                             <option value='<?php echo $value->id_unsur; ?>'><?php echo $value->unsur; ?></option>";
                          <?php } ?>
                      </select>
                  </div>

                  <div class="form-group">
                      <label for="sel1">Pilih Sub Unsur Kegiatan / Tugas</label>
                      <!-- <select class="form-control" name="id_sub_unsur" id="subunsur">
                          <option value="<?php echo isset ($uraian_kegiatan_edit[0]->id_sub_unsur) ? $uraian_kegiatan_edit[0]->id_sub_unsur:''; ?>"><?php echo isset ($uraian_kegiatan_edit[0]->sub_unsur) ? $uraian_kegiatan_edit[0]->sub_unsur:''; ?></option>
                      </select> -->
                      <select id="subunsur" class="form-control" name="id_sub_unsur" required=""></select>
                  </div>
                  <div class="form-group">
                      <label for="sel1">Pilih Butir Kegiatan / Tugas</label>
                      <!-- <select class="form-control" name="id_sub_sub_unsur" id="subsubunsur">
                          <option value="<?php echo isset ($uraian_kegiatan_edit[0]->id_sub_sub_unsur) ? $uraian_kegiatan_edit[0]->id_sub_sub_unsur:''; ?>"><?php echo isset ($uraian_kegiatan_edit[0]->sub_sub_unsur) ? $uraian_kegiatan_edit[0]->sub_sub_unsur:''; ?></option>
                      </select> -->
                      <select id="subsubunsur" class="form-control" name="id_sub_sub_unsur" required=""></select>
                  </div>
                  <div class="form-group">
                      <label for="sel1">Pilih Jenjang Pel. Tgs Jabatan</label>
                      <select class="form-control" name="id_pelaksana_tgs_jabatan">
                          <option value="<?php echo isset ($uraian_kegiatan_edit[0]->id_pelaksana_tgs_jabatan) ? $uraian_kegiatan_edit[0]->id_pelaksana_tgs_jabatan:''; ?>"><?php echo isset ($uraian_kegiatan_edit[0]->pelaksana_tgs_jabatan) ? $uraian_kegiatan_edit[0]->pelaksana_tgs_jabatan:''; ?></option>
                          <?php
                          foreach ($cb_pel_tgs_jabatan as $value) {
                              echo "<option value='$value->id_pelaksana_tgs_jabatan'>$value->pelaksana_tgs_jabatan</option>";
                          }
                          ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="sel1">Uraian Kegiatan</label>
                      <input type="text" class="form-control" name="uraian_kegiatan" value="<?php echo isset ($uraian_kegiatan_edit[0]->uraian_kegiatan) ? $uraian_kegiatan_edit[0]->uraian_kegiatan:''; ?>">
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
                      <input type="text" class="form-control" name="angka_kredit" value="<?php echo isset ($uraian_kegiatan_edit[0]->angka_kredit) ? $uraian_kegiatan_edit[0]->angka_kredit:''; ?>">
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