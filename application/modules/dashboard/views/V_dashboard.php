<div class="content-wrapper">
   
    <section class="content">
      <div class="container-fluid">
      
        <div class="row">
          
          <div class="col-12">
            <?php if($this->session->userdata('level')=="Pegawai"){ ?>
                <div class="alert alert-danger alert-dismissible mt-2">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                    Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my
                    entire
                    soul, like these sweet mornings of spring which I enjoy with my whole heart.
                </div>
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
