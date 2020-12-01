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
                <label for="">&nbsp;</label>
                    <button class="btn btn-success" style="width:100%" onclick="listar_consulta()"><i class="glyphicon glyphicon-search"></i>Buscar</button>
                </div>
            </div>
                <div class="col-lg-2">
                <label for="">&nbsp;</label><br>
                    <button class="btn btn-danger" style="width:100%" onclick="AbrirModalRegistro()"><i class="glyphicon glyphicon-plus"></i>Nuevo Registro</button>
                </div>
            </div><br>
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
            <h4 class="modal-title"><b>Registro de consulta</b></h4>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                <label for="">Cliente</label>
                    <select class="js-example-basic-single" name="state" id="cbm_cliente_consulta" style="width:100%;">
                    </select><br>
               </div>
                <div class="col-lg-12">
                <label for="">Descripcion problema</label>
                  <textarea  id="txt_descripcion_consulta" rows="3" class="form-control" style="resize:none;"></textarea>
                </div>
                <div class="col-lg-12">
                <label for="">Diagnostico</label>
                  <textarea  id="txt_diagnostico_consulta" rows="3" class="form-control" style="resize:none;"></textarea>
                </div><br>
            </div>
            <div class="modal-footer">
              <!-- botones registro/cancelar -->
                <button class="btn btn-primary" onclick="Registrar_Consulta()"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
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
            <h4 class="modal-title"><b>Editar consulta</b></h4>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
                     <input type="text" id="txt_consulta_id" hidden>
                     <label for="">Cliente</label>
                    <input type="text"  id="txt_cliente_consultaeditar" readonly class="form-control"><br>
                </div>
                <div class="col-lg-12">
                     <label for="">Descripcion</label>
                    <textarea type="text"  id="txt_descripcion_consultaeditar" rowa="3" class="form-control" style="resize:none"></textarea><br>
                </div>
                <div class="col-lg-12">
                     <label for="">Diagnostico</label>
                    <textarea type="text"  id="txt_diagnostico_consultaeditar" rowa="3" class="form-control" style="resize:none"></textarea><br>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Editar_Consulta()"><i class="fa fa-check"><b>&nbsp;Editar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
        </div>
    </div>

<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();

    $("#modal_registro").on('shown.bs.modal',function(){
        $("#txt_especialidad").focus();
    });
    listar_consulta();
    listar_cliente_combo_consulta();
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
