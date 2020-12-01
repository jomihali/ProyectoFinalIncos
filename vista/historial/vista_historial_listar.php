<!-- importar el js usuario --> 
<script type="text/javascript" src="../js/historial.js?rev=<?php echo time();?>"></script>
        <div class="col-md-12">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">MANTENIMIENTO DE HISTORIAL</h3>
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
                                    <button class="btn btn-success" style="width:100%" onclick="listar_historial()"><i class="glyphicon glyphicon-search"></i>Buscar</button>
                                </div>
                            </div>
                                <div class="col-lg-2">
                                <label for="">&nbsp;</label><br>
                                    <button class="btn btn-danger" style="width:100%" onclick="cargar_contenido('contenido_principal','historial/vista_historial_registro.php')"><i class="glyphicon glyphicon-plus"></i>Nuevo Registro</button>
                                </div>
                   
                <div class="col-lg-12 table-responsive">
                            <table id="tabla_historial" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fecha</th>
                                <th>Nro documento</th>
                                <th>CLiente</th>
                                <th>Diagnostico</th>
                                <th>Ver detalle FUA</th>
                                <th>Generar PDF</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Fecha</th>
                                <th>Nro documento</th>
                                <th>CLiente</th>
                                <th>Diagnostico</th>
                                <th>Ver detalle FUA</th>
                                <th>Generar PDF</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                </div>
            </div>
             </div>
           
         <div class="modal fade" id="modal_detalle" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" >&times;</button>
                        <h4 class="modal-title"><b>Detalle de fua</b></h4>
                    </div>
                    <div class="modal-body">
                         <div class="row">
                            <div class="col-md-12"><br>
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab">Procedimiento</a></li>
                                <li><a href="#tab_2" data-toggle="tab">Servicio</a></li>
                                </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                  <div class="row">
                                            <div class="col-lg-12 table-responsive">
                                                 <table id="tabla_prodecidimiento" class="display responsive nowrap" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nombre</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nombre</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>  
                                  </div>   
                            <div class="tab-pane" id="tab_2">
                                <div class="row">
                                    <div class="col-lg-12 table-responsive">
                                                 <table id="tabla_servicio" class="display responsive nowrap" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nombre</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nombre</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                     </div>
                                 </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
                    </div>
                   </div>
                </div>
                </div>
            </div>
        </div>

    <div class="modal fade" id="modal_diagnostico" role="dialog">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" >&times;</button>
            <h4 class="modal-title"><b>Diagnostico de la cita</b></h4>
            </div>
            <div class="modal-body">
               <div class="row">
                 <div class="col-lg-12">
                     <textarea class="form-control" id="txt_diagnostico_fua"  rows="3"  disabled></textarea>
                 </div>
              </div>

            </div>
            <div class="modal-footer">
             
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
    listar_historial();

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
