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
                                    <th>ID Unit</th>
                                    <th>Key Unit</th>
                                    <th>Nama Unit</th>
                                    <th>Key Satuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($unit as $rows){ ?>
                                <tr align="center">
                                    <td><?= $no ?></td>
                                    <td><?= $rows->id_unit ?></td>
                                    <td><?= $rows->key_unit ?></td>
                                    <td><?= $rows->nm_unit ?></td>
                                    <td><?= $rows->satuan ?></td>
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
