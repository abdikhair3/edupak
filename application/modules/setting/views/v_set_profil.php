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
            <?= $this->session->flashdata('notif') ?>
              <div class="card-body">
              
              <form method="post" action="<?= base_url() ?>setting/set_profil/simpan_edit">
                <div class="row">
                    
                        <div class="col-12">
                            <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?= $profil->username ?>" placeholder="Username" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password (Baru)</label>
                            <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                        <?php if($this->session->userdata('level')=="Pegawai"){?>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Atasan Langsung</label>
                            <div class="col-sm-10">
                            <select class="form-control select2" style="width: 100%;" name="atasan">
                                <option value=''>------------Pilih Atasan Langsung-------------</option>
                                <?php foreach($atasan as $rows){?>
                                    <option value="<?= $rows->nip ?>" <?php if($profil->nip_atasan==$rows->nip){echo"selected";} ?>>(<?= $rows->nip ?>) <?= $rows->nama ?> | <?= $rows->jabatan ?></option>
                                <?php }?>
                            </select>
                            </div>
                        </div>
                        <?php }?>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Simpan Data</button>
                        </div>
                    
                </div>
                </form>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
