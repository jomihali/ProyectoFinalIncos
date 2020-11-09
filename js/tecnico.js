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
  }

  $('#tabla_tecnico').on('click','.editar',function(){
    var data = tabletecnico.row($(this).parents('tr')).data();//detecta a que fila hago click y enseña los datos de esa variable
    if(tabletecnico.row(this).child.isShown()){//lo mismo en responsive
        var data = tabletecnico.row(this).data();
    }
    $("#modal_editar").modal({backdrop:'static',keyboard:false})
    $("#modal_editar").modal('show');
    $("#id_especialidad").val(data.especialidad_id);
    $("#txt_especialidad_actual_editar").val(data.especialidad_nombre);
    $("#txt_especialidad_nueva_editar").val(data.especialidad_nombre);
    $("#cbm_estatus_editar").val(data.especialidad_estatus).trigger("change");

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
                cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
            }
            $("#cbm_rol").html(cadena);
        }else{
            cadena+="<option value=''>NO SE ENCONTRARON REGISTROS</option>";
            $("#cbm_rol").html(cadena);
        }
    })
}
