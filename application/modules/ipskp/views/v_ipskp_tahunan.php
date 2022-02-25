
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
                  <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#skpft">
                  <i class="fas fa-file"></i> Tambah Periode Target Tahunan
                  </button>
                <div class="col-12">
                  <div style="overflow-x:scroll">
                    <table id="rev_penelitian" class="table table-bordered table-striped" style="width: 100%;">

                    <thead>
                        <tr>

                            <th width=1>NO.</th>
                            <th>Periode</th>
                            <th width=100></th>
                            <th width=100></th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach ($tp_periode as $rows) {
                      ?>
                                <tr align="center">
                                  <td><?php echo $no;  ?></td>
                                  <td><?php echo "(".date('d F Y', strtotime($rows->dt_ml)).") - (".date('d F Y', strtotime($rows->dt_ak)).")";  ?></td>
                                  <td>
                                    <a href="<?= base_url()?>Ipskp/ipskp_tahunan/<?= $rows->id_skp_tahunan_ft ?>" title="Tambah Target Tahunan" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                  </td>
                                  <td>
                                    <a href="<?= base_url()?>ipskp/<?= $rows->id_skp_tahunan_ft ?>" title="Hapus Data" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
  

<!-- Modal -->
<div class="modal fade" id="skpmodal" tabindex="-1" role="dialog" aria-labelledby="skpmodalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="skpmodalLabel">Tambah Periode Target Tahunan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="formUraian" action="<?php if($this->uri->segment(3)!=null) { echo base_url()."ipskp/edit_ipskp"; } else { echo base_url()."ipskp/tambah_ipskp"; } ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="thn_input" value="<?php echo $this->input->get('thn_ft'); ?>">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <input type="date" class="form-control" name="dt_ml">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Tanggal Berakhir</label>
                    <input type="date" class="form-control" name="dt_ak">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="sel1">Pilih Kategori :</label>
            <select class="form-control" name="id_kategori_kegiatan" id="kategori_kegiatan" required="required">
              <option value="0"></option>
                <?php
                foreach ($cb_unsur as $value) {
                    echo "<option value='$value->id_kategori_kegiatan'>$value->kategori_kegiatan</option>";
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
        <div class="row" id="tpform">
          <div class="col-sm-2">
            <div class="form-group">
            <label>Kuantitas</label>
            <input type="text" class="form-control hanyaangka" placeholder="0" name="kuantitas" id="kuantitasid" autocomplete="off">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
            <label>Satuan</label>
            <div id="satuankuantitas"></div>
            <!-- <input type="text" class="form-control" placeholder="Satuan" readonly id="satuankuantitas"> -->
            <!-- <select id="satuankuantitas" class="form-control" name="id_uraian_kegiatan" required="required" readonly></select> -->
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
            <label>Angka Kredit</label>
            <div id="angkakredit"></div>
            <!-- <select id="angkakredit" class="form-control" name="angka_kredit" required="required" readonly></select> -->
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
            <label>Target Angka Kredit</label>
            <input type="text" class="form-control" name="totalangkakredit" placeholder="0" readonly id="ttlangkakredit">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
          <?php if($this->uri->segment(3)!=null) { ?>
            <button type="submit" class="btn btn-warning">Perbarui Data</button>
            <a href="../<?php base_url()?>tp" class="btn btn-secondary">Batal</a>
          <?php } else { ?>
            <button type="submit" class="btn btn-info">Simpan Data</button>
            <a href="<?php base_url()?>" class="btn btn-secondary">Batal</a>
          <?php } ?>
      </div>
        </form>
    </div>
  </div>
</div>


<div class="modal fade" id="skpft" tabindex="-1" role="dialog" aria-labelledby="skpmodalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="skpmodalLabel">FORM INPUT SKP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="formUraian" action="<?php if($this->uri->segment(3)!=null) { echo base_url()."ipskp/edit_ipskp"; } else { echo base_url()."ipskp/tambah_ipskp_periode"; } ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="thn_input" value="<?php echo $this->input->get('thn_ft'); ?>">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <input type="date" class="form-control" name="dt_ml">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Tanggal Berakhir</label>
                    <input type="date" class="form-control" name="dt_ak">
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
          <?php if($this->uri->segment(3)!=null) { ?>
            <button type="submit" class="btn btn-warning">Perbarui Data</button>
            <a href="../<?php base_url()?>tp" class="btn btn-secondary">Batal</a>
          <?php } else { ?>
            <button type="submit" class="btn btn-info">Simpan Data</button>
            <a href="<?php base_url()?>" class="btn btn-secondary">Batal</a>
          <?php } ?>
      </div>
        </form>
    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
      document.getElementById('formUraian').reset();
      $("#tpform").hide();
        $("#kategori_kegiatan").change(function(){
            var uraiancek = document.getElementById("uraiankegiatan").value;
            if (uraiancek == "" || uraiancek == null) {
            $("#tpform").hide();
            } else {
            $("#tpform").show();
            }
            var id_kategori_kegiatan = $("#kategori_kegiatan").val();
            $.ajax({
                type: "GET",
                url : "<?php echo base_url();?>ipskp/tp_cb_uraian_tugas",
                data: "id_kategori_kegiatan="+id_kategori_kegiatan,
                success: function(html) {
                    $("#uraiankegiatan").html(html);
                }

            });
        });
        
        $("#uraiankegiatan").change(function(){
          var uraiancek = document.getElementById("uraiankegiatan").value;
          if (uraiancek == "" || uraiancek == null) {
          $("#tpform").hide();
          } else {
          $("#tpform").show();
          $('#kategori_kegiatan').attr('disabled', true);
          }
            var id_uraian_kegiatan = $("#uraiankegiatan").val();
            $.ajax({
                type: "GET",
                url : "<?php echo base_url();?>ipskp/tp_detail",
                data: "id_uraian_kegiatan="+id_uraian_kegiatan,
                success: function(html) {
                    $("#satuankuantitas").html(html);
                    // $('#satuankuantitas).val(result['nama_madrasahx']);
                }

            });
        });
        
        $("#uraiankegiatan").change(function(){
            var id_uraian_kegiatan = $("#uraiankegiatan").val();
            $.ajax({
                type: "GET",
                url : "<?php echo base_url();?>ipskp/tp_detail_angka",
                data: "id_uraian_kegiatan="+id_uraian_kegiatan,
                success: function(html) {
                    $("#angkakredit").html(html);
                    // $('#satuankuantitas).val(result['nama_madrasahx']);
                }

            });
        });

        // $("#kuantitasidvar").change(function(){
        //   var angkakredittpvar = document.getElementById('angkakredittp').value;
        //   var kuantitasidvar = document.getElementById('kuantitasid').value;
        //   var rstotalakhir = parseFloat(kuantitasidvar) * parseFloat(angkakredittpvar);
        //   document.getElementById('ttlangkakredit').value = rstotalakhir;
        // });
        // function cekip7() {
        //   var angkakredittpvar = document.getElementById('angkakredittp').value;
        //   var kuantitasidvar = document.getElementById('kuantitasid').value;
        //   var rstotalakhir = parseFloat(kuantitasidvar) * parseFloat(angkakredittpvar);
        //   document.getElementById('ttlangkakredit').value = rstotalakhir;
        // }

    });

    
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
      $("#kuantitasid").on("keyup change", function(e) {
            var kuantitasid  = $("#kuantitasid").val();
            var angkakredittp = $("#angkakredittp").val();

            var rstotalakhir = parseFloat(kuantitasid) * parseFloat(angkakredittp);
            $("#ttlangkakredit").val(rstotalakhir);
        });
    });
</script>


<script>
$(document).ready(function(){
 $(".hanyaangka").on("input", function(evt) {
   var self = $(this);
   self.val(self.val().replace(/[^0-9]/g, ''));
   if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) 
   {
     evt.preventDefault();
   }
 });

});

</script>