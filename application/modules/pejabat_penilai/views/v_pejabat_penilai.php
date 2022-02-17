
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
                        <th>PEGAWAI</th>
                        <th>PEJABAT PENILAI</th>
                        <th width=100></th>

                    </tr>
                </thead>
                <tbody>
                 <?php $no=1; foreach ($pejabat_penilai as $rows) {
                        $this->db->where('nip', $rows->nip_pegawai);
                        $pegawai = $this->db->get('dp_pegawai')->first_row();
                        $this->db->where('nip', $rows->nip_penilai);
                        $penialai = $this->db->get('dp_pegawai')->first_row(); ?>
                            <tr align="center">
                              <td><?php echo $no;  ?></td>
                              <td><?php echo "($pegawai->nip) <br> $pegawai->nama"; ?></td>
                              <td><?php echo "($penialai->nip) <br> $penialai->nama"; ?></td>
                              <td>
                                <a href="<?= base_url()?>pejabat_penilai/tp/<?= $rows->id_pejabat_penilai ?>" title="Edit Data" type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url()?>pejabat_penilai/<?= $rows->id_pejabat_penilai ?>" title="Hapus Data" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                  <?php $no++;  } ?>
                </tbody>
                </table>
              </div>
              </div>
              <div class="col-6">
                <form class="form-horizontal" action="<?php if($this->uri->segment(3)!=null) { echo base_url()."pejabat_penilai/edit_pejabat_penilai"; } else { echo base_url()."pejabat_penilai/tambah_pejabat_penilai"; } ?>" method="post">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $this->uri->segment(3); ?>">
                <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">FORM PEJABAT PENILAI</h3>
                </div>
                <div class="card-body">
                  <div class="form-group">
                      <label for="sel1">Pilih Pegawai :</label>
                      <select class="form-control" name="nip_pegawai" id="pegawai">
                        <option ></option>
                          <?php
                          foreach ($cb_pegawai->result() as $value) { ?>
                             <option value='<?php echo $value->nip; ?>'><?php  echo $value->nama; echo " - "; echo $value->nip; ?></option>";
                          <?php } ?>
                      </select>
                  </div>

                  <div class="form-group">
                      <label for="sel1">Pilih Pejabat Penilai :</label>
                      <!-- <select class="form-control" name="id_penilai" id="pejabatpenilai">
                          <option value="<?php echo isset ($uraian_kegiatan_edit[0]->id_sub_unsur) ? $uraian_kegiatan_edit[0]->id_sub_unsur:''; ?>"><?php echo isset ($uraian_kegiatan_edit[0]->sub_unsur) ? $uraian_kegiatan_edit[0]->sub_unsur:''; ?></option>
                      </select> -->
                      <select id="pejabatpenilai" class="form-control" name="nip_penilai" required=""></select>
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
        $("#pegawai").change(function(){
            var nip_pegawai = $("#pegawai").val();
            $.ajax({
                type: "GET",
                url : "<?php echo base_url();?>pejabat_penilai/tp_cb_pejabat_penilai",
                data: "nip_pegawai="+nip_pegawai,
                success: function(html) {
                    $("#pejabatpenilai").html(html);
                }

            });
        });
    });
    </script>