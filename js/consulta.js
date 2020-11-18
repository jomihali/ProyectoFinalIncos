var tableconsulta;
function listar_consulta(){
    var finicio=$("#txt_fechainicio").val();
    var ffin=$("#txt_fechafin").val();
    tableconsulta = $("#tabla_consulta").DataTable({
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
   document.getElementById("tabla_consulta_filter").style.display="none";
   $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
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
    $("#id_especialidad").val(data.especialidad_id);

})