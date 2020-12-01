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
                <div class="col-lg-2">
                    <label for="">Codigo de historial</label>
                    <input type="text" id="txt_codhistorial"  class="form-control" disabled>
                </div>
                <div class="col-lg-8">
                  <label for="">Cliente</label>
                  <input type="text" id="txt_cliente" class="form-control" disabled>
                </div>
                  <div class="col-lg-2">
                    <label for="">&nbsp;</label><br>
                    <button class="btn btn-success" onclick="AbrirModalConsulta()"><i class="fa fa-search"></i>Buscar consulta</button>
                </div>
                <div class="col-lg-6"><br>
                <label for="">Descripcion de la consulta</label>
                    <textarea name="" id="txt_desconsulta" cols="30" rows="3" disabled class="form-control"></textarea>
                </div>
                <div class="col-lg-6"><br>
                <label for="">Diagnostico de la consulta</label>
                    <textarea name="" id="txt_diagconsulta" cols="30" rows="3" disabled class="form-control"></textarea>
                </div>
                <input type="text" id="txt_idconsulta" hidden>

                <div class="col-md-12"><br>
                  <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#tab_1" data-toggle="tab">Procedimiento</a></li>
                      <li><a href="#tab_2" data-toggle="tab">Servicio</a></li>
                    </ul>
                      <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                      <div class="row">
                        <div class="col-lg-10">
                          <label for="">Seleccionar Procedimientos</label>
                            <select class="js-example-basic-single" name="state" id="cbm_procedimiento" style="width:100%;">
                            </select>
                        </div>
                    <div class="col-lg-2">
                          <label for="">&nbsp;</label><br>
                          <button class="btn btn-primary" style="width:100%;" onclick="Agregar_Procedimiento()"><i class="fa fa-plus-square"></i>&nbsp;Agregar</button>
                    </div>
                    <div class="col-lg-12 table-responsive"><br>
                      <table id="tabla_procedimiento" style="width:100%" class="table">
                          <thead bgcolor="black" style="color:#FFFFFF;">
                              <th>ID</th>
                              <th>Procedimiento</th>
                              <th>Accion</th>
                            </thead>
                            <tbody id="tbody_tabla_procedimiento">
                            </tbody>
                      </table>
                    </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_2">
                <div class="row">
                    <div class="col-lg-10">
                        <label for="">Seleccionar Servicios</label>
                        <select class="js-example-basic-single" name="state" id="cbm_servicio" style="width:100%;">
                        </select>
                    </div>
            <div class="col-lg-2">
              <label for="">&nbsp;</label><br>
              <button class="btn btn-primary"  style="width:100%;" onclick="Agregar_Servicio()"><i class="fa fa-plus-square"></i>&nbsp;Agregar</button>
                </div>
            <div class="col-lg-12 table-responsive"><br>
                    <table id="tabla_servicio" style="width:100%" class="table">
                        <thead bgcolor="black" style="color:#FFFFFF;">
                          <th>ID</th>
                          <th>Servicio</th>
                          <th>Accion</th>
                        </thead>
                        <tbody id="tbody_tabla_servicio">
                        </tbody>
                    </table>
                  </div>
                  </div>
                  </div>
            </div>
            <div class="col-md-12" style="text-align:center">
              <button class="btn btn-success btn-lg" onclick="Registrar_Historial()">REGISTRAR</button> 
          </div> 
          </div>
      </div>
  </div>
      <div class="modal fade" id="modal_consultas" role="dialog">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" >&times;</button>
              <h4 class="modal-title"><b>Listado de consulta</b></h4>
              </div>
              <div class="modal-body">
              <div class="row">
              <div class="col-lg-12 table-responsive">
                        <table id="tabla_comsulta_historial" class="display responsive nowrap" style="width:100%">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Fecha</th>
                          <th>Nro documento</th>
                          <th>CLiente</th>>
                          <th>Accion</th>
                      </tr>
                  </thead>
              </table>
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
      listar_procedimiento();
      listar_servicio();
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
    