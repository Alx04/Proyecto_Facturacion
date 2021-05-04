<?= $this->extend('base') ?>

<?= $this->section('header') ?>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dash</h1>
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
              <h5 class="card-title">Listado de facturas</h5>

              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                      <tr style="background-color: #0097A7">
                        <th>Número de factura</th>
                        <th>Fecha</th>
                        <th>Emisor</th>
                        <th>Cliente</th>
                        <th>Factura</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($facturas as $key => $factura):?>
                      <tr>
                        <td><?=$factura->consecutivo?></td>
                        <td><?=$factura->fecha?></td>  
                        <td><?=$factura->emisor_nombre?></td>
                        <td><?=$factura->receptor_nombre?></td>
                        <td><a href="<?=base_url()?>/archivos/pdf/Documento <?=$factura->clave?>.pdf" target="_blank"><img src="<?=base_url()?>/plantilla/dist/img/facturaLogo.png" style="width: 75px; height: 75px">
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


