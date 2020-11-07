var tableservicio;
function listar_servicio(){
    tableservicio = $("#tabla_servicio").DataTable({
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
             "url":"../controlador/servicio/controlador_servicio_listar.php",
             type:'POST'
         },
         // para el controlador_usuario_listar llama a sus datos
          "order":[[1,'asc']],
         "columns":[
             //datos de la bdd
             {"defaultContent":""},
             {"data":"servicio_nombre"},
             {"data":"servicio_feregistro"},
             {"data":"servicio_estatus",
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
     document.getElementById("tabla_servicio_filter").style.display="none";
     $('input.global_filter').on( 'keyup click', function () {
          filterGlobal();
      } );
      $('input.column_filter').on( 'keyup click', function () {
          filterColumn( $(this).parents('tr').attr('data-column') );
      });
      //contador
      tableservicio.on( 'draw.dt', function () {
          var PageInfo = $('#tabla_servicio').DataTable().page.info();
          tableservicio.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                  cell.innerHTML = i + 1 + PageInfo.start;
              } );
          } );
  }

  function filterGlobal() {
    $('#tabla_servicio').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}

function AbrirModalRegistro(){
  $("#modal_registro").modal({backdrop:'static',keyboard:false})
  $("#modal_registro").modal('show');
}

function Registrar_Servicio(){
    var servicio = $("#txt_servicio").val();
    var estatus = $("#cbm_estatus").val();
    if(servicio.length==0||estatus.length==0){
        Swal.fire("Mensaje de advertencia","El campo servicio debe tener datos","warning");
    }
    $.ajax({
        url:'../controlador/servicio/controlador_servicio_registro.php',
        type:'post',
        data:{
            se:servicio,
            e:estatus
        }
    }).done(function(resp){
         if(resp>0){
            if(resp==1){
                $("#modal_registro").modal('hide');
                listar_servicio();
              Swal.fire("Mensaje de Confirmacion","Datos guardados correctamente,Servicio registrado","success");
            }else{
                Swal.fire("Mensaje de Advertencia","El servicio ya está existe","warning");
            }
        } 
    })

  function LimpiarCampos(){
      $("#txt_servicio").val("");
  }
}