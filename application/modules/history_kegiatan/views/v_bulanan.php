
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

                    <!-- <tr>
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
                        <td>Bulan Kegiatan</td>
                        <td align="center" width=1>:</td>
                        <td colspan="4">
                          <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                Pilih Bulan 
                                ( <?php if($this->uri->segment(3)=="01") { echo "Januari"; } 
                                        else if($this->uri->segment(3)=="02") { echo "Februari"; }
                                        else if($this->uri->segment(3)=="03") { echo "Maret"; }
                                        else if($this->uri->segment(3)=="04") { echo "April"; }
                                        else if($this->uri->segment(3)=="05") { echo "Mei"; }
                                        else if($this->uri->segment(3)=="06") { echo "Juni"; }
                                        else if($this->uri->segment(3)=="07") { echo "Juli"; }
                                        else if($this->uri->segment(3)=="08") { echo "Agustus"; }
                                        else if($this->uri->segment(3)=="09") { echo "September"; }
                                        else if($this->uri->segment(3)=="10") { echo "Oktober"; }
                                        else if($this->uri->segment(3)=="11") { echo "November"; }
                                        else if($this->uri->segment(3)=="12") { echo "Desember"; } ?> )
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?= base_url()?>history_kegiatan/bulanan/01">Januari</a>
                                <a class="dropdown-item" href="<?= base_url()?>history_kegiatan/bulanan/02">Februari</a>
                                <a class="dropdown-item" href="<?= base_url()?>history_kegiatan/bulanan/03">Maret</a>
                                <a class="dropdown-item" href="<?= base_url()?>history_kegiatan/bulanan/04">April</a>
                                <a class="dropdown-item" href="<?= base_url()?>history_kegiatan/bulanan/05">Mei</a>
                                <a class="dropdown-item" href="<?= base_url()?>history_kegiatan/bulanan/06">Juni</a>
                                <a class="dropdown-item" href="<?= base_url()?>history_kegiatan/bulanan/07">Juli</a>
                                <a class="dropdown-item" href="<?= base_url()?>history_kegiatan/bulanan/08">Agustus</a>
                                <a class="dropdown-item" href="<?= base_url()?>history_kegiatan/bulanan/09">September</a>
                                <a class="dropdown-item" href="<?= base_url()?>history_kegiatan/bulanan/10">Oktober</a>
                                <a class="dropdown-item" href="<?= base_url()?>history_kegiatan/bulanan/11">November</a>
                                <a class="dropdown-item" href="<?= base_url()?>history_kegiatan/bulanan/12">Desember</a>
                              </div>
                          </div>  
                        </td>
                    </tr>
                    <tr align="center">
                        <td width=1>NO.</td>
                        <td>URAIAN KREDIT</td>
                        <td>SATUAN HASIL</td>
                        <td>JUMLAH VOLUME</td>
                        <td>ANGKA KREDIT</td>
                        <td>JUMLAH ANGKA KREDIT</td>
                        <td>KETERANGAN / BUKTI FISIK</td>
                    </tr>
                    <?php $no=1; foreach ($history_bulanan as $rows) {
                          $this->db->select_sum('angka_kredit');
                          $this->db->where('dp_uraian_kegiatan.id_uraian_kegiatan', $rows->id_uraian_kegiatan);
                          $this->db->join('dp_uraian_kegiatan', 'dp_uraian_kegiatan.id_uraian_kegiatan = dp_tugas.id_uraian_kegiatan');
                          $sum_angka_kredit = $this->db->get('dp_tugas')->first_row();
                          

                          $this->db->where('id_pegawai', $this->session->userdata('id_member'));
                          $nip_ses = $this->db->get('dp_pegawai')->first_row();

                          $bln_now=date('m');
                          $bln_now_con=(int)$bln_now;
                          if($bln_now_con<=6) { $semester=1; } else { $semester=2; }
                          $thn_now=date('Y');

                          $this->db->where('dp_tugas.id_uraian_kegiatan', $rows->id_uraian_kegiatan);
                          $this->db->where('status_periksa', 'Diverifikasi Atasan');
                          $this->db->where('semester', $semester);            
                          $this->db->where('YEAR(tgl_input)', $thn_now);     
                          $this->db->where('MONTH(tgl_input)', $this->uri->segment(3));
                          $this->db->where('nip', $nip_ses->nip);
                          $jmltgs = $this->db->get('dp_tugas')->num_rows();

                          // $sum_angka_kredit=$jmltgs*$rows->angka_kredit;
                       ?>
                      <tr>
                        <td align="center"><?php echo $no;  ?></td>
                        <td><?php echo $rows->uraian_kegiatan; ?></td>
                        <td align="center">?</td>
                        <td align="center"><?php echo $jmltgs; ?></td>
                        <td align="center"><?php echo $rows->angka_kredit; ?></td>
                        <td align="center"><?php echo round($sum_angka_kredit->angka_kredit,4); ?></td>
                        <td></td>
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

  <!-- TESSSSS -->
