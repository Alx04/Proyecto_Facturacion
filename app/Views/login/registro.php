<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>App | Registro</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>/plantilla/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>/plantilla/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>/plantilla/dist/css/adminlte.min.css">
  <link rel="icon" type="image/png" href="<?=base_url()?>/plantilla/dist/img/logo.png">
  <style type="text/css">
    body { 
      background: url(<?=base_url()?>/plantilla/dist/img/fondo.jpg) no-repeat center center fixed; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
  </style>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?=base_url()?>/plantilla/index2.html" class="h1">
        <img src="<?=base_url()?>/plantilla/dist/img/logo.png" width="100px">
      </a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Registro nuevo usuario</p>

      <form id="frmRegistro" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Correo" name="correo" id="correo" required onblur="verificaCorreo()">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="pass" id="pass" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Repita Contraseña" name="repass" id="repass" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="icheck-primary">
              <input type="checkbox" value="agree" id="acepto" name="acepto" required>
              <label for="acepto">Estoy de acuerdo con los <a href="<?=base_url()?>/terminos.pdf">terminos</a>
              </label>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button i type="submit" class="btn btn-primary btn-block btnSubmit">Registrarme</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="<?=base_url()?>/login/login" class="text-center">Ya tiene usuario?</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?=base_url()?>/plantilla/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>/plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>/plantilla/dist/js/adminlte.min.js"></script>

<script src="<?=base_url()?>/plantilla/dist/js/login/login.js"></script>



</body>
</html>
<script type="text/javascript">
  $("#frmRegistro").on('submit', function(e){
  e.preventDefault();
  
  
  if($("#pass").val() == $("#repass").val()){
    $.ajax({
      "url": "<?=base_url()?>/login/registrarme",
      "method": "post",
      "data": $('#frmRegistro').serialize(),
      "dataType": "json",
    }).done(function (response) {;
      if(response>0){
        window.location.href="<?=base_url()?>/inicio/inicio"
      }else{
        alert("Ha ocurrido un error");
      }
    });
  }else{
    alert("Contraseñas no coinciden");
  }
});


function verificaCorreo(){
  $.ajax({
      "url": "<?=base_url()?>/login/verificaCorreo",
      "method": "post",
      "data": {correo:$("#correo").val()},
      "dataType": "json",
    }).done(function (response) {;
      if(response){
        alert("Correo ya existe");
        $(".btnSubmit").attr("disabled",true);
      }else{
        $(".btnSubmit").attr("disabled",false);
      }
    });
}

</script>
