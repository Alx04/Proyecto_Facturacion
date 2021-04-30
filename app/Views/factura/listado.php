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
                      <tr>
                        <th>Número de factura</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Emisor</th>
                        <th>Cliente</th>
                        <th>Factura</th>
                      </tr>
                  </thead>
                  <tbody>
          
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


