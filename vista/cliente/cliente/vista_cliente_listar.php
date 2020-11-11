<!-- importar el js usuario --> 
<script type="text/javascript" src="../js/cliente.js?rev=<?php echo time();?>"></script>
<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
              <h3 class="box-title">MANTENIMIENTO DE CLIENTE</h3>
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
            <table id="tabla_tecnico" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nro documento</th>
                        <th>Nombre</th>
                        <th>Especialidad</th>
                        <th>Celular</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nro documento</th>
                        <th>Nombre</th>
                        <th>Especialidad</th>
                        <th>Celular</th>
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
            <h4 class="modal-title"><b>Registro de Tecnico</b></h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-12">
                    <label for="">Nombres</label>
                    <input type="text" class="form-control" id="txt_nombres" placeholder="Ingresa nombres"><br>
                </div>
                  <div class="col-lg-6">
                    <label for="">Apellido paterno</label>
                    <input type="text" class="form-control" id="txt_apepat" placeholder="Apellido paterno"><br>
                </div>
                <div class="col-lg-6">
                    <label for="">Apellido materno</label>
                    <input type="text" class="form-control" id="txt_apemat" placeholder="Apellido materno"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Direccion</label>
                    <input type="text" class="form-control" id="txt_direccion" placeholder="Ingresa direccion"><br>
                </div>
                <div class="col-lg-4">
                    <label for="">Sexo</label>
                    <select class="js-example-basic-single" name="state" id="cbm_sexo" style="width:100%;">
                        <option value="F">Femenino</option>
                        <option value="M">Masculino</option>
                    </select><br>
                </div>
                <div class="col-lg-4">
                    <label for="">Fecha Nacimiento</label>
                    <input type="date" class="form-control" id="txt_fenac"><br>
                </div>
                <div class="col-lg-4">
                    <label for="">N documento</label>
                    <input type="text" class="form-control" id="txt_ndoc" placeholder="Numero de documento"><br>
                </div>
                <div class="col-lg-6">
                    <label for="">Especialidad</label>
                    <select class="js-example-basic-single" name="state" id="cbm_especialidad" style="width:100%;">
                    </select><br><br>
                </div>
                <div class="col-lg-6">
                    <label for="">Movil</label>
                    <input type="text" class="form-control" id="txt_movil" placeholder="Ingresar movil">
                </div>
                <div class="col-lg-12" style="text-align:center">
                    <b> DATOS DE USUARIO</b><br><br>
                    </select><br><br>
                </div>
                <div class="col-lg-4">
                    <label for="">Usuario</label>
                    <input type="text" class="form-control" id="txt_usu" placeholder="Ingresar usuario"><br>
                </div>
                <div class="col-lg-4">
                    <label for="">Contrase&ntilde;a</label>
                    <input type="password" class="form-control" id="txt_contra" placeholder="Ingresar contrase&ntilde;a"><br>
                </div>
                <div class="col-lg-4">
                    <label for="">Rol</label>
                    <select class="js-example-basic-single" name="state" id="cbm_rol" style="width:100%;">
                    </select>
                </div>
                <div class="col-lg-12">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="txt_email" placeholder="Ingresar email"><br>
                    <label for="" id="emailOK" style="color:red"></label>
                    <input type="text" id="validar_email" hidden>
                </div>
            </div>
          </div>
          <div class="modal-footer">
              <!-- botones registro/cancelar -->
                <button class="btn btn-primary" onclick="Registrar_Tecnico()"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
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
            <h4 class="modal-title"><b>Editar Tecnico</b></h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-12">
                <input type="text" id="id_tecnico">
                    <label for="">Nombres</label>
                    <input type="text" class="form-control" id="txt_nombres_editar" placeholder="Ingresa nombres"><br>
                </div>
                  <div class="col-lg-6">
                    <label for="">Apellido paterno</label>
                    <input type="text" class="form-control" id="txt_apepat_editar" placeholder="Apellido paterno"><br>
                </div>
                <div class="col-lg-6">
                    <label for="">Apellido materno</label>
                    <input type="text" class="form-control" id="txt_apemat_editar" placeholder="Apellido materno"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Direccion</label>
                    <input type="text" class="form-control" id="txt_direccion_editar" placeholder="Ingresa direccion"><br>
                </div>
                <div class="col-lg-4">
                    <label for="">Sexo</label>
                    <select class="js-example-basic-single" name="state" id="cbm_sexo_editar" style="width:100%;">
                        <option value="F">Femenino</option>
                        <option value="M">Masculino</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="">Fecha Nacimiento</label>
                    <input type="date" class="form-control" id="txt_fenac_editar"><br>
                </div>
                <div class="col-lg-6">
                    <label for="">N documento</label>
                    <input type="text" class="form-control" id="txt_ndoc_editar_actual" placeholder="Numero de documento" disabled>
                    <input type="text" class="form-control" id="txt_ndoc_editar_nuevo" placeholder="Numero de documento">
                </div>
                <div class="col-lg-6">
                    <label for="">Especialidad</label>
                    <select class="js-example-basic-single" name="state" id="cbm_especialidad_editar" style="width:100%;">
                    </select><br><br>
                </div>
                <div class="col-lg-4">
                    <label for="">Movil</label>
                    <input type="text" class="form-control" id="txt_movil_editar" placeholder="Ingresar movil"><br>
                </div>
                <div class="col-lg-12" style="text-align:center">
                    <b> DATOS DE USUARIO</b><br><br>
                    </select><br><br>
                </div>
                <div class="col-lg-6">
                <input class="text" id="id_usuario">
                    <label for="">Usuario</label>
                    <input type="text" class="form-control" id="txt_usu_editar" placeholder="Ingresar usuario" disabled><br>
                </div>
                <div class="col-lg-6">
                    <label for="">Rol</label>
                    <select class="js-example-basic-single" name="state" id="cbm_rol_editar" style="width:100%;" disabled>
                    </select>
                </div>
                <div class="col-lg-12">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="txt_email_editar" placeholder="Ingresar email"><br>
                    <label for="" id="emailOK_editar" style="color:red"></label>
                    <input type="text" id="validar_email_editar" hidden>
                </div>
            </div>
          </div>
               <div class="col-lg-12"></div>
          <div class="modal-footer">
              <!-- botones registro/cancelar -->
                <button class="btn btn-primary" onclick="Editar_Tecnico()"><i class="fa fa-check"><b>&nbsp;Editar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
        </div>
    </div>

