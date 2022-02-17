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
                        <form method="get" action="<?= base_url()?>account/akun_pegawai" >
                            <div class="card-footer">
                                <button type="submit" name="subject" class="btn btn-sm btn-primary" value="generate" onClick="return confirm('Generate akan membuat akun secara otomatis, pada pegawai yang belum memiliki akun, yakin mau melanjutkan ?')"><i class="fas fa-sync"></i> Auto Generate</button>
                                <button type="submit" name="subject" class="btn btn-sm bg-gradient-secondary btn-sm" value="print_akun"><i class="fas fa-print"></i> Cetak Account</button>
                            </div>
                        </form>
                        <div class="mt-2" style="overflow-x:scroll">
                            <table id="rev_penelitian" class="table table-bordered table-striped" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th width=1>NO.</th>
                                    <th>username</th>
                                    <th>Nama Pegawai</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($pegawai as $rows){ ?>
                                <tr align="center">
                                    <td><?= $no ?></td>
                                    <td><?= $rows->username ?></td>
                                    <td><?= $rows->nama ?></td>
                                    <td><?= $rows->level ?></td>
                                    <td>
                                        <a href="<?= base_url()?>account/form_edit/<?= $rows->id_users ?>" title="Hapus Data" type="button" class="btn btn-danger btn-sm"><i class="fa fa-pen"></i></a>
                                    </td>
                                </tr>
                                <?php $no++; }?>
                            </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
