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
            
              <div class="card-body">
              <?= $this->session->userdata('notifikasi_line'); ?>
              <div class="row">
              
                <div class="col-md-12">
                
                  <form class="form-horizontal" action="<?= base_url()?>iptugas/simpan_edit_laporan" method="post" enctype="multipart/form-data">
                  <div class="card">
                    <div class="card-header bg-secondary ">
                      <h5 class="card-title">Form Edit Laporan Harian</h5>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                          <input type="hidden" value="<?= $tugas->id_tugas ?>" name="id_tugas">
                          <input type="hidden" value="<?= $tugas->tgl_input ?>" name="tggl_lama">
                          <label class="col-form-label" for="inputError">Tanggal Kegiatan / Tugas</label>
                          <input type="date" class="form-control <?php if(form_error('tanggal')){echo "is-invalid";}?>" id="tggl_kegiatan"  onchange="kredit(this)" name="tanggal" value="<?= $tugas->tgl_input ?>">
                          <div class="invalid-feedback"><?= form_error('name') ?></div>
                          <label for="sel1">Pilih Uraian Kegiatan</label>
                          <select id="form_kegiatan" class="form-control <?php if(form_error('id_uraian_kegiatan')){echo "is-invalid";}?>" name="id_uraian_kegiatan"  onchange="keg_get(this)" >
                            <?php foreach($this->M_iptugas->get_kegiatan_tugas(date("Y",strtotime($tugas->tgl_input)), detail_pegawai()->nip) as $rows){?>
                                <option value="<?= $rows->id_uraian_kegiatan ?>" <?php if($rows->id_uraian_kegiatan == $tugas->id_uraian_kegiatan){echo "selected";}?> ><?= $rows->uraian_kegiatan ?></option>
                            <?php }?>
                          </select>
                          <label for="sel1">Output Kerja</label>
                          <input id="outputkerja" type="text" class="form-control" value="<?= $this->M_iptugas->get_detail_kuantitas($tugas->id_uraian_kegiatan)->output_kerja ?>" style="font-size: 12px;" disabled>
                          </select>
                          <label for="sel1">Bukti Tugas / Kegiatan <small>(Upload berkas baru jika ingin merubah)</small></label>
                          <input type="file" class="form-control" name="bukti" value="" style="font-size: 12px;">
                          <div class="row">
                            <div class="col-md-4">
                              <label for="sel1">Kuantitas</label>
                              <input type="text" class="form-control <?php if(form_error('kuantitas')){echo "is-invalid";}?>" value="<?= $tugas->kuantitas ?>" name="kuantitas" style="font-size: 12px;">
                            </div>
                            <div class="col-md-8">
                              <label for="sel1">Satuan</label>
                              <input id="satuan" type="text" class="form-control" name="satuan" value="<?= $this->M_iptugas->get_detail_kuantitas($tugas->id_uraian_kegiatan)->satuan_kuantitas ?>" style="font-size: 12px;" disabled>
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
