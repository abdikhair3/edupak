
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
              <form method="post" action="<?= base_url()?>iptugas/bawahan">
                  <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <select name="tahun" class="form-control select2" style="width: 100%;">
                            <option value="" selected="selected">Pilih Tahun </option>
                            <?php foreach($tahun as $rows){ ?>
                            <option value="<?= $rows->a ?>" <?php if($tahun_n==$rows->a){echo "selected";} ?> ><?= $rows->a ?></option>
                            <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <select name="bulan" class="form-control select2" style="width: 100%;">
                            <option selected="selected">Pilih Bulan</option>
                            <option value="01" <?php if($bulan=="01"){echo "selected";} ?> >Januari</option>
                            <option value="02" <?php if($bulan=="02"){echo "selected";} ?> >Februari</option>
                            <option value="03" <?php if($bulan=="03"){echo "selected";} ?> >Maret</option>
                            <option value="04" <?php if($bulan=="04"){echo "selected";} ?> >April</option>
                            <option value="05" <?php if($bulan=="05"){echo "selected";} ?> >Mei</option>
                            <option value="06" <?php if($bulan=="06"){echo "selected";} ?> >Juni</option>
                            <option value="07" <?php if($bulan=="07"){echo "selected";} ?> >Juli</option>
                            <option value="08" <?php if($bulan=="08"){echo "selected";} ?> >Agustus</option>
                            <option value="09" <?php if($bulan=="09"){echo "selected";} ?> >September</option>
                            <option value="10" <?php if($bulan=="10"){echo "selected";} ?> >Oktober</option>
                            <option value="11" <?php if($bulan=="11"){echo "selected";} ?> >November</option>
                            <option value="12" <?php if($bulan=="12"){echo "selected";} ?> >Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                        <input type="text" name="tanggal"  class="form-control" value="<?= $tanggal ?>" placeholder="Tanggal">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <input type="text" name="nama"  class="form-control" value="<?= $nama ?>" placeholder="Masukkan Nama">
                        </div>
                    </div>
                    <div class="col-2">
                      <button type="submit" class="btn btn-block btn-info">Cari</button>
                    </div>
                    </form>
                  </div>
                
                <table class="font-standart table table-bordered" style="width: 100%;">

                <thead>
                    <tr>
                        <th width=1>NO.</th>
                        <th>Tanggal</th>
                        <th>Nama Bawahan</th>
                        <th>Kegiatan</th>
                        <th>Kuantitas</th>
                        <th>View Detail</th>
                        <th>Verifikasi</th>

                    </tr>
                </thead>
                <tbody>
                 <?php $no=1; foreach ($bawahan as $rows) {?>
                    <tr align="center">
                        <td><?php echo $no;  ?></td>
                        <td><?= is_time_convert($rows->tgl_input); ?></td>
                        <td><?php echo $rows->nama; ?></td>
                        <td><?php echo $rows->uraian_kegiatan; ?></td>
                        <td><?php echo $rows->kuantitas; ?> <?= $rows->satuan_kuantitas ?></td>
                        <td> <a href="" title="Detail" type="button" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></a></td>
                        <td>
                        <input type="checkbox" <?php if($rows->status_periksa=='Verifikasi Atasan'){echo "checked";}?> id="checkboxPrimary1" value="{TT_sticky_header}" onchange="verifikasi(<?= $rows->id_tugas ?>, this)"> <label for="checkboxPrimary3">
                          verifikasi
                        </label>
                        </td>
                    </tr>
                  <?php $no++;  } ?>
                </tbody>
                </table>

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
 