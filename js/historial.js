    var tablehistorial;
    function listar_historial(){
        var finicio=$("#txt_fechainicio").val();
        var ffin=$("#txt_fechafin").val();
        tablehistorial = $("#tabla_historial").DataTable({
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
            "url":"../controlador/historial/controlador_historial_listar.php",
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
            {"data":"fua_feregistro"},
            {"data":"cliente_nrodocumento"},
            {"data":"cliente"},
            {"defaultContent":"<button style='font-size:13px;' type='button' class='diagnostico btn btn-default' title='diagnostico'><i class='fa fa-eye'></i></button>"},
            {"defaultContent":"<button style='font-size:13px;' type='button' class='verdetalles btn btn-default' title='detalles'><i class='fa fa-eye'></i></button>"},
            {"data":"fua_id",
               render: function (data, type, row ) {
               return "<button style='font-size:13px;' type='button' class='pdf btn btn-danger' title='ver pdf'><i class='fa fa-print'></i></button>"
              }
            },
          ],
        "language":idioma_espanol,
        select: true
    });

    tablehistorial.on( 'draw.dt', function () {
            var PageInfo = $('#tabla_historial').DataTable().page.info();
            tablehistorial.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                    cell.innerHTML = i + 1 + PageInfo.start;
                } );
            } );


    $('#tabla_historial').on('click','.diagnostico',function(){
        var data = tablehistorial.row($(this).parents('tr')).data();//detecta a que fila hago click y enseña los datos de esa variable
        if(tablehistorial.row(this).child.isShown()){//lo mismo en responsive
            var data = tablehistorial.row(this).data();
        }
        $("#modal_diagnostico").modal({backdrop:'static',keyboard:false})
        $("#modal_diagnostico").modal('show');
        $("#txt_diagnostico_fua").val(data.consulta_diagnostico);
    })
   
    $('#tabla_historial').on('click','.pdf',function(){
        var data = tablehistorial.row($(this).parents('tr')).data();//detecta a que fila hago click y enseña los datos de esa variable
        if(tablehistorial.row(this).child.isShown()){//lo mismo en responsive
            var data = tablehistorial.row(this).data();
        }
        window.open("../vista/libreporte/reportes/generar_fua.php?id="+parseInt(data.fua_id)+"#zoom=100%","Ticket","scrollbars=NO");  
    })

    $('#tabla_historial').on('click','.verdetalles',function(){
        var data = tablehistorial.row($(this).parents('tr')).data();//detecta a que fila hago click y enseña los datos de esa variable
        if(tablehistorial.row(this).child.isShown()){//lo mismo en responsive
            var data = tablehistorial.row(this).data();
        }
        $("#modal_detalle").modal({backdrop:'static',keyboard:false})
        $("#modal_detalle").modal('show');
        listar_procedimiento_detalle(data.fua_id);
        listar_servicio_detalle(data.fua_id);
    })
    
    }
    function AbrirModalConsulta(){
        $("#modal_consultas").modal({backdrop:'static',keyboard:false})
        $("#modal_consultas").modal('show');
        listar_historial_consulta();
    }

    //listar consulta

    var tableconsultahistorial;
    function listar_historial_consulta(){;
        tableconsultahistorial = $("#tabla_comsulta_historial").DataTable({
        "ordering":false,
        "bLengthChange":true,
        "searching": { "regex": false },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 10,
        "destroy":true,
        "async": false ,
        "processing": true,
        "ajax":{
            "url":"../controlador/historial/controlador_historial_consulta_listar.php",
            type:'POST'
        },
        // para el controlador_usuario_listar llama a sus datos
            "order":[[1,'asc']],
        "columns":[
            {"defaultContent":""},
            {"data":"consulta_feregistro"},
            {"data":"cliente_nrodocumento"},
            {"data":"cliente"},
            {"defaultContent":"<button style='font-size:13px;' type='button' class='enviar btn btn-success' title='enviar'><i class='fa fa-sing-in'></i>&nbsp;Enviar</button>"},
            ],
        "language":idioma_espanol,
        select: true
    });

    tableconsultahistorial.on( 'draw.dt', function () {
            var PageInfo = $('#tabla_comsulta_historial').DataTable().page.info();
            tableconsultahistorial.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                    cell.innerHTML = i + 1 + PageInfo.start;
                } );
            } );
    } 


    $('#tabla_comsulta_historial').on('click','.enviar',function(){
        var data = tableconsultahistorial.row($(this).parents('tr')).data();//detecta a que fila hago click y enseña los datos de esa variable
        if(tableconsultahistorial.row(this).child.isShown()){//lo mismo en responsive
            var data = tableconsultahistorial.row(this).data();
        }
        $("#txt_codhistorial").val(data.historia_id);
        $("#txt_cliente").val(data.cliente);
        $("#txt_desconsulta").val(data.consulta_descripcion);
        $("#txt_diagconsulta").val(data.consulta_diagnostico);
        $("#txt_idconsulta").val(data.consulta_id);
        $("#modal_consultas").modal(hide);
    })

    function listar_procedimiento(){
        $.ajax({
            "url":"../controlador/historial/controlador_combo_procedimiento_listar.php",
            type:'POST'
        }).done(function(resp){
            var data = JSON.parse(resp);
            var cadena="";
            if(data.length>0){
                for(var i=0; i < data.length; i++){
                    cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";  
                }
                $("#cbm_procedimiento").html(cadena);
            }else{
                cadena+="<option value=''>NO SE ENCONTRARON REGISTROS</option>";
                $("#cbm_procedimiento").html(cadena);
            }
        })
    }

    function listar_servicio(){
        $.ajax({
            "url":"../controlador/historial/controlador_combo_servicio_listar.php",
            type:'POST'
        }).done(function(resp){
            var data = JSON.parse(resp);
            var cadena="";
            if(data.length>0){
                for(var i=0; i < data.length; i++){
                    cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";  
                }
                $("#cbm_servicio").html(cadena);
            }else{
                cadena+="<option value=''>NO SE ENCONTRARON REGISTROS</option>";
                $("#cbm_servicio").html(cadena);
            }
        })
    }

    function Agregar_Procedimiento(){
        var idprocedimiento = $("#cbm_procedimiento").val();
        var procedimiento = $("#cbm_procedimiento option:selected").text();
        if(idprocedimiento==""){
            return Swal.fire("Mensaje de Advertencia","No hay procedimientos disponibles","warning");
        }

        if(verificarid(idprocedimiento)){
            return Swal.fire("Mensaje de Advertencia","El procedimiento ya fue agregado","warning");
        }

        var datos_agregar = "<tr>";
        datos_agregar+="<td for='id'>"+idprocedimiento+"</td>";
        datos_agregar+="<td>"+procedimiento+"</td>";
        datos_agregar+="<td><button class='btn btn-danger' onclick='remove(this)'><i class='fa fa-trash'></button></i></td>";
        datos_agregar+="</tr>";
        $("#tbody_tabla_procedimiento").append(datos_agregar);
    }
    function Agregar_Servicio(){
        var idservicio = $("#cbm_servicio").val();
        var servicio = $("#cbm_servicio option:selected").text();
        if(idservicio==""){
            return Swal.fire("Mensaje de Advertencia","No hay servicios disponibles","warning");
        }

        if(verificarids(idservicio)){
            return Swal.fire("Mensaje de Advertencia","El servicio ya fue agregado","warning");
        }

        var datos_agregar = "<tr>";
        datos_agregar+="<td for='id'>"+idservicio+"</td>";
        datos_agregar+="<td>"+servicio+"</td>";
        datos_agregar+="<td><button class='btn btn-danger' onclick='remove(this)'><i class='fa fa-trash'></button></i></td>";
        datos_agregar+="</tr>";
        $("#tbody_tabla_servicio").append(datos_agregar);
    }

    function verificarid(id){
        let idverificar = document.querySelectorAll('#tabla_procedimiento td[for="id"]');
        return [].filter.call(idverificar, td=> td.textContent ===id).length===1;
    }
    function verificarids(id){
        let idverificar = document.querySelectorAll('#tbody_tabla_servicio td[for="id"]');
        return [].filter.call(idverificar, td=> td.textContent ===id).length===1;
    }
    function remove(t){
    var td=t.parentNode;
    var tr=td.parentNode;
    var table=tr.parentNode;
    table.removeChild(tr);
    }

    function Registrar_Historial(){
        var idhistorial=$("#txt_codhistorial").val();
        var idconsulta=$("#txt_idconsulta").val();
        if(idhistorial.length==0||idconsulta.length==0){
            return Swal.fire("Mensaje de advertencia","No tiene un id de historial o consulta","warning");
        }
        $.ajax({
            url:'../controlador/historial/controlador_fua_registro.php',
            type:'POST',
            data:{
                idhistorial:idhistorial,
                idconsulta:idconsulta
            }
        }).done(function(resp){
            if(resp>0){
                registrar_detalle_procedimiento(parseInt(resp));
                registrar_detalle_servicio(parseInt(resp));
                Swal.fire("Mensaje de confirmacion","Datos correctamente registrados","success").then((value)=>{
                    $("#contenido_principal").load("historial/vista_historial_listar.php");
                })

            }else{
                    Swal.fire("Mensaje de error","Lo sentimos el registro no se pudo completar","error");
                }
            })
        
    }

    function registrar_detalle_procedimiento(id){
    var count=0;
    var arreglo_idprocedimiento=new Array();
    $("#tabla_procedimiento tbody#tbody_tabla_procedimiento tr").each(function(){
        arreglo_idprocedimiento.push($(this).find('td').eq(0).text());
        count++;
    })
    var idprocedimiento=arreglo_idprocedimiento.toString();
    if(count==0){
        retrun ;
    }
        $.ajax({
                url:'../controlador/historial/controlador_detalle_procedimiento.php',
                type:'POST',
                data:{
                    id:id,
                    idprocedimiento:idprocedimiento
        }
    }).done(function(resp){
        console.log(resp);
        })
    }

    function registrar_detalle_servicio(id){
        var count=0;
        var arreglo_idservicio=new Array();
        $("#tabla_servicio tbody#tbody_tabla_servicio tr").each(function(){
            arreglo_idservicio.push($(this).find('td').eq(0).text());
            count++;
        })
        var idservicio=arreglo_idservicio.toString();
        if(count==0){
            retrun ;
        }
        $.ajax({
                url:'../controlador/historial/controlador_detalle_servicio.php',
                type:'POST',
                data:{
                    id:id,
                    idservicio:idservicio
        }
    }).done(function(resp){
            console.log(resp);
        })
    }

    var tableprocedimiento;
    function listar_procedimiento_detalle(idfua){
        tableprocedimiento = $("#tabla_prodecidimiento").DataTable({
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
            "url":"../controlador/historial/controlador_detalleprocedimiento_listar.php",
            type:'POST',
            data:{
                id:idfua    
            }
        },
        // para el controlador_usuario_listar llama a sus datos
            "order":[[1,'asc']],
        "columns":[
            {"defaultContent":""},
            {"data":"procedimiento_nombre"}
         ],
        "language":idioma_espanol,
        select: true
    });

    tableprocedimiento.on( 'draw.dt', function () {
            var PageInfo = $('#tabla_prodecidimiento').DataTable().page.info();
            tableprocedimiento.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                    cell.innerHTML = i + 1 + PageInfo.start;
                } );
            } );
     }

     var tableservicio;
    function listar_servicio_detalle(idfua){
        tableservicio = $("#tabla_servicio").DataTable({
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
            "url":"../controlador/historial/controlador_detallservicio_listar.php",
            type:'POST',
            data:{
                id:idfua    
            }
        },
        // para el controlador_usuario_listar llama a sus datos
            "order":[[1,'asc']],
        "columns":[
            {"defaultContent":""},
            {"data":"servicio_nombre"}
         ],
        "language":idioma_espanol,
        select: true
    });

    tableservicio.on( 'draw.dt', function () {
            var PageInfo = $('#tabla_servicio').DataTable().page.info();
            tableservicio.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                    cell.innerHTML = i + 1 + PageInfo.start;
                } );
            } );
     }


