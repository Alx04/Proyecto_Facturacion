

<?= $this->extend('base') ?>

<?= $this->section('header') ?>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Crear Factura Electrónica</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Facturar</a></li>
            <li class="breadcrumb-item active">Nueva</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<?= $this->endSection() ?>

<?= $this->section('body') ?>
<div class="content">
  <div class="container-fluid">
    <form id="frmFacturar" method="post">
      <!--encabezado-->
      <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header bg-info">
                <h5 class="card-title">Encabezado</h5>
              </div>
              <div class="card-body">
                <div class="row">

                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-user"></i></span>
                        </div>
                        <select class="form-control" id="id_cliente" name="id_cliente" required>
                          <option value="">Selecione Cliente</option>
                          <?php foreach ($clientes as $key => $cliente): ?>
                            <option value="<?=$cliente->id_cliente?>"><?=$cliente->razon?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
                        </div>
                        <select class="form-control" id="moneda" name="moneda" required>
                          <option value="">Selecione Moneda</option>
                          <option value="CRC">Colones</option>
                          <option value="USD">Dolares</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-hand-holding-usd"></i></span>
                        </div>
                        <input class="form-control" id="tipo_cambio" name="tipo_cambio" readonly required>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-cash-register"></i></span>
                        </div>
                        <select class="form-control" id="medio_pago" name="medio_pago" required>
                          <option value="">Selecione Medio Pago</option>
                          <option value="01">Efectivo</option>
                          <option value="04">Transferencia</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-handshake"></i></span>
                        </div>
                        <select class="form-control" id="condicion_venta" name="condicion_venta" required>
                          <option value="">Condicion Venta</option>
                          <option value="01">Contado</option>
                          <option value="02">Credito 30 dias</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>  
      </div>

      <!--Detalles-->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header bg-info">
              <h5 class="card-title">Detalles del documento</h5>
              <button type="button" class="btn btn-secondary float-right btn-sm agregarLinea">
                <i class="fas fa-plus"></i> Nueva Linea
              </button>
            </div>
            <div class="card-body">
              <div class="row table-responsive">
                <table class="table-hover table-bordered">
                  <thead>
                    <tr style="text-align:center">
                      <th>Codigo</th>
                      <th>Detalle</th>
                      <th>Unid</th>
                      <th>Cantidad</th>
                      <th>Precio</th>
                      <th>Neto</th>
                      <th>Desc. %</th>
                      <th>Monto Desc.</th>
                      <th>Subtotal</th>
                      <th>Imp. %</th>
                      <th>Monto Imp.</th>
                      <th>Total Linea</th>
                      <th width="3px"></th>
                    </tr>
                  </thead>
                  <tbody id="tblDetalles">
                    <tr id="linea1" class="linea">
                      <td width="12%">
                        <select class="form-control" name="codigo[]" required>
                          <option value="8344900000000">8344900000000</option>
                        </select>
                      </td>
                      <td width="8%">
                        <input class="form-control" type="text" name="detalle[]" required>
                      </td>
                      <td width="8%">
                        <select class="form-control" name="unidad[]" required>
                          <option value="Unid">Un</option>
                          <option value="Sp">Sp</option>
                        </select>
                      </td>
                      <td width="2%">
                        <input class="form-control cantidad calcular" min="1" type="number" name="cantidad[]" required>
                      </td>
                      <td width="8%">
                        <input class="form-control precio calcular" min="0" type="number" name="precio_unidad[]" required>
                      </td>
                      <td width="10%">
                        <input class="form-control neto" type="number" name="monto_total[]" readonly required>
                      </td>
                      <td width="8%">
                        <input class="form-control descP calcular" max="100" min="0" type="number" value="0">
                      </td>
                      <td width="8%">
                        <input class="form-control descM" type="number" name="monto_descuento[]"  readonly required>
                      </td>
                      <td width="8%">
                        <input class="form-control subtotal" type="number" name="sub_total[]" readonly required>
                      </td>
                      <td width="6%">
                        <input class="form-control impP" type="number"  value="13" name="tarifa[]" readonly required>
                      </td>
                      <td width="8%">
                        <input class="form-control impM" type="number" readonly name="monto_impuesto[]" required>
                      </td>
                      <td width="8%">
                        <input class="form-control totalL" type="number"  readonly  name="total_linea[]" required>
                      </td>
                      <td>
                        <button type="button" class="btn btn-sm btn-danger eliminarLinea" disabled>
                          <i class="fas fa-times-circle"></i>
                        </button>
                        </td>
                    </tr>
                  </tbody>
                  <tfoot class="table-sm sinBorde" >
                    <tr>
                      <td colspan="11" align="right">Neto</td>
                      <td align="right" class="lblNeto">0</td>
                    </tr>
                    <tr>
                      <td colspan="11" align="right">Descuentos</td>
                      <td align="right" class="lblDescuentos">0</td>
                    </tr>
                    <tr>
                      <td colspan="11" align="right">Subtotal</td>
                      <td align="right" class="lblSubtotal">0</td>
                    </tr>
                    <tr>
                      <td colspan="11" align="right">IVA</td>
                      <td align="right" class="lblIVA">0</td>
                    </tr>
                    <tr>
                      <td colspan="11" align="right">Exnonerado</td>
                      <td align="right" class="lblExnonerado">0</td>
                    </tr>
                    <tr>
                      <td colspan="10"><input type="text" name="notas" placeholder="Observaciones" class="form-control bg-gray color-palette text-white"></td>
                      <td align="right">Total</td>
                      <td align="right" class="lblTotal">0</td>
                    </tr>
                    
                  </tfoot>
                </table>
              </div>
              <div class="row">
                <div class="col-12" style="text-align: center;">
                  <button id="btnGenerarFactura"  type="submit" class="btn btn-success"> <i class="fas fa-check-circle"></i> Generar Documento</button>
                </div>
              </div>
            </div>
          </div>
        </div>  
      </div>
    </form>
  </div>
