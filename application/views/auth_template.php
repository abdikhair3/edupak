
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>

  <link rel="icon" href="<?= base_url() ?>assets/image/favicon-32x32.png" type="image/png" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/adminlte.min.css">
</head>
<body class="light-mode hold-transition login-page" style="
    background-image: url('<?= base_url()?>assets/image/bg-main.jpg');
    background-size: 100%;
    background-color:rgba(0, 0, 0, 0.5);">
<div class="login-box">

  <!-- /.login-logo -->

  <div class="card">
    <div class="card-body light-mode login-card-body" style="-webkit-box-shadow: 0px 0px 24px 8px #000000; 
box-shadow: 0px 0px 24px 8px #000000;">
          <div class="login-logo">
    <a><img src="<?= base_url()?>assets/dist/img/tpplogo.png" style="width: 100%;"></a>
  </div>
      <p class="login-box-msg">Login untuk memulai aplikasi ini</p>
      <form action="<?php echo base_url()?>login/auth" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-tie"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
              <button type="submit" class="btn btn-success btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
    <?php echo $this->session->flashdata('notif');?>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>assets/dist/js/adminlte.min.js"></script>
</body>
</html>
