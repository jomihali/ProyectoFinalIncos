var tabletecnico;  
function listar_tecnico(){
    tabletecnico = $("#tabla_tecnico").DataTable({
       "ordering":false,
       "bLengthChange":false,
       // agilizar datos
       "searching": { "regex": false },
       "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
// muestra los primeros 10 resultados
       "pageLength": 10,
       "destroy":true,
       "async": false ,
       "processing": true,
       "ajax":{
           "url":"../controlador/tecnico/controlador_tecnico_listar.php",
           type:'POST'
       },
       // para el controlador_usuario_listar llama a sus datos
        "order":[[1,'asc']],
       "columns":[
           {"defaultContent":""},
           {"data":"tecnico_nrodocumento"},
           {"data":"tecnico"},
           {"data":"especialidad_nombre"},
           {"data":"tecnico_movil"},
           {"defaultContent":"<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>"}
       ],
       "language":idioma_espanol, 
       select: true
   });
   document.getElementById("tabla_tecnico_filter").style.display="none";
   $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    });
    tabletecnico.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_tecnico').DataTable().page.info();
        tabletecnico.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );
}

function filterGlobal() {
    $('#tabla_tecnico').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}

function AbrirModalRegistro(){
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $("#modal_registro").modal('show');
    listar_combo_rol();
    listar_combo_especialidad();
  }

  $('#tabla_tecnico').on('click','.editar',function(){
    var data = tabletecnico.row($(this).parents('tr')).data();//detecta a que fila hago click y enseña los datos de esa variable
    if(tabletecnico.row(this).child.isShown()){//lo mismo en responsive
        var data = tabletecnico.row(this).data();
    }
    $("#modal_editar").modal({backdrop:'static',keyboard:false})
    $("#modal_editar").modal('show');
    $("#id_tecnico").val(data.tecnico_id);
    $("#txt_nombres_editar").val(data.tecnico_nombre);
    $("#txt_apepat_editar").val(data.tecnico_apepat);
    $("#txt_apemat_editar").val(data.tecnico_apemat);
    $("#txt_direccion_editar").val(data.tecnico_direccion);
    $("#txt_movil_editar").val(data.tecnico_movil);
    $("#cbm_sexo_editar").val(data.tecnico_sexo).trigger("change");
    $("#txt_fenac_editar").val(data.tecnico_fenac);
    $("#txt_ndoc_editar_actual").val(data.tecnico_nrodocumento);
    $("#txt_ndoc_editar_nuevo").val(data.tecnico_nrodocumento);
    $("#cbm_especialidad_editar").val(data.especialidad_id).trigger("change");
    alert(data.especialidad_id);
    //datosu usuario
    $("#id_usuario").val(data.usu_id);
    $("#txt_usu_editar").val(data.usu_nombre);
    $("#cbm_rol_editar").val(data.rol_id).trigger("change");
    $("#txt_email_editar").val(data.usu_email);
})

function LimpiarCampos(){
    $("#txt_especialidad").val();
}
//combo de rol
function listar_combo_rol(){
    $.ajax({
        "url":"../controlador/usuario/controlador_combo_rol_listar.php",
        type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for(var i=0; i < data.length; i++){
                if(data[i][0]==3){
                  cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";  
                }
                
            }
            $("#cbm_rol").html(cadena);
            $("#cbm_rol_editar").html(cadena);
        }else{
            cadena+="<option value=''>NO SE ENCONTRARON REGISTROS</option>";
            $("#cbm_rol").html(cadena);
            $("#cbm_rol_editar").html(cadena);
        }
    })
}

function LimpiarCampos(){
    $("#txt_especialidad").val();
}
//combo de rol
function listar_combo_especialidad(){
    $.ajax({
        "url":"../controlador/tecnico/controlador_combo_especialidad_listar.php",
        type:'POST'
    }).done(function(resp){
       
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for(var i=0; i < data.length; i++){
                cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
            }
            $("#cbm_especialidad").html(cadena);
            $("#cbm_especialidad_editar").html(cadena);
        }else{
            cadena+="<option value=''>NO SE ENCONTRARON REGISTROS</option>";
            $("#cbm_especialidad").html(cadena);
            $("#cbm_especialidad_editar").html(cadena);
        }
       
    })
}

function Registrar_Tecnico(){
  var nombre =$("#txt_nombres").val();
  var apepat =$("#txt_apepat").val();
  var apemat =$("#txt_apemat").val();
  var direccion =$("#txt_direccion").val();
  var movil =$("#txt_movil").val();
  var sexo =$("#cbm_sexo").val();
  var fenac =$("#txt_fenac").val();
  var nrodocumento =$("#txt_ndoc").val();
  var especialidad =$("#cbm_especialidad").val();
  var usu =$("#txt_usu").val();
  var contra =$("#txt_contra").val();
  var rol =$("#cbm_rol").val();
  var email =$("#txt_email").val();

   if(nombre.length==0||apepat.length==0||apemat.length==0||direccion.length==0||movil.length==0||sexo.length==0||fenac.length==0||nrodocumento.length==0||especialidad.length==0||usu.length==0||contra.length==0||rol.length==0||email.length==0){
     return Swal.fire("Mensaje de Advertencia","Llene todos los campos","warning");
   }
   $.ajax({
     "url":"../controlador/tecnico/controlador_tecnico_registro.php",
     type:'POST',
     data:{
       nombre:nombre,
       apepat:apepat,
       apemat:apemat,
       direccion:direccion,
       movil:movil,
       sexo:sexo,
       fenac:fenac,
       nrodocumento:nrodocumento,
       especialidad:especialidad,
       usu:usu,
       contra:contra,
       rol:rol,
       email:email
     }
   }).done(function(resp){
     alert(resp);
   })
}

function Editar_Tecnico(){
    var idtecnico=$("#id_usuario").val();
    var nombre =$("#txt_nombres_editar").val();
    var apepat =$("#txt_apepat_editar").val();
    var apemat =$("#txt_apemat_editar").val();
    var direccion =$("#txt_direccion_editar").val();
    var movil =$("#txt_movil_editar").val();
    var sexo =$("#cbm_sexo_editar").val();
    var fenac =$("#txt_fenac_editar").val();
    var nrodocumentoactual =$("#txt_ndoc_editar_actual").val();
    var nrodocumentonuevo =$("#txt_ndoc_editar_nuevo").val();
    var especialidad =$("#cbm_especialidad_editar").val();
    var idusuario=$("#id_usuario").val();
    var email =$("#txt_email_editar").val();
     if(nombre.length==0||apepat.length==0||apemat.length==0||direccion.length==0||movil.length==0||sexo.length==0||fenac.length==0||nrodocumentonuevo.length==0||especialidad.length==0||email.length==0){
       return Swal.fire("Mensaje de Advertencia","Llene todos los campos","warning");
     }
     $.ajax({
       "url":"../controlador/tecnico/controlador_tecnico_modificar.php",
       type:'POST',
       data:{
         idtecnico:idtecnico,
         nombre:nombre,
         apepat:apepat,
         apemat:apemat,
         direccion:direccion,
         movil:movil,
         sexo:sexo,
         fenac:fenac,
         nrodocumentoactual:nrodocumentoactual,
         nrodocumentonuevo:nrodocumentonuevo,
         especialidad:especialidad,
         idusuario:idusuario,
         email:email
       }
     }).done(function(resp){
       alert(resp);
     })
  }
  