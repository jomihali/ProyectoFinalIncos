var tablecita; 
function listar_cita(){
    tablecita = $("#tabla_cita").DataTable({
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
           "url":"../controlador/cita/controlador_cita_listar.php",
           type:'POST'
       },
       // para el controlador_usuario_listar llama a sus datos
        "order":[[1,'asc']],
       "columns":[
           {"defaultContent":""},
           {"data":"cita_nroatencion"},
           {"data":"cita_feregistro"},
           {"data":"cliente"},
           {"data":"tecnico"},
           {"data":"cita_estatus",
           render: function (data, type, row ) {
            if(data=='PENDIENTE'){
                return "<span class='label label-danger'>"+data+"</span>";
            }else{
              return "<span class='label label-success'>"+data+"</span>";
            }
          }
        },
           {"defaultContent":"<button style='font-size:13px;' type='button' class='editar btn btn-primary' title='editar'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='imprimir btn btn-danger' title='imprimir'><i class='fa fa-print'></i></button>"}
       ],
       "language":idioma_espanol,
       select: true
   });
   document.getElementById("tabla_cita_filter").style.display="none";
   $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    });
    tablecita.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_cita').DataTable().page.info();
        tablecita.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );
}

function filterGlobal() {
    $('#tabla_cita').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}


$('#tabla_cita').on('click','.editar',function(){
    var data = tablecita.row($(this).parents('tr')).data();//detecta a que fila hago click y enseña los datos de esa variable
    if(tablecita.row(this).child.isShown()){//lo mismo en responsive
        var data = tablecita.row(this).data();
    }
    $("#modal_editar").modal({backdrop:'static',keyboard:false})
    $("#modal_editar").modal('show');
    $("#id_especialidad").val(data.especialidad_id);
    $("#txt_especialidad_actual_editar").val(data.especialidad_nombre);
    $("#txt_especialidad_nueva_editar").val(data.especialidad_nombre);
    $("#cbm_estatus_editar").val(data.especialidad_estatus).trigger("change");
})

$('#tabla_cita').on('click','.imprimir',function(){
    var data = tablecita.row($(this).parents('tr')).data();//detecta a que fila hago click y enseña los datos de esa variable
    if(tablecita.row(this).child.isShown()){//lo mismo en responsive
        var data = tablecita.row(this).data();
    }
    window.open("../vista/libreporte/reportes/generar_ticket.php?id="+parseInt(data.cita_id)+"#zoom=100%","Ticket","scrollbars=NO"); 
                   
})

function AbrirModalRegistro(){
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $("#modal_registro").modal('show');
  }

function listar_cliente_combo(){
    $.ajax({
        "url":"../controlador/cita/controlador_combo_cliente_listar.php",
        type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for(var i=0; i < data.length; i++){
                  cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";  
            }
            $("#cbm_cliente").html(cadena);
            $("#cbm_cliente_editar").html(cadena);
        }else{
            cadena+="<option value=''>NO SE ENCONTRARON REGISTROS</option>";
            $("#cbm_cliente").html(cadena);
            $("#cbm_cliente_editar").html(cadena);
        }
    })
}

function listar_especialidad_combo(){
    $.ajax({
        "url":"../controlador/cita/controlador_combo_especialidad_listar.php",
        type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for(var i=0; i < data.length; i++){
                  cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";  
            }
            $("#cbm_especialidad").html(cadena);
            var id=$("#cbm_especialidad").val();
            listar_tecnico_combo(id);
        }else{
            cadena+="<option value=''>NO SE ENCONTRARON REGISTROS</option>";
            $("#cbm_especialidad").html(cadena);
        }
    })
}

function listar_tecnico_combo(id){
    $.ajax({
        "url":"../controlador/cita/controlador_combo_tecnico_listar.php",
        type:'POST',
        data:{
           id:id
        }
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for(var i=0; i < data.length; i++){
                  cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";  
            }
            $("#cbm_tecnico").html(cadena);
        }else{
            cadena+="<option value=''>NO SE ENCONTRARON REGISTROS</option>";
            $("#cbm_tecnico").html(cadena);
        }
    })
}

function Registrar_Cita(){
    var idcliente = $("#cbm_cliente").val();   
    var idtecnico = $("#cbm_tecnico").val();
    var descripcion = $("#txt_descripcion").val();
    var idusuario = $("#txtidprincipal").val();
    if(idcliente.length==0||idtecnico.length==0||descripcion.length==0){
       return Swal.fire("Mensaje de advertencia","El campo procedimiento debe tener datos","warning");
    }
    $.ajax({
        url:'../controlador/cita/controlador_cita_registro.php',
        type:'post',
        data:{
            idpa:idcliente,
            iddo:idtecnico, 
            descripcion:descripcion,
            idusuario:idusuario
        }
    }).done(function(resp){
        if(resp>0){
                Swal.fire({
                    title: 'Mensaje de Confirmacion',
                    text: "Datos correctamente guardados,nueva cita registrada",
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Imprimir ticket'
                  }).then((result) => {
                    if (result.value) {
                      window.open("../vista/libreporte/reportes/generar_ticket.php?id="+parseInt(resp)+"#zoom=100%","Ticket","scrollbars=NO"); 
                    }else{
                        $("#modal_registro").modal('hide');
                        listar_cita();
                    }
                  })
            }
        })
}

