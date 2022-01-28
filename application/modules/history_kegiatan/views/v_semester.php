
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
              <div class="col-12">
                <div >
                <table border="1" width="100%">
<!-- 
                    <tr>
                        <td width=1></td>
                        <td>Nama</td>
                        <td align="center" width=1>:</td>
                        <td colspan="31"></td>
                    </tr>
                    <tr>
                        <td width=1></td>
                        <td>NIP</td>
                        <td align="center" width=1>:</td>
                        <td colspan="31"></td>
                    </tr>
                    <tr>
                        <td width=1></td>
                        <td>Pangkat / Golongan</td>
                        <td align="center" width=1>:</td>
                        <td colspan="31"></td>
                    </tr>
                    <tr>
                        <td width=1></td>
                        <td>Jabatan</td>
                        <td align="center" width=1>:</td>
                        <td colspan="31"></td>
                    </tr> -->
                    <tr>
                        <td width=1></td>
                        <td>Semester</td>
                        <td align="center" width=1>:</td>
                        <td colspan="31">
                          <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                Pilih Semester 
                                ( <?php if($this->uri->segment(3)=="1") { echo "Ganjil"; } 
                                        else if($this->uri->segment(3)=="2") { echo "Genap"; } ?> )
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?= base_url()?>history_kegiatan/semester/1">Ganjil</a>
                                <a class="dropdown-item" href="<?= base_url()?>history_kegiatan/semester/2">Genap</a>
                              </div>
                          </div> 
                        </td>
                    </tr>
                    <tr align="center">
                        <td width=1 rowspan="2">NO.</td>
                        <td rowspan="2">URAIAN KREDIT</td>
                        <td rowspan="2">SATUAN HASIL</td>
                        <td colspan="6">VOLUME KEGIATAN BULANAN</td>
                        <td rowspan="2">JUMLAH VOLUME KEGIATAN</td>
                        <td rowspan="2">ANGKA KREDIT</td>
                        <td rowspan="2">JUMLAH ANGKA KREDIT</td>
                        <td rowspan="2">KETERANGAN / BUKTI FISIK</td>
                    </tr>
                    <tr align="center">
                      <?php if($this->uri->segment(3)=="1") {  ?>
                        <td>JAN</td>
                        <td>FEB</td>
                        <td>MAR</td>
                        <td>APR</td>
                        <td>MEI</td>
                        <td>JUN</td>
                      <?php } else if($this->uri->segment(3)=="2") { ?>
                        <td>JUL</td>
                        <td>AGU</td>
                        <td>SEP</td>
                        <td>OKT</td>
                        <td>NOV</td>
                        <td>DES</td>
                      <?php } ?>
                    </tr>
                    <?php $no=1; foreach ($history_semester as $rows) {
                          
                       ?>
                    <tr>
                        <td align="center"><?php echo $no;  ?></td>
                        <td><?php echo $rows->uraian_kegiatan; ?></td>
                        <td>?</td>
                        <td><?php if($this->uri->segment(3)=="1") {   } ?></td>
                    </tr>
                    <?php $no++; } ?>
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
