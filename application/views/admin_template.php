
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>

  <link rel="icon" href="<?= base_url() ?>assets/image/favicon-32x32.png" type="image/png" />
  <!--plugins-->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- BS Stepper -->
  <!-- <link rel="stylesheet" href="<?= base_url()?>assets/plugins/bs-stepper/css/bs-stepper.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<script src="<?php echo base_url()?>assets/dist/js/jquery-3.5.1.min.js"></script>
<style type="text/css">
  body{
    font-size: 13px;
  }
.content-wrapper {
    background-image: url('<?= base_url()?>assets/image/bg-main.jpg');
    background-size: 100%;
    background-color:rgba(0, 0, 0, 0.5);
}
#samping {
    background-image: url('<?= base_url()?>assets/image/sidebg.jpg');
    background-position: left;
    background-color:rgba(0, 0, 0, 0.5);
}
#logobg {
    background-image: url('<?= base_url()?>assets/image/sidebg.jpg');
    background-position: top;
    background-color:rgba(0, 0, 0, 0.5);
}
 #overlay {
  background: #ffffff;
  color: #666666;
  position: fixed;
  height: 100%;
  width: 100%;
  z-index: 5000;
  top: 0;
  left: 0;
  float: left;
  text-align: center;
  padding-top: 25%;
  opacity: .80;
}
.spinner {
    margin: 0 auto;
    height: 30px;
    width: 30px;
    animation: rotate 0.8s infinite linear;
    border: 5px solid firebrick;
    border-right-color: transparent;
    border-radius: 50%;
}
@keyframes rotate {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
.preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background-color: #fff;
       opacity: .80;
    }
    .preloader .loading {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%,-50%);
      font: 14px arial;
    }
</style>
  <?= $extra_css ?>

</head>
<?php 
              $this->db->where('id_pegawai', $this->session->userdata('id_member'));
              $nip_ses = $this->db->get('dp_pegawai')->first_row();


              $this->db->where('id_unit', $this->session->userdata('id_member'));
              $unit_ses = $this->db->get('dp_unit')->first_row(); ?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
 
<div class="preloader">
  <div class="loading">
    <center>
      <img src="https://i.pinimg.com/originals/ac/19/72/ac19726414fc1d7b08aa4bf90815292f.gif" width="50%">
      
      <!-- <p><b>Mohon Tunggu ... ...</b> </p> -->
    </center>
  </div>
</div>
    <div id="overlay" style="display:none;">
      <div class="spinner"></div>
      <br/>
      Loading...
    </div>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="<?= base_url()?>assets/#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button" >
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4" id="samping">
    <!-- Brand Logo -->
    <a href="" class="brand-link" id="logobg">
      <img src="<?= base_url()?>assets/dist/img/tpplogo.png" alt="AdminLTE Logo"  style="opacity: .8; width: 100%;">

    </a>

    <!-- Sidebar -->
    <div class="sidebar"  style="margin-top:80px">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url()?>assets/dist/img/org.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <?php 
          if($this->session->userdata('level')=='Admin_opd') { echo $unit_ses->nm_unit; } 
          else if($this->session->userdata('level')=='Pegawai') { echo $nip_ses->nip; echo "<br>"; echo $nip_ses->nama; } else { echo "Administrator"; } ?></a>
          <a href="<?= base_url()?>login/logout"><i class="fas fa-sign-out-alt fa-fw"></i> Keluar</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open" style="margin-top: 5px; margin-bottom: 5px; border-bottom:dashed 1px #ccc;">
            <a href="<?= base_url()?>dashboard" class="nav-link <?php if($menu_active=='Dashboard'){echo 'active';} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
           
          </li>
