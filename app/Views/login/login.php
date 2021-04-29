<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>App | Login</title>

  <!-- Google Font                   : Source Sans Pro -->
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
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <div style="width: 35%; float: left;"><img src="<?=base_url()?>/plantilla/dist/img/logo.png" width="100px"></div>
      <div style="width: 90%"><h3 lass="login-box-msg" >Facturación</h3>
      <h3 lass="login-box-msg"> Electrónica</h3> </div>
    </div>
    <div class="card-body">
      <h4 class="login-box-msg">Inicio de sesión</h4>

      <form id="frmLogin">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Usuario" name="usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recuerdame
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Iniciar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
      <p class="mb-0">
        <a href="<?=base_url()?>/login/registro" class="text-center">Eres nuevo Registrate...</a>
      </p>
       <p class="mb-0">
        <a href="<?=base_url()?>/login/olvido" class="text-center">Olvido su contraseña?</a>
      </p>
  </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  
</div>
<!-- /.login-box -->
<div style="float: right; padding-left: 2%; color: gray;box-shadow: 1px 2px 2px gray;margin-left: 70%">
  <h5>Grupo 3</h5> <br>
  <p style="padding-right:5px">Alexander Mora Valdez <br>Norma Chavarria Rojas <br> Juan Calderón Chácon <br> Keren Cambronero Quesada</p>
</div>
<!-- jQuery -->
<script src="<?=base_url()?>/plantilla/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>/plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>/plantilla/dist/js/adminlte.min.js"></script>

<script type="text/javascript">
  $("#frmLogin").on('submit', function(e){
    e.preventDefault();
    $.ajax({
      "url": "<?=base_url()?>/login/verificar",
      "method": "post",
      "data": $('#frmLogin').serialize(),
      "dataType": "json",
    }).done(function (response) {
      if(response.respuesta==1){
        window.location.href="<?=base_url()?>/inicio/inicio"
      }else{
        alert("Usuario o contraseña erroneos");
      }
    });
  });
</script>

</body>
</html>
