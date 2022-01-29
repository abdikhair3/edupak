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
                                    <th>ID Satuan</th>
                                    <th>Key Satuan</th>
                                    <th>Nama Satuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($satuan as $rows){ ?>
                                <tr align="center">
                                    <td><?= $no ?></td>
                                    <td><?= $rows->id_satuan ?></td>
                                    <td><?= $rows->key ?></td>
                                    <td><?= $rows->nm_satuan ?></td>
                                    <td>
                                        <a href="<?= base_url()?>api/form_edit/<?= $rows->id_satuan ?>" title="Edit Data" type="button" class="btn btn-warning btn-sm"><i class="fa fa-pen"></i></a>
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