<?php if($this->session->userdata('level') == 'Pegawai') { ?>
         <li class="nav-item" style="margin-top: 5px; margin-bottom: 5px; border-bottom:dashed 1px #ccc;">
            <a href="<?= base_url()?>iptugas/tp" class="nav-link <?php if($sub_menu=='iptugas'){echo 'active';} ?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Input Kegiatan / Tugas
              </p>
            </a>
          </li>
          <?php 

              $this->db->where('nip_penilai', $nip_ses->nip);
              $cek_stat_penilai = $this->db->get('dp_pejabat_penilai')->num_rows();
              if($cek_stat_penilai>=1) {
             ?>
          <li class="nav-item" style="margin-top: 5px; margin-bottom: 5px; border-bottom:dashed 1px #ccc;">
            <a href="<?= base_url()?>periksa/tp" class="nav-link <?php if($sub_menu=='periksatugas'){echo 'active';} ?>">
              <i class="nav-icon fas fa-list-ul"></i>
              <p>
                Periksa Kegiatan / Tugas
              </p>
            </a>
          </li>
        <?php } ?>

         <!-- <li class="nav-item" style="margin-top: 5px; margin-bottom: 5px; border-bottom:dashed 1px #ccc;">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                History Kegiatan / Tugas
              </p>
            </a>
          </li> -->
            <li class="nav-item <?php if($menu_active=='historytugas'){echo 'menu-open';} ?>" style="margin-top: 5px; margin-bottom: 5px; border-bottom:dashed 1px #ccc;">
                  <a href="#" class="nav-link <?php if($menu_active=='historytugas'){echo 'active';} ?>">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p> History Kegiatan / Tugas
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="background-color: rgba(36, 88, 178, 0.3);">

                     <li class="nav-item">
                      <a href="<?= base_url()?>history_kegiatan/harian" class="nav-link <?php if($sub_menu=='historytugasharian'){echo 'active';} ?>" style='color: #333;'>
                        <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                        <p> Kegiatan Harian
                        </p>
                      </a>
                    </li>

                     <li class="nav-item">
                      <a href="<?= base_url()?>history_kegiatan/bulanan" class="nav-link <?php if($sub_menu=='historytugasbulanan'){echo 'active';} ?>" style='color: #333;'>
                        <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                        <p>
                           Kegiatan Bulanan 
                        </p>
                      </a>
                    </li>

                     <li class="nav-item">
                      <a href="<?= base_url()?>history_kegiatan/semester" class="nav-link <?php if($sub_menu=='historytugassemester'){echo 'active';} ?>" style='color: #333;'>
                        <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                        <p>
                           Kegiatan Semester
                        </p>
                      </a>
                    </li>

                     <li class="nav-item">
                      <a href="<?= base_url()?>output_kerja/tp" class="nav-link <?php if($sub_menu=='output_kerja'){echo 'active';} ?>" style='color: #333;'>
                        <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                        <p>
                           PAK
                        </p>
                      </a>
                    </li>

                     <li class="nav-item">
                      <a href="<?= base_url()?>uraian_kegiatan/tp" class="nav-link <?php if($sub_menu=='uraiankeg'){echo 'active';} ?>" style='color: #333;'>
                        <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                        <p>
                           DUPAK
                        </p>
                      </a>
                    </li>

                  </ul>
                </li>

<?php } else if($this->session->userdata('level') == 'Pimpinan') { ?>
         <li class="nav-item" style="margin-top: 5px; margin-bottom: 5px; border-bottom:dashed 1px #ccc;">
            <a href="<?= base_url()?>iptugas/tp" class="nav-link <?php if($sub_menu=='ip_tugas'){echo 'active';} ?>">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Periksa Kegiatan / Tugas
              </p>
            </a>
          </li>
         
         
<?php } else if($this->session->userdata('level') == 'Admin_opd'){?>
            <li class="nav-item <?php if($menu_active=='masterpegawai'){echo 'menu-open';} ?>" style="margin-top: 5px; margin-bottom: 5px; border-bottom:dashed 1px #ccc;">
                  <a href="#" class="nav-link <?php if($menu_active=='masterpegawai'){echo 'active';} ?>">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p> Master Pegawai
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="background-color: rgba(36, 88, 178, 0.3);">

                     <li class="nav-item">
                      <a href="#" class="nav-link <?php if($sub_menu=='pegawai'){echo 'active';} ?>" style='color: #333;'>
                        <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                        <p>
                           Data Pegawai 
                        </p>
                      </a>
                    </li>

                     <li class="nav-item">
                      <a href="<?= base_url()?>pejabat_penilai/tp" class="nav-link <?php if($sub_menu=='pejabatpenilai'){echo 'active';} ?>" style='color: #333;'>
                        <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                        <p>
                           Pejabat Penilai
                        </p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item <?php if($menu_active=='masterkegiatan'){echo 'menu-open';} ?>" style="margin-top: 5px; margin-bottom: 5px; border-bottom:dashed 1px #ccc;">
                  <a href="#" class="nav-link <?php if($menu_active=='masterkegiatan'){echo 'active';} ?>">
                    <i class="nav-icon fas fa-passport"></i>
                    <p> Master Kegiatan
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="background-color: rgba(36, 88, 178, 0.3);">

                     <li class="nav-item">
                      <a href="<?= base_url()?>unsur/tp" class="nav-link <?php if($sub_menu=='unsurtugas'){echo 'active';} ?>" style='color: #333;'>
                        <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                        <p>
                           Unsur Tugas 
                        </p>
                      </a>
                    </li>

                     <li class="nav-item">
                      <a href="<?= base_url()?>pelaksana_tgs_jabatan/tp" class="nav-link <?php if($sub_menu=='pelaksana_tgs_jabatan'){echo 'active';} ?>" style='color: #333;'>
                        <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                        <p>
                           Jenjang Pel. Tgs Jabatan
                        </p>
                      </a>
                    </li>

                     <li class="nav-item">
                      <a href="<?= base_url()?>output_kerja/tp" class="nav-link <?php if($sub_menu=='output_kerja'){echo 'active';} ?>" style='color: #333;'>
                        <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                        <p>
                           Output Hasil Kerja
                        </p>
                      </a>
                    </li>

                     <li class="nav-item">
                      <a href="<?= base_url()?>uraian_kegiatan/tp" class="nav-link <?php if($sub_menu=='uraiankeg'){echo 'active';} ?>" style='color: #333;'>
                        <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                        <p>
                           Uraian Kegiatan
                        </p>
                      </a>
                    </li>

                  </ul>
                </li>


            <li class="nav-item <?php if($menu_active=='masteruser'){echo 'menu-open';} ?>" style="margin-top: 5px; margin-bottom: 5px; border-bottom:dashed 1px #ccc;">
                  <a href="#" class="nav-link <?php if($menu_active=='masteruser'){echo 'active';} ?>">
                    <i class="nav-icon fas fa-user-lock"></i>
                    <p> Master User
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="background-color: rgba(36, 88, 178, 0.3);">

                     <li class="nav-item">
                      <a href="<?= base_url()?>user_pegawai/tp" class="nav-link <?php if($sub_menu=='userpegawai'){echo 'active';} ?>" style='color: #333;'>
                        <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                        <p>
                           User Pegawai
                        </p>
                      </a>
                    </li>

                     <li class="nav-item">
                      <a href="#" class="nav-link <?php if($sub_menu=='pegawai'){echo 'active';} ?>" style='color: #333;'>
                        <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                        <p>
                           User Penilai (PAK, DUPAK)
                        </p>
                      </a>
                    </li>
                  </ul>
                </li>
<?php }?>
            </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

    <?= $container ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 || TIM IT <a href="https://kominfo.padangpariamankab.go.id/">KOMINFO KAB. PADANG PARIAMAN</a>.</strong>
    
    <div class="float-right d-none d-sm-inline-block">
      <b>E-DUPAK KAB. PADANG PARIAMAN</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- <script src="<?= base_url()?>assets/plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap -->
