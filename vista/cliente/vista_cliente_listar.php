<!-- importar el js usuario --> 
<script type="text/javascript" src="../js/cliente.js?rev=<?php echo time();?>"></script>
<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
              <h3 class="box-title">MANTENIMIENTO DE CLIENTES</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
            <div class="box-body">
              <!-- grupo de tabla -->
            <div class="form-group">
              <!-- barra de busqueda -->
                <div class="col-lg-10">
                    <div class="input-group">
                        <input type="text" class="global_filter form-control" id="global_filter" placeholder="Busqueda">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    </div>
                </div>
                <div class="col-lg-2">
                  <!-- boton nuevo registro de usuario -->
                    <button class="btn btn-danger" style="width:100%" onclick="AbrirModalRegistro()"><i class="glyphicon glyphicon-plus"></i>Nuevo Registro</button>
                </div>
            </div>
            <!-- datos de mi tabla -->
            <table id="tabla_cliente" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nro documento</th>
                        <th>Cliente</th>
                        <th>Computadora</th>
                        <th>Direccion</th>
                        <th>Movil</th>
                        <th>Estado</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>#</th>
                        <th>Nro documento</th>
                        <th>Cliente</th>
                        <th>Computadora</th>
                        <th>Direccion</th>
                        <th>Movil</th>
                        <th>Estado</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </tfoot>
            </table>
            </div>
    </div>
</div>

<div class="modal fade" id="modal_registro" role="dialog">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" >&times;</button>
            <h4 class="modal-title"><b>Registro de Cliente</b></h4>
            </div>
            <div class="modal-body">
              <div class="row">
              <div class="col-lg-12">
                    <label for="">N documento</label>
                    <input type="text" class="form-control" id="txt_ndoc" maxlength="12" onkeypress="return soloNumeros(event)" placeholder="Numero de documento"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Nombres</label>
                    <input type="text" class="form-control" id="txt_nombres" maxlength="50" onkeypress="return soloLetras(event)" placeholder="Ingresa nombres"><br>
                </div>
                  <div class="col-lg-12">
                    <label for="">Apellido paterno</label>
                    <input type="text" class="form-control" id="txt_apepat" maxlength="50" onkeypress="return soloLetras(event)" placeholder="Apellido paterno"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Apellido materno</label>
                    <input type="text" class="form-control" id="txt_apemat" maxlength="50" onkeypress="return soloLetras(event)" placeholder="Apellido materno"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Direccion</label>
                    <input type="text" class="form-control" id="txt_direccion" maxlength="80" onkeypress="return soloLetras(event)" placeholder="Ingresa direccion"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Movil</label>
                    <input type="text" class="form-control" id="txt_movil" maxlength="8" onkeypress="return solNumeros(event)" placeholder="Ingresa movil"><br>
                </div>
                <div class="col-lg-12">
                <label for="">Modelo de Computadora</label>
                    <input type="text" class="form-control" id="txt_modelo" placeholder="Modelo de computadora"><br> 
                    </select>
                </div>
            </div>
          </div>
          <div class="modal-footer">
              <!-- botones registro/cancelar -->
                <button class="btn btn-primary" onclick="Registrar_Cliente()"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="modal_editar" role="dialog">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" >&times;</button>
            <h4 class="modal-title"><b>Modificar Cliente</b></h4>
            </div>
            <div class="modal-body">
              <div class="row">
              <input type="text" id="txt_idcliente" hidden>
              <div class="col-lg-12">
                    <label for="">N documento</label>
                    <input type="text"  id="txt_ndoc_actual_editar" placeholder="Numero de documento" hidden>
                    <input type="text" class="form-control" id="txt_ndoc_nuevo_editar" placeholder="Numero de documento">
                </div>
                <div class="col-lg-12">
                    <label for="">Nombres</label>
                    <input type="text" class="form-control" id="txt_nombres_editar" placeholder="Ingresa nombres"><br>
                </div>
                  <div class="col-lg-12">
                    <label for="">Apellido paterno</label>
                    <input type="text" class="form-control" id="txt_apepat_editar" placeholder="Apellido paterno"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Apellido materno</label>
                    <input type="text" class="form-control" id="txt_apemat_editar" placeholder="Apellido materno"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Direccion</label>
                    <input type="text" class="form-control" id="txt_direccion_editar" placeholder="Ingresa direccion"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Movil</label>
                    <input type="text" class="form-control" id="txt_movil_editar" placeholder="Ingresa movil"><br>
                </div>
                <div class="col-lg-12">
                <label for="">Modelo de Computadora</label>
                    <input type="text" class="form-control" id="txt_modelo_editar" placeholder="Modelo de computadora"><br> 
                    
                </div>
                <div class="col-lg-12">
                <label for="">Estado</label>
                    <select class="js-example-basic-single" name="state" id="cbm_estatus_editar" style="width:100%;">
                      <option value="ACTIVO">ACTIVO</option>
                      <option value="INACTIVO">INACTIVO</option>
                    </select>
                </div>
            </div>
          </div>
          <div class="modal-footer">
              <!-- botones registro/cancelar -->
                <button class="btn btn-primary" onclick="Modificar_Cliente()"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
        </div>
    </div>

<script>


$(document).ready(function() {
    listar_cliente();
    $('.js-example-basic-single').select2();
    $("#modal_registro").on('shown.bs.modal',function(){
        $("#txt_ndoc").focus();
    })
} );
$('.box').boxWidget({
    animationSpeed:500,
    collapseTrigger:'[data-widget="collapse"]',
    removeTrigger:'[data-widget="remove"]',
    collapseIcon:'fa-minus',
    expandIcon:'fa-plus',
    removeIcon:'fa-times'
})
</script>
