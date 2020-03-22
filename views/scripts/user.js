var tabla;

function init() {



    listar();
    $("#formulario").on("submit",function (e) { //si le dan en el boton guardarf que es el que tiene el evento submit
        guardaryeditar(e);
    });

    //cargamos los items de categoria




    /*$.post("../ajax/usuario.php?op=permisos&id=",function (r) {//&es para concatenar
        $("#permisos").html(r);

    })*/


}

function limpiar() {


}


function cancelarform() {
    limpiar();

}


function listar()
{
/*    tabla=$('#tbllistado').dataTable(
        {
            "aProcessing": true,//Activamos el procesamiento del datatables
            "aServerSide": true,//Paginación y filtrado realizados por el servidor
            dom: 'Bfrtip',//Definimos los elementos del control de tabla
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdf'
            ],
            "ajax":
                {
                    url: '../ajax/usuario.php?op=listar',
                    type : "get",
                    dataType : "json",
                    error: function(e){
                        console.log(e.responseText);
                    }
                },
            "bDestroy": true,
            "iDisplayLength": 5,//Paginación
            "order": [[ 0, "desc" ]],//Ordenar (columna,orden)
            "pagingType": "full_numbers"
        }).DataTable();*/


    $.ajax({
        url:'../controller/user.php?op=showUsers',
        type:'get',
        success:function (data) {
            $('#listuser').html(data).dataTable({
                "aProcessing": true,//Activamos el procesamiento del datatables
                "aServerSide": true,//Paginación y filtrado realizados por el servidor
                dom: 'Bfrtip',//Definimos los elementos del control de tabla
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdf'
                ],
                "bDestroy": true,
                "iDisplayLength": 5,//Paginación
                "order": [[ 0, "desc" ]],//Ordenar (columna,orden)
                "pagingType": "full_numbers"
            }).DataTable()

        }
    })

}

function guardaryeditar(e) {

/*    e.preventDefault();//No se activara la accion predeterminada
    $("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url:"../ajax/usuario.php?op=guardaryeditar",
        type:"POST",
        data:formData,
        contentType:false,
        processData:false,

        success: function (datos) { //estos datos que recive son los mensajes de verificaion de insertado o no de usuario ajax
            bootbox.alert(datos);
            mostrarform(false);
            tabla.ajax.reload();
        }
    });
    limpiar();*/

    e.preventDefault()
    let idusario = $('#idusuario').val()
    let nombres = $('#nombre').val()
    let descripcion = $('#descripcion').val()

    $.ajax({
        url:'../controller/user.php?op=saveUsers',
        type:'POST',
        data:{
            'idusario':idusario,
            'nombres':nombres,
            'descripcion':descripcion
        },
        success : function (data) {
            bootbox.alert({
                message:data,
                callback:function () {
                    listar()
                }
            })
        }
    })

}

function mostrar(idusuario) {
    /*$.post("../ajax/usuario.php?op=mostrar",{idusuario:idusuario}, function (data,status) { //este data sera llenado con lo que reciba de mostrar del ajax
        data = JSON.parse(data);


        $("#nombre").val(data.nombre);
        $("#tipo_documento").val(data.tipo_documento);
        $("#tipo_documento").selectpicker('refresh');
        $("#num_documento").val(data.num_documento);
        $("#direccion").val(data.direccion);
        $("#telefono").val(data.telefono);
        $("#email").val(data.email);
        $("#cargo").val(data.cargo);
        $("#login").val(data.login);
        $("#clave").val(data.clave);
        $("#imagenmuestra").show();
        $("#imagenmuestra").attr("src","../files/usuarios/"+data.imagen);//se lo manda al id imagen muestra para que muestre la imagen
        $("#imagenactual").val(data.imagen);
        $("#idusuario").val(data.idusuario);
       // generarbarcode();
    });

    $.post("../ajax/usuario.php?op=permisos&id=" + idusuario,function (r) {//&es para concatenar
        $("#permisos").html(r);

    })*/
}


function desactivar(idusuario) {
    /*bootbox.confirm("Desea esactivar la usuario?",function (result) {

        if(result) { //si le dio a si

            $.post("../ajax/usuario.php?op=desactivar", {idusuario: idusuario}, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();

            });


        }

    });*/
}
function activar(idusuario) {
    /*bootbox.confirm("Desea Activar la usuario?",function (result) {

        if(result){ //si le dio a si

            $.post("../ajax/usuario.php?op=activar",{idusuario:idusuario},function(e){
                bootbox.alert(e);
                tabla.ajax.reload();

            });


        }

    });*/
}
function editar(idusario,nombres,description) {
 console.log(idusario,nombres,description)
    $("#idusuario").val(idusario)
    $("#nombre").val(nombres)
    $("#descripcion").val(description)
}
function eliminar(idusario) {
console.log(idusario)
    bootbox.confirm('Esta seguro eliminar este usuario',function (result) {
        if(result){
            $.ajax({
                url:'../controller/user.php?op=deleteUser',
                type:'POST',
                data:{
                    'idusuario':idusario
                },
                success:function (data) {
                    bootbox.alert({
                        message:data,
                        callback:function () {
                            listar()
                        }
                    })

                }
            })
        }
    })

}

function restaurar(idusario) {
console.log(idusario)
    bootbox.confirm("Esta seguro que desea Restaurar el usario",function (result) {
        if(result){
            $.ajax({
                url:'../controller/user.php?op=restoreUser',
                type:'POST',
                data:{
                    'idusuario':idusario
                },
                success:function (data) {
                    bootbox.alert({
                        message:data,
                        callback:function () {
                            listar()
                        }
                    })

                }
            })
        }
    })
}

init();