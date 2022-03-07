
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
              <div class="input-group mb-3 col-8">
                  <input type="text" class="form-control rounded-0" disabled value="Silahkan Pilih Periode ">
                  <span class="input-group-append">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                          Periode
                          ( <?php  
                    $this->db->where('id_skp_tahunan_ft', $this->uri->segment(3));
                     $dt_tanggal = $this->db->get('dp_skp_tahunan_ft')->first_row();
                     if($this->uri->segment(3)!="")
                    { echo date('d F Y', strtotime($dt_tanggal->dt_ml)); echo " - "; echo date('d F Y', strtotime($dt_tanggal->dt_ak));
                     }?> )
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php $no=1; foreach ($tp_periode as $rows) { ?>
                          <a class="dropdown-item" href="<?= base_url()?>realisasi/periode/<?php echo "$rows->id_skp_tahunan_ft";  ?>"><?php echo "(".date('d F Y', strtotime($rows->dt_ml)).") - (".date('d F Y', strtotime($rows->dt_ak)).")";  ?></a>
                        <?php } ?>
                        </div>
                    </div>
                  </span>
                </div>
                <div class="col-12">
                  
                <?php if($this->uri->segment(3)!=NULL) { ?>
                  <table id="rev_penelitian" class="table table-bordered table-striped" style="width: 100%;">

                  <thead>
                      <tr>

                          <th width=1>NO.</th>
                          <th>KEGIATAN / TUGAS</th>
                          <th>TARGET</th>
                          <th>REALISASI TARGET</th>

                      </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach ($realisasi as $rows) {
                    $this->db->where('id_dp_kuantitas', $rows->id_dp_kuantitas);
                    $satuan = $this->db->get('dp_kuantitas')->first_row();
                    $this->db->where('status_periksa', "Diverifikasi Atasan");
                    $this->db->where('id_skp', $rows->id_skp);
                    $real = $this->db->get('dp_skp_tahunan')->num_rows();
                    ?>
                              <tr align="center">
                                <td><?php echo $no;  ?></td>
                                <td><?php echo $rows->uraian_kegiatan; ?></td>
                                <td><?php echo "$rows->kuantitas "; echo $satuan->satuan_kuantitas; ?></td>
                                  <td><?php echo "$real "; echo $satuan->satuan_kuantitas;?></td>
                              </tr>
                    <?php $no++;  } ?>
                  </tbody>
                  </table>
                  <?php } ?>
                </div>
                
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