<?= $this->extend('base') ?>

<?= $this->section('header') ?>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0" >Listado de facturas</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Dash</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<?= $this->endSection() ?>

<?= $this->section('body') ?>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <!-- <h5 class="card-title">Listado de facturas</h5> -->

              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                      <tr style="background-color: #0097A7">
                        <th>Número de factura</th>
                        <th>Emisor</th>
                        <th>Cliente</th>
                        <th>Envío</th>
                        <th>Validación</th>
                        <th>Fecha Envio</th>
                        <th>Fecha Validación</th>
                        <th>Factura</th>
                        <th>Validar ATV</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($facturas as $key => $factura):?>
                      <tr>
                        <td><?=$factura->consecutivo?></td> 
                        <td><?=$factura->emisor_nombre?></td>
                        <td><?=$factura->receptor_nombre?></td>
                        <td>
                          <?php if ($factura->envio_atv==1): ?>
                            Enviado
                          <?php else: ?>
                            No enviado
                          <?php endif ?>
                        </td>
                        <td>
                        <?php if ($factura->valido_atv==1): ?>
                            Validado
                          <?php else: ?>
                            No validado
                          <?php endif ?>
                        </td>
                        <td><?=$factura->fecha_envio?></td>
                        <td><?=$factura->fecha_valido?></td>
                        <td><a href="<?=base_url()?>/archivos/pdf/<?=$factura->clave?>.pdf" target="_blank">
                        <img src="<?=base_url()?>/plantilla/dist/img/factura.png" style="width: 64px; height: 57px">
                        <td>
                          <?php if ($factura->valido_atv == 0 && $factura->envio_atv==1): ?>
                            <button type="button" class="btn btn-sm btnValidarLinea" value="<?=$factura->clave?>"><i class="far fa-share-square fa-3x" style="color:#DD3410;"></i></button>
                          <?php else: ?>
                            <button type="button" class="btn btn-sm btnValidarLinea" disabled><i class="far fa-share-square fa-3x"></i></button>
                          <?php endif ?>
                        </td>
                        </a></td>
                      </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>

              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div>
        </div>  
      </div>
    </div>
  </div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script type="text/javascript">
 
 $(document).on('click','.btnValidarLinea',function(){
  Pace.track(function () {
    $.ajax({
      "url": "<?=base_url()?>/factura/validarXmlDesatendido",
      "method": "post",
      "data": {"clave": $('.btnValidarLinea').val()},
      "dataType": "json",
    }).done(function (response) {
      window.location.reload();
      alert('Documento '+response.estado);
    });
  });
});
   
</script>
<?= $this->endSection() ?>