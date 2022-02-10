
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

                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#skpmodal">
                <i class="fas fa-file"></i> INPUT SKP TAHUNAN
                </button>
              <div class="row">
              <div class="col-12">
              <div style="overflow-x:scroll">
                <table id="rev_penelitian" class="table table-bordered table-striped" style="width: 100%;">

                <thead>
                    <tr>

                        <th width=1>NO.</th>
                        <th>KEGIATAN / TUGAS</th>
                        <th>TARGET KUANTITAS</th>
                        <th>TARGET ANGKA KREDIT</th>
                        <th>STATUS</th>
                        <th width=100></th>

                    </tr>
                </thead>
                <tbody>
                 <?php $no=1; foreach ($tp_ip_tugas as $rows) { ?>
                            <tr align="center">
                              <td><?php echo $no;  ?></td>
                              <td><?php echo $rows->uraian_kegiatan; ?></td>
                              <td><?php echo "$rows->kuantitas $rows->satuan_kuantitas"; ?></td>
                              <td><?php echo $rows->ttl_angkakredit; ?></td>
                              <td>
                                <label type="button" class="btn btn-block btn-outline-<?php if($rows->status_periksa=="Ditolak") { echo "danger"; } else if($rows->status_periksa=="Diverifikasi Atasan") { echo "success"; } else { echo "primary"; } ?> btn-xs" st><?php echo $rows->status_periksa; ?></label>
                              </td>
                              <td>
                              <?php if($rows->status_periksa=="Diperiksa Atasan") { ?>
                                <a href="<?= base_url()?>ipskp/<?= $rows->id_uraian_kegiatan ?>" title="Hapus Data" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
  

<!-- Modal -->
<div class="modal fade" id="skpmodal" tabindex="-1" role="dialog" aria-labelledby="skpmodalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="skpmodalLabel">FORM INPUT SKP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="formUraian" action="<?php if($this->uri->segment(3)!=null) { echo base_url()."ipskp/edit_ipskp"; } else { echo base_url()."ipskp/tambah_ipskp"; } ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="id" value="<?php echo $this->uri->segment(3); ?>">
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