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
                <div class="row">
                    <div class="col-12">
                    <form class="form-horizontal" action="<?= base_url()?>api/simpan_api" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $this->uri->segment(3); ?>">
                        <div class="card card-info">
                        <div class="card-header">
                        <h3 class="card-title">FORM TUGAS / KEGIATAN</h3>
                        </div>
                        <div class="card-body">
                        <div class="form-group">
                            <label for="sel1">Nama API</label>
                            <input type="text" class="form-control" name="nama" value="<?= $api_data->nama_api ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="sel1">URL</label>
                            <input type="text" class="form-control" name="url" value="<?= $api_data->url ?>" required="required">
                        </div>
        
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        <button type="submit" class="btn btn-warning">Perbarui Data</button>
                        <a href="../<?php base_url()?>tp" class="btn btn-secondary">Batal</a>
                        </div>
                        <!-- /.card-footer -->
                        </div>
                    </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