</div>

<!--Modal-->
<div class="modal fade" id="modalRespuesta">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-info">
        <h4 class="modal-title">Documento Creado</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
              <label>Clave</label>
              <input type="text" class="form-control" id="clave">
            </div>
            <div class="form-group">
              <label>Enviado</label>
              <div class="input-group mb-3">
                <input type="text" id="enviado" class="form-control">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-check" id="icon_enviado"></i></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Validado</label>
              <div class="input-group mb-3">
                <input type="text" id="validado" class="form-control">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-check" id="icon_validado"></i></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Mensaje</label>
              <input type="text" class="form-control" id="mensaje">
            </div>
            <div class="form-group">
              <div class="row">
                <label style="margin-left:10px;">Validar</label>    
                <div id="validar" style="margin-left:10px;"></div>                 
              </div>
            </div>
        </form>
      </div>
      <div class="modal-footer justify-content-between">
        <a href="<?=base_url('factura/listado')?>"><button type="button" class="btn btn-info">Listado</button></a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<?= $this->endSection() ?>


<?= $this->section('script') ?>

<script type="text/javascript">

$(document).on('change','#moneda',function(){
  var moneda= this.value;
  if (moneda!=""){
    Pace.track(function () {
      $.ajax({
        "url": "https://api.hacienda.go.cr/indicadores/tc/dolar",
        "method": "GET",
        "dataType": "json"
      }).done(function (response) {
        if (moneda=="CRC") {
          $("#tipo_cambio").val(response.compra.valor);
        }else if(moneda=="USD"){
          $("#tipo_cambio").val(response.venta.valor);
        }
        
      });
    });
  }else{
    $("#tipo_cambio").val("");
  }
});

$(document).on('keyup change','.calcular',function(){
  var cantidad= $(this).parents(".linea").find(".cantidad").val();
  var precio= $(this).parents(".linea").find(".precio").val();
  var neto= cantidad*precio;
  var descP= $(this).parents(".linea").find(".descP").val();
  var descM= (neto*descP)/100;
  var subtotal= neto-descM;
  var impP= $(this).parents(".linea").find(".impP").val();
  var impM= (subtotal*impP)/100;
  var totalL= subtotal+impM;

  $(this).parents(".linea").find(".neto").val(neto);
  $(this).parents(".linea").find(".descM").val(descM);
  $(this).parents(".linea").find(".subtotal").val(subtotal);
  $(this).parents(".linea").find(".impM").val(impM);
  $(this).parents(".linea").find(".totalL").val(totalL);

  totales();

});