<script>
$(document).ready(function() {
    listar_tecnico();
    listar_combo_rol();
    listar_combo_especialidad();
    $('.js-example-basic-single').select2();
    $("#modal_registro").on('shown.bs.modal',function(){
        $("#txt_nombres").focus();
    })
} );

document.getElementById('txt_email').addEventListener('input',function(){
  campo=event.target;
  emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
  if(emailRegex.test(campo.value)){
      $(this).css("border","");
      $("#emailOK").html("");
      $("#validar_email").val("correcto");
  }else{
    $(this).css("border","1px solid red");
    $("#emailOK").html("Email incorrecto");
    $("#validar_email").val("incorrecto");
  }
});

document.getElementById('txt_email_editar').addEventListener('input',function(){
  campo=event.target;
  emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
  if(emailRegex.test(campo.value)){
      $(this).css("border","");
      $("#emailOK_editar").html("");
      $("#validar_email_editar").val("correcto");
  }else{
    $(this).css("border","1px solid red");
    $("#emailOK_editar").html("Email incorrecto");
    $("#validar_email_editar").val("incorrecto");
  }
});


$('.box').boxWidget({
    animationSpeed:500,
    collapseTrigger:'[data-widget="collapse"]',
    removeTrigger:'[data-widget="remove"]',
    collapseIcon:'fa-minus',
    expandIcon:'fa-plus',
    removeIcon:'fa-times'
})
</script>
