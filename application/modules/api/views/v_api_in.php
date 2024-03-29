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
                        <div style="overflow-x:scroll">
                            <table id="rev_penelitian" class="table table-bordered table-striped" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th width=1>NO.</th>
                                    <th>Nama API.</th>
                                    <th>Jenis Request.</th>
                                    <th>URL</th>
                                    <th>Terakhir Sinkron</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($api_data as $rows){ ?>
                                <tr align="center">
                                    <td><?= $no ?></td>
                                    <td><?= $rows->nama_api ?></td>
                                    <td><?= $rows->request ?></td>
                                    <td><?= $rows->url ?></td>
                                    <td>
                                        <?php echo date('d F Y, h:i:s A', strtotime($rows->last_sync)); ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url()?>api/sync/<?= $rows->id ?>" title="Hapus Data" type="button" class="btn btn-primary btn-sm"><i class="fa fa-load"></i>Sync</a>
                                        <a href="<?= base_url()?>api/form_edit/<?= $rows->id ?>" title="Hapus Data" type="button" class="btn btn-danger btn-sm"><i class="fa fa-pen"></i></a>
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