function totales(){
  neto=0;
  descuentos=0;
  subtotal=0
  IVA=0;
  total=0;

  $("table tbody .linea").each(function(i, item) {
    neto += parseFloat($(item).find(".neto").val());
    descuentos += parseFloat($(item).find(".descM").val());
    subtotal += parseFloat($(item).find(".subtotal").val());
    IVA += parseFloat($(item).find(".impM").val());
    total += parseFloat($(item).find(".totalL").val());
  });
  $(".lblNeto").text(parseFloat(neto).toFixed(2));
  $(".lblDescuentos").text(parseFloat(descuentos).toFixed(2));
  $(".lblSubtotal").text(parseFloat(subtotal).toFixed(2));
  $(".lblIVA").text(parseFloat(IVA).toFixed(2));
  $(".lblTotal").text(parseFloat(total).toFixed(2));
}

$(document).on('click','.agregarLinea',function(){
  $("#linea1").clone().prependTo("#tblDetalles");
  $(".linea").last().find("input, select").prop('value', "");
  $(".eliminarLinea").prop('disabled', false);
  $(".linea").last().find(".impP").val('13');
  $(".linea").last().find(".descP").val('0');
});

$(document).on('click','.eliminarLinea',function(){
  $(this).parents(".linea").remove();
  if ($(".linea").length == 1) {
      $(".eliminarLinea").removeClass("btn-light-danger").addClass("btn-light-dark");
      $(".eliminarLinea").prop('disabled', true);
  }else{
    $(".eliminarLinea").removeClass("btn-light-dark").addClass("btn-light-danger");
    $(".eliminarLinea").prop('disabled', false);
  }
  totales();
});

$("#frmFacturar").on('submit', function(e){
  $("#btnGenerarFactura").attr('disabled', true);
  e.preventDefault();
  Pace.track(function () {
    $.ajax({
      "url": "<?=base_url()?>/factura/generarFactura",
      "method": "post",
      "data": $('#frmFacturar').serialize(),
      "dataType": "json",
    }).done(function (response) {
      $("#modalRespuesta").modal('show');
    }).always(function (response) {
        $("#clave").val(response.clave);
        //si fue enviado
        if (response.enviar>=200 && response.enviar<300) {
          $("#enviado").val('enviado');
        }else{
          $("#enviado").val(response.enviar);
          $("#icon_enviado").addClass("fa-times");
          $("#icon_validado").addClass("fa-times");
        }
        
        // si fuue valido
        $("#validado").val(response.validar_estado);
        if (response.mensaje==3) {
          $("#icon_validado").addClass("fa-times");
          alert("documento rechazado");
        }
        $("#mensaje").val(response.validar_mensaje);
        $("#validar").html('');
        if (response.validar_estado=="procesando") {
          $("#icon_validado").addClass("fa-exclamation");
          $("#validar").append('<button type="button" data-toggle="modal" data-target="#modalRespuesta" class="btn btn-warning btn-sm reValidar" value="'+response.clave+'">Validar</button>');
        }
      $("#btnGenerarFactura").attr('disabled', false);
    });
  });
});

$(document).on('click','.reValidar',function(){
  Pace.track(function () {
    $.ajax({
      "url": "<?=base_url()?>/factura/validarXmlDesatendido",
      "method": "post",
      "data": {"clave": $('.reValidar').val()},
      "dataType": "json",
    }).done(function (response) {
      $("#modalRespuesta").modal('show');
      if(response.estado == 'aceptado'){
        $("#icon_validado").removeClass("fa-exclamation").addClass("fa-check"); 
      }
      $("#validado").val(response.estado);
      $("#validar").html(response.estado);
      $("#mensaje").val(response.estado);

    }).always(function (response) {
      $("#btnGenerarFactura").attr('disabled', false);
    });
  });
});

</script>
<?= $this->endSection() ?>



