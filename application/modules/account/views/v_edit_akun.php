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
                    <form class="form-horizontal" action="<?= base_url()?>account/simpan_edit_akun" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $this->uri->segment(3); ?>">
                        <div class="card card-info">
                        <div class="card-header">
                        <h4 class="card-title">Form Edit Account</h4>
                        </div>
                        <div class="card-body">
                        <div class="form-group">
                            <label for="sel1">Nip</label>
                            <input type="text" class="form-control" value="<?= $user->nip ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Nama</label>
                            <input type="text" class="form-control" value="<?= $user->nama ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Username</label>
                            <input type="text" class="form-control" name="username" value="<?= $user->username ?>">
                        </div>
                        <div class="form-group">
                            <label for="sel1">Password Baru</label>
                            <input type="text" class="form-control" name="password">
                        </div>
        
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Perbarui Data</button>
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
