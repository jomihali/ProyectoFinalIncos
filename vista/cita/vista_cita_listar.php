<!-- importar el js usuario -->
<script type="text/javascript" src="../js/cita.js?rev=<?php echo time();?>"></script>
<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
              <h3 class="box-title">MANTENIMIENTO DE CITA</h3>
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
            <table id="tabla_cita" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nro</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Tecnico</th>
                        <th>Estado</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>#</th>
                        <th>Nro</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Tecnico</th>
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
                <div class="col-lg-6">
                <label for="">Cliente</label>
                    <select class="js-example-basic-single" name="state" id="cbm_cliente" style="width:100%;">
                    </select><br><br>
               </div>
                <div class="col-lg-6">
                    <label for="">Especialidad</label>
                    <select class="js-example-basic-single" name="state" id="cbm_especialidad" style="width:100%;">
                    </select><br><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Tecnico</label>
                    <select class="js-example-basic-single" name="state" id="cbm_tecnico" style="width:100%;">
                    </select><br><br>
                </div>
                <div class="col-lg-12">
                <label for="">Descripcion</label>
                  <textarea  id="txt_descripcion" rows="3" class="form-control" style="resize:none;"></textarea>
                </div><br><br><br>
            </div>
            <div class="modal-footer">
              <!-- botones registro/cancelar -->
                <button class="btn btn-primary" onclick="Registrar_Cita()"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="modal_editar" role="dialog">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" >&times;</button>
            <h4 class="modal-title"><b>Editar de cita</b></h4>
            </div>
            <div class="modal-body">
                <div class="col-lg-6">
                <input type="text" id="txt_cita_id" hidden>
                <label for="">Cliente</label>
                    <select class="js-example-basic-single" name="state" id="cbm_cliente_editar" style="width:100%;">
                    </select><br><br>
               </div>
                <div class="col-lg-6">
                    <label for="">Especialidad</label>
                    <select class="js-example-basic-single" name="state" id="cbm_especialidad_editar" style="width:100%;">
                    </select><br><br>
                </div>
                <div class="col-lg-6">
                    <label for="">Tecnico</label>
                    <select class="js-example-basic-single" name="state" id="cbm_tecnico_editar" style="width:100%;">
                    </select><br><br>
                </div>
                <div class="col-lg-6">
                    <label for="">Estado</label>
                    <select class="js-example-basic-single" name="state" id="cbm_estatus" style="width:100%;">
                     <option value="PENDIENTE">PENDIENTE</option>
                     <option value="CANCELADA">CANCELADA</option>
                    </select><br><br>
                </div>
                <div class="col-lg-12">
                <label for="">Descripcion</label>
                  <textarea  id="txt_descripcion_editar" rows="3" class="form-control" style="resize:none;"></textarea>
                </div><br><br><br>
            </div>
            <div class="modal-footer">
              <!-- botones registro/cancelar -->
                <button class="btn btn-primary" onclick="Editar_Cita()"><i class="fa fa-check"><b>&nbsp;Editar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
        </div>
    </div>


<script>
$(document).ready(function() {
    listar_cita(); 
    listar_cliente_combo();
    listar_especialidad_combo();
    listar_cliente_combo_editar();
    listar_especialidad_combo_editar();
    $("#cbm_especialidad").change(function() {
        var idtecnico=$("#cbm_especialidad").val();
        listar_tecnico_combo(idtecnico);
    });
    $("#cbm_especialidad_editar").change(function() {
        var idtecnico=$("#cbm_especialidad_editar").val();
        listar_tecnico_combo_editar(idtecnico);
    });
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
