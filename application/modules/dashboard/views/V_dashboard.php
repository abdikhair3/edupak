<div class="content-wrapper">
   
    <section class="content">
      <div class="container-fluid">
      
        <div class="row">
          
          <div class="col-12">
            <?php if($this->session->userdata('level')=="Pegawai"){ ?>
                <?php if(detail_pegawai()->id_atasan == NULL){?>
                <div class="alert alert-danger alert-dismissible mt-2">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Peringatan !</h5>
                    Atasan langsung belum di pilih, harap pilih atasan langsung di menu setting di samping tombol keluar.. Terimakasih
                    <?= detail_pegawai()->id_atasan; ?>
                </div>
                <?php }?>
            <?php }?>
            
            <div class="card mt-2">
                
            <?= $this->session->flashdata('notif') ?>
              <div class="card-body">
         
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
