var tablecliente;
function listar_cliente(){
    tablecliente = $("#tabla_cliente").DataTable({
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
           "url":"../controlador/cliente/controlador_cliente_listar.php",
           type:'POST'
       },
       // para el controlador_usuario_listar llama a sus datos
        "order":[[1,'asc']],
       "columns":[
           {"defaultContent":""},
           {"data":"cliente_nrodocumento"},
           {"data":"cliente"},
           {"data":"cliente_modelo"},
            {"data":"cliente_direccion"},
            {"data":"cliente_movil"},
           {"data":"cliente_estatus",
           render: function (data, type, row ) {
            if(data=='ACTIVO'){
                return "<span class='label label-success'>"+data+"</span>";
            }else{
              return "<span class='label label-danger'>"+data+"</span>";
            }
          }
        },
           {"defaultContent":"<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>"}
       ],
       "language":idioma_espanol,
       select: true
   });
   document.getElementById("tabla_cliente_filter").style.display="none";
   $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    });
    tablecliente.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_cliente').DataTable().page.info();
        tablecliente.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );
}

function filterGlobal() {
    $('#tabla_cliente').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}

function AbrirModalRegistro(){
  $("#modal_registro").modal({backdrop:'static',keyboard:false})
  $("#modal_registro").modal('show');
}

function LimpiarDatos(){
    $("#txt_ndoc").val("");
    $("#txt_nombres").val("");
    $("#txt_apepat").val("");
    $("#txt_apemat").val("");
    $("#txt_direccion").val("");
    $("#txt_movil").val("");
    $("#txt_modelo").val("");
}

function Registrar_Cliente(){
    var nrodoc = $("#txt_ndoc").val();
    var nombres = $("#txt_nombres").val();
    var apepat = $("#txt_apepat").val();
    var apemat = $("#txt_apemat").val();
    var direccion = $("#txt_direccion").val();
    var movil = $("#txt_movil").val();
    var modelo = $("#txt_modelo").val();
    if(nrodoc.length==0||nombres.length==0||apepat.length==0||apemat.length==0||direccion.length==0||movil.length==0||modelo.length==0){
        return Swal.fire("Mensaje de advertencia","Los campos no puedene estar vacios","warning");
    }
    $.ajax({
        url:'../controlador/cliente/controlador_cliente_registro.php',
        type:'post',
        data:{
            nombres:nombres,
            apepat:apepat,
            apemat:apemat,
            direccion:direccion,
            movil:movil,
            modelo:modelo,
            nrodoc,nrodoc
        }
    }).done(function(resp){
        if(resp>0){
            if(resp==1){
                $("#modal_registro").modal('hide');
                listar_cliente();
                LimpiarDatos();
              Swal.fire("Mensaje de Confirmacion","Datos guardados correctamente,Procedimiento registrado","success");
            }else{
                Swal.fire("Mensaje de Advertencia","El Procedimiento ya está existe","warning");
                LimpiarDatos();
            }
        }
    })
}

$('#tabla_cliente').on('click','.editar',function(){
    var data = tablecliente.row($(this).parents('tr')).data();//detecta a que fila hago click y enseña los datos de esa variable
    if(tablecliente.row(this).child.isShown()){//lo mismo en responsive
        var data = tablecliente.row(this).data();
    }
    $("#modal_editar").modal({backdrop:'static',keyboard:false})
    $("#modal_editar").modal('show');
    $("#txt_idcliente").val(data.cliente_id);
    $("#txt_ndoc_actual_editar").val(data.cliente_nrodocumento);
    $("#txt_ndoc_nuevo_editar").val(data.cliente_nrodocumento);
    $("#txt_nombres_editar").val(data.cliente_nombre);
    $("#txt_apepat_editar").val(data.cliente_apepat);
    $("#txt_apemat_editar").val(data.cliente_apemat);
    $("#txt_direccion_editar").val(data.cliente_direccion);
    $("#txt_movil_editar").val(data.cliente_movil);
    $("#txt_modelo_editar").val(data.cliente_modelo);
    $("#cbm_estatus_editar").val(data.cliente_estatus).trigger("change");
})

function Modificar_Cliente(){
    //llevar el actual y el nuevo para en el procedure tener condicional
    //si el actual es igual al nuevo entonces solo actualizar el estado
    var id = $("#txt_idcliente").val();
    var ndocactual =  $("#txt_ndoc_actual_editar").val();
    var ndocnuevo = $("#txt_ndoc_nuevo_editar").val();
    var nombres =  $("#txt_nombres_editar").val();
    var apepat = $("#txt_apepat_editar").val();
    var apemat =  $("#txt_apemat_editar").val();
    var direccion = $("#txt_direccion_editar").val();
    var movil = $("#txt_movil_editar").val();
    var modelo =  $("#txt_modelo_editar").val();
    var estatus = $("#cbm_estatus_editar").val();
    if(id.length==0||ndocactual.length==0||ndocnuevo.length==0||nombres.length==0||apepat.length==0||apemat.length==0||direccion.length==0||movil.length==0||modelo.length==0||estatus.length==0){
        return Swal.fire("Mensaje de Advertencia","Los campos no pueden estar vacios","warning");
    }
    $.ajax({
       url:'../controlador/cliente/controlador_cliente_modificar.php',
       type:'POST',
       data:{
           id:id,
           ndocactual:ndocactual,
           ndoactual:ndoactual,
          ndocnuevo:ndocnuevo,
          nombres:nombres,
          apepat:apepat,
          apemat:apemat,
          direccion:direccion,
          movil:movil,
          modelo:modelo,
          estatus:estatus
       }
    }).done(function(resp){
        if(resp>0){
            $("#modal_editar").modal('hide');
           if(resp==0){
               listar_cliente();
            Swal.fire("Mensaje de Confirmación","Datos actualizados correctamente","success");
           }else{
            Swal.fire("Mensaje de Advertencia","El Nro de documnento ya se encuentra en la base de datos","warning");
           }
        }else{
            Swal.fire("Mensaje de Error","Lo sentimos no se pudo completar la actualizacion","error");
        }
    })
}