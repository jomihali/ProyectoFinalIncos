var tableespecialidad;
function listar_especialidad(){
    tableespecialidad = $("#tabla_especialidad").DataTable({
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
           "url":"../controlador/especialidad/controlador_especialidad_listar.php",
           type:'POST'
       },
       // para el controlador_usuario_listar llama a sus datos
        "order":[[1,'asc']],
       "columns":[
           {"defaultContent":""},
           {"data":"especialidad_nombre"},
           {"data":"especialidad_feregistro"},
           {"data":"especialidad_estatus",
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
   document.getElementById("tabla_especialidad_filter").style.display="none";
   $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    });
    tableespecialidad.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_especialidad').DataTable().page.info();
        tableespecialidad.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );
}

function filterGlobal() {
    $('#tabla_especialidad').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}

function AbrirModalRegistro(){
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $("#modal_registro").modal('show');
  }

  function Registrar_Especialidad(){
    var especialidad = $("#txt_especialidad").val();
    var estatus = $("#cbm_estatus").val();
    if(especialidad.length==0){
        Swal.fire("Mensaje de advertencia","El campo procedimiento debe tener datos","warning");
    }
    $.ajax({
        url:'../controlador/especialidad/controlador_especialidad_registro.php',
        type:'post',
        data:{
            especialidad:especialidad,
            estatus:estatus
        }
    }).done(function(resp){
        if(resp>0){
            if(resp==1){
                $("#modal_registro").modal('hide');
                listar_especialidad();
              Swal.fire("Mensaje de Confirmacion","Datos guardados correctamente,Especialidad registrada","success");
            }else{
                LimpiarCampos();
                Swal.fire("Mensaje de Advertencia","La especialidad ya existe","warning");
            }
        }
    })
}

function LimpiarCampos(){
    $("#txt_especialidad").val();
}