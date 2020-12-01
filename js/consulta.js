var tableconsulta;
function listar_consulta(){
    var finicio=$("#txt_fechainicio").val();
    var ffin=$("#txt_fechafin").val();
    tableconsulta = $("#tabla_consulta").DataTable({
       "ordering":false,
       "bLengthChange":true,
       // agilizar datos
       "searching": { "regex": false },
       "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
// muestra los primeros 10 resultados
       "pageLength": 10,
       "destroy":true,
       "async": false ,
       "processing": true,
       "ajax":{
           "url":"../controlador/consulta/controlador_consulta_listar.php",
           type:'POST',
           data:{
               fechainicio:finicio,
               fechafin:ffin
           }
       },
       // para el controlador_usuario_listar llama a sus datos
        "order":[[1,'asc']],
       "columns":[
           {"defaultContent":""},
           {"data":"cliente_nrodocumento"},
           {"data":"cliente"},
           {"data":"consulta_feregistro"},
           {"data":"tecnico"},
           {"data":"especialidad_nombre"},
           {"data":"consulta_estatus",
           render: function (data, type, row ) {
            if(data=='PENDIENTE'){
                return "<span class='label label-danger'>"+data+"</span>";
            }else{
              return "<span class='label label-success'>"+data+"</span>";
            }
          }
        },
           {"defaultContent":"<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>"}
       ],
       "language":idioma_espanol,
       select: true
   });

    tableconsulta.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_consulta').DataTable().page.info();
        tableconsulta.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );
}

$('#tabla_consulta').on('click','.editar',function(){
    var data = tableconsulta.row($(this).parents('tr')).data();//detecta a que fila hago click y enseña los datos de esa variable
    if(tableconsulta.row(this).child.isShown()){//lo mismo en responsive
        var data = tableconsulta.row(this).data();
    }
    $("#modal_editar").modal({backdrop:'static',keyboard:false})
    $("#modal_editar").modal('show');
    $("#txt_consulta_id").val(data.consulta_id);
    $("#txt_cliente_consultaeditar").val(data.cliente);
    $("#txt_descripcion_consultaeditar").val(data.consulta_descripcion);
    $("#txt_diagnostico_consultaeditar").val(data.consulta_diagnostico);
})

function listar_cliente_combo_consulta(){
    $.ajax({
        "url":"../controlador/consulta/controlador_combo_cliente_cita_listar.php",
        type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for(var i=0; i < data.length; i++){
                  cadena+="<option value='"+data[i][0]+"'>Nro Atenci&oacute;n: "+data[i][1]+"Cliente: "+data[i][2]+"</option>";  
            }
            $("#cbm_cliente_consulta").html(cadena);
        }else{
            cadena+="<option value=''>NO SE ENCONTRARON REGISTROS</option>";
            $("#cbm_cliente_consulta").html(cadena);
        }
    })
}

function Registrar_Consulta(){
    var idcliente = $("#cbm_cliente_consulta").val();   
    var descripcion = $("#txt_descripcion_consulta").val();
    var diagnostico = $("#txt_diagnostico_consulta").val();
    if(idcliente.length==0||descripcion.length==0||diagnostico.length==0){
        //
       return Swal.fire("Mensaje de advertencia","El campo procedimiento debe tener datos","warning");
    }
    $.ajax({
        url:'../controlador/consulta/controlador_consulta_registro.php',
        type:'post',
        data:{
            idcliente:idcliente,
            descripcion:descripcion,
            diagnostico:diagnostico, 
            
        }
    }).done(function(resp){
        if(resp>0){
            $("#modal_registro").modal('hide');
            listar_consulta();
            Swal.fire("Mensaje de confirmacion","El registro se completo correctamente","success");
            }else{
                Swal.fire("Mensaje de error","Lo sentimos el registro no se pudo completar","error");
            }
        })
}

function Editar_Consulta(){
    var idconsulta = $("#txt_consulta_id").val();   
    var descripcion = $("#txt_descripcion_consultaeditar").val();
    var diagnostico = $("#txt_diagnostico_consultaeditar").val();
    if(descripcion.length==0||diagnostico.length==0){
       return Swal.fire("Mensaje de advertencia","El campo debe tener datos","warning");
    }
    $.ajax({
        url:'../controlador/consulta/controlador_consulta_modificar.php',
        type:'post',
        data:{
            idconsulta:idconsulta,
            descripcion:descripcion,
            diagnostico:diagnostico, 
        }
    }).done(function(resp){
        alert(resp);
        if(resp>0){
            $("#modal_editar").modal('hide');
            listar_consulta();
            Swal.fire("Mensaje de confirmacion"," Datos correctamente actualizados","success");
            }else{
                Swal.fire("Mensaje de error","Lo sentimosno se pudo completar la edicion","error");
            }
        })
}