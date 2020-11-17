<!-- importar el js usuario -->
<script type="text/javascript" src="../js/consulta.js?rev=<?php echo time();?>"></script>
<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
              <h3 class="box-title">MANTENIMIENTO DE CONSULTA</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
            <div class="box-body">
              <!-- grupo de tabla -->
            <div class="form-group">
              <!-- barra de busqueda -->
                <div class="col-lg-4">
                  <label for="">Fecha Inicio</label>
                  <input type="date" name="" id="txt_fechainicio" class="form-control">
                </div>
                <div class="col-lg-4">
                  <label for="">Fecha fin</label>
                  <input type="date" name="" id="txt_fechafin" class="form-control">
                </div>
                <div class="col-lg-2">
                 <label for="">&nbsp;</label><br>
                  <!-- boton nuevo registro de usuario -->
                  
                    <button class="btn btn-danger" style="width:100%" onclick="AbrirModalRegistro()"><i class="glyphicon glyphicon-search"></i>Buscar</button>
                </div>
                <div class="col-lg-2">
                 <label for="">&nbsp;</label><br>
                  <!-- boton nuevo registro de usuario -->
                    <button class="btn btn-danger" style="width:100%" onclick="AbrirModalRegistro()"><i class="glyphicon glyphicon-plus"></i>Nuevo Registro</button>
                </div>
            </div>
            <!-- datos de mi tabla -->
            <table id="tabla_consulta" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nro documento</th>
                        <th>CLiente</th>
                        <th>Fecha</th>
                        <th>Tecnico</th>
                        <th>Especialidad</th>
                        <th>Estado</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>#</th>
                        <th>Nro documento</th>
                        <th>CLiente</th>
                        <th>Fecha</th>
                        <th>Tecnico</th>
                        <th>Especialidad</th>
                        <th>Estado</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </tfoot>
            </table>
            </div>
    </div>
</div>
    <div class="modal fade" id="modal_registro" role="dialog">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" >&times;</button>
            <h4 class="modal-title"><b>Registro de cita</b></h4>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                <label for="">Cliente</label>
                    <select class="js-example-basic-single" name="state" id="cbm_cliente" style="width:100%;">
                    </select><br><br>
               </div>
                <div class="col-lg-6">
                    <label for="">Especialidad</label>
                    <select class="js-example-basic-single" name="state" id="cbm_especialidad" style="width:100%;">
                    </select><br><br>
                </div>
                <div class="col-lg-6">
                    <label for="">Tecnico</label>
                    <select class="js-example-basic-single" name="state" id="cbm_tecnico" style="width:100%;">
                    </select><br><br>
                </div>
                <div class="col-lg-12">
                <label for="">Descripcion problema</label>
                  <textarea  id="txt_descripcion" rows="3" class="form-control" style="resize:none;"></textarea>
                </div><br><br><br><br>
            </div>
            <div class="modal-footer">
              <!-- botones registro/cancelar -->
                <button class="btn btn-primary" onclick="Registrar_Especialidad()"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
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
            <h4 class="modal-title"><b>Editar Especialidad</b></h4>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                     <input type="text" id="id_especialidad" hidden>
                     <label for="">Nombre</label>
                    <input type="text"  id="txt_especialidad_actual_editar" placeholder="Ingresa una especialidad" hidden>
                    <input type="text" class="form-control" id="txt_especialidad_nueva_editar" placeholder="Ingresa una especialidad"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Estado</label>
                    <select class="js-example-basic-single" name="state" id="cbm_estatus_editar" style="width:100%;">
                        <option value="ACTIVO">ACTIVO</option>
                        <option value="INACTIVO">INACTIVO</option>
                    </select><br><br>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Editar_Especialidad()"><i class="fa fa-check"><b>&nbsp;Editar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
        </div>
    </div>

<script>
$(document).ready(function() {
    listar_consulta();
    $('.js-example-basic-single').select2();
    $("#modal_registro").on('shown.bs.modal',function(){
        $("#txt_especialidad").focus();
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
