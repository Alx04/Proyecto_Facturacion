<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Olvido | App</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>/plantilla/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>/plantilla/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>/plantilla/dist/css/adminlte.min.css">
  <link rel="icon" type="image/png" href="<?=base_url()?>/plantilla/dist/img/logo.png">
</head>
<body class="hold-transition login-page" style="background: linear-gradient(20deg, #000033, #0097A7);">
<div class="login-box">
  <div class="login-logo">
    <div class="card-header text-center">
        <div style="width: 35%; float: left;">
          <img src="<?=base_url()?>/plantilla/dist/img/logo.png" width="100px">
        </div>
        <div style="width: 90%">
          <h3 >Facturación</h3>
          <h3 > Electrónica</h3>
         </div>
    </div>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Olvido su contraseña, digite un correo asociado a su cuenta para recuperarla</p>

      <form method="post" id="frmRecuperar">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Correo" name="correo" id="correo">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Recuperar contraseña</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="<?=base_url()?>/login/login">Inicio de sesion</a>
      </p>
      <p class="mb-0">
        <a href="<?=base_url()?>/login/registro" class="text-center">Registrarme</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url()?>/plantilla/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>/plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>/plantilla/dist/js/adminlte.min.js"></script>

<script type="text/javascript">
  $("#frmRecuperar").on('submit', function(e){
    e.preventDefault();
    $.ajax({
      "url": "<?=base_url()?>/login/recuperar",
      "method": "post",
      "data": $('#frmRecuperar').serialize(),
      "dataType": "json",
    }).done(function (response) {
      if(response==1){
        alert("correo enviado");
      }else{
        alert("Ocurrio un error");
      }
    });
  });
</script>

</body>
</html>