<script src="<?= base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url()?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url()?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= base_url()?>assets/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>assets/dist/js/adminlte.js"></script>
<!-- BS-Stepper -->
<!-- <script src="<?= base_url()?>assets/plugins/bs-stepper/js/bs-stepper.min.js"></script> -->

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<!-- <script src="<?= base_url()?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script> -->
<!-- <script src="<?= base_url()?>assets/plugins/raphael/raphael.min.js"></script> -->
<!-- <script src="<?= base_url()?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script> -->
<!-- <script src="<?= base_url()?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script> -->

<!-- AdminLTE for demo purposes -->
<script src="<?= base_url()?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?= base_url()?>assets/dist/js/pages/dashboard2.js"></script>
 --> 

<!-- bs-custom-file-input -->
<script src="<?= base_url()?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Datatable -->
<script src="<?= base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<!-- <script src="<?= base_url()?>assets/plugins/jszip/jszip.min.js"></script> -->
<!-- <script src="<?= base_url()?>assets/plugins/pdfmake/pdfmake.min.js"></script> -->
<script src="<?= base_url()?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    // $("#example1").DataTable({
    //   "responsive": true, "lengthChange": false, "autoWidth": false,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    // $('#masuk_baru_dt').DataTable({
    //   "paging": true,
    //   "lengthChange": true,
    //   "searching": true,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": true,
    //   "responsive": true,
    // });
    $('#penilai').dataTable({
        "lengthChange": false,
        "ordering": true,               // Allows ordering
        "searching": true,              // Searchbox
        "paging": true,                 // Pagination
        "info": false,                  // Shows 'Showing X of X' information
        "pagingType": 'simple_numbers', // Shows Previous, page numbers & next buttons only
        "pageLength": 10,               // Defaults number of rows to display in table
        "columnDefs": [
            {
                "targets": 'dialPlanButtons',
                "searchable": false,    // Stops search in the fields 
                "sorting": false,       // Stops sorting
                "orderable": false      // Stops ordering
            }
        ],
        "dom": '<"top"f>rt<"bottom"lp><"clear">', // Positions table elements
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]], // Sets up the amount of records to display
        "language": {
            "search": "_INPUT_",            // Removes the 'Search' field label
            "searchPlaceholder": "Search"   // Placeholder for the search box
        },
        "search": {
            "addClass": 'form-control input-lg col-xs-12'
        },
        "fnDrawCallback":function(){
            $("input[type='search']").attr("id", "searchBox");
            $('#dialPlanListTable').css('cssText', "margin-top: 0px !important;");
            $("select[name='dialPlanListTable_length'], #searchBox").removeClass("input-sm");
            $('#searchBox').css("width", "300px").focus();
            $('#dialPlanListTable_filter').removeClass('dataTables_filter');
        }
    });
    $('#rev_penelitian').dataTable({
        "lengthChange": false,
        "ordering": true,               // Allows ordering
        "searching": true,              // Searchbox
        "paging": true,                 // Pagination
        "info": false,                  // Shows 'Showing X of X' information
        "pagingType": 'simple_numbers', // Shows Previous, page numbers & next buttons only
        "pageLength": 10,               // Defaults number of rows to display in table
        "columnDefs": [
            {
                "targets": 'dialPlanButtons',
                "searchable": false,    // Stops search in the fields 
                "sorting": false,       // Stops sorting
                "orderable": false      // Stops ordering
            }
        ],
        "dom": '<"top"f>rt<"bottom"lp><"clear">', // Positions table elements
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]], // Sets up the amount of records to display
        "language": {
            "search": "_INPUT_",            // Removes the 'Search' field label
            "searchPlaceholder": "Search"   // Placeholder for the search box
        },
        "search": {
            "addClass": 'form-control input-lg col-xs-12'
        },
        "fnDrawCallback":function(){
            $("input[type='search']").attr("id", "searchBox");
            $('#dialPlanListTable').css('cssText', "margin-top: 0px !important;");
            $("select[name='dialPlanListTable_length'], #searchBox").removeClass("input-sm");
            $('#searchBox').css("width", "300px").focus();
            $('#dialPlanListTable_filter').removeClass('dataTables_filter');
        }
    });
  });
</script>
<!-- Datatable -->


 <?= $extra_js ?>


<?php if(!empty($this->session->flashdata('notifinput'))) { ?>
  <script>
         $(document).ready(function() {

<?php if($this->session->flashdata('notifinput')=="sukses_input") { ?>
          Command: toastr["success"]("Data berhasil ditambahkan!")
<?php } ?>

<?php if($this->session->flashdata('notifinput')=="sukses_edit") { ?>
          Command: toastr["success"]("Data berhasil diperbarui!")
<?php } ?>

<?php if($this->session->flashdata('notifinput')=="gagal") { ?>
          Command: toastr["error"]("Maaf ada data yg masih kosong, silahkan lengkapi!")
<?php } ?>

<?php if($this->session->flashdata('notifinput')=="tanggal_salah") { ?>
          Command: toastr["error"]("Maaf sesuaikan tanggal dengan semester penginputan data!")
<?php } ?>

      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }

      });

    </script>
<?php } ?>

 
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $(".preloader").fadeOut("slow");
  $('#tombolloading').click(function(){
    $('.preloader').fadeIn("slow");
  });
});

</script>

</body>
</html>
