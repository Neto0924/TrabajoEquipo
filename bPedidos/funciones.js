function llenar_lista(){
     // console.log("Se ha llenado lista");
    // preCarga(1000,4);
    $.ajax({
        url:"llenarLista.php",
        type:"POST",
        dateType:"html",
        data:{},
        success:function(respuesta){
            $("#lista").html(respuesta);
            $("#lista").slideDown("fast");
        },
        error:function(xhr,status){
            alert("no se muestra");
        }
    });	
}
function llenar_lista_detalle(){
     // console.log("Se ha llenado lista");
    // preCarga(1000,4);
    $.ajax({
        url:"llenarListaDetalle.php",
        type:"POST",
        dateType:"html",
        data:{},
        success:function(respuesta){
            $("#lista").html(respuesta);
            $("#lista").slideDown("fast");
        },
        error:function(xhr,status){
            alert("no se muestra");
        }
    }); 
}

function IniciarPedido(){
    $.ajax({
            url:"guardar.php",
            type:"POST",
            dateType:"html",
            // data:{
            //         'persona':paciente,
            //         'numSeguro':numSeguro,
            //         'tipoSangre':sangre,
            //         'estatura':estatura,
            //         'peso':peso,
            //         'detalle':detalle,
                    
            //      },
            success:function(respuesta){
            // alertify.success();
            // alertify.set('notifier','position', 'bottom-right');
            alertify.success('Se a iniciado un pedido');
            // $("#frmAlta")[0].reset();
                window.location = "index.php";
            
            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
        e.preventDefault();
        return false;
}


function ver_lista(){
    $("#alta").hide('low');
    $("#lista").slideDown('low');
}

$('#btnLista').on('click',function(){
    llenar_lista_detalle();
    ver_lista();
});



function abrirModalEditar(ide){
   preCarga(800,4);

    $("#example1").hide('slow');
    $("#example2").show('slideDown');
    $("#ide").val(ide);
    llenar_lista_detalle();
    alertify.success(ide);
    // $(".select2").select2();

    // $("#modalEditar").modal("show");

    //  $('#modalEditar').on('shown.bs.modal', function () {
    //      $('#numSeguroE').focus();
    //  });
}
function ver_alta(){
    $("#alta").show('low');
    $("#lista").slideUp('low');
    
}

$("#frmAltaDetalle").submit(function(e){
  
    var medicamento = $("#idMedicamento").val(); 
    var cantidad = $("#cantidad").val();
    var ide = $("#ide").val();
    

        $.ajax({
            url:"guardarDetalle.php",
            type:"POST",
            dateType:"html",
            data:{
                    'medicamento':medicamento,
                    'cantidad':cantidad,
                    'ide':ide
                    
                 },
            success:function(respuesta){
            console.log(respuesta);
            alertify.set('notifier','position', 'bottom-right');
            alertify.success("Detalle agregado");
            $("#cantidad").val("");
                // $("#frmAltaDetalle").slideUp('slow');
                // llenar_lista_detalle();
            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
        e.preventDefault();
        return false;
});

$("#frmActulizaEstatus").submit(function(e){
  

       var estatus = $("#estatus").val();
       var ide = $("#idE").val();

        $.ajax({
            url:"actualizar.php",
            type:"POST",
            dateType:"html",
            data:{
                    'estatus':estatus,
                    'ide':ide
                 },
            success:function(respuesta){
            console.log(respuesta);    
            alertify.set('notifier','position', 'bottom-right');
            alertify.success('Se ha actualizado el estatus' );
            $("#modalEstatus").modal("hide");
            llenar_lista();
            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
        e.preventDefault();
        return false;
});


function abrirModalDetalle(idDetalle,ide,codigo,cantidad){
    preCarga(200,4);
     $("#modalDetalle").modal("show"); 
     $("#cantidadRD").focus();
     $("#cantidadRD").val("");
    $("#ideE").val(ide);
    $("#idDetalle").val(idDetalle);

    $("#codigoD").val(codigo);
    $("#cantidadD").val(cantidad);

    $('#modalDetalle').on('shown.bs.modal', function () {
         $('#cantidadRD').focus();
     }); 
}
$("#frmActulizaDetalle").submit(function(e){
  

       var cantidadRD = $("#cantidadRD").val();
       var ide = $("#ideE").val();
       var idDetalle = $("#idDetalle").val();

        $.ajax({
            url:"updateDetalle.php",
            type:"POST",
            dateType:"html",
            data:{
                    'cantidadRD':cantidadRD,
                    'ide':ide,
                    'idDetalle':idDetalle
                 },
            success:function(respuesta){
            console.log(respuesta);    
            alertify.set('notifier','position', 'bottom-right');
            alertify.success('Se ha actualizado el estatus' );
            $("#modalDetalle").modal("hide");
            llenar_lista_detalle();
            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
        e.preventDefault();
        return false;
});


function status(concecutivo,id){
    var nomToggle = "#interruptor"+concecutivo;
    var nomBoton  = "#boton"+concecutivo;
    var numero    = "#tConsecutivo"+concecutivo;
    var persona   = "#tPersona"+concecutivo;
    var correo    = "#tCorreo"+concecutivo;
    var telefono  = "#tTelefono"+concecutivo;
    var sexo      = "#tSexo"+concecutivo;

    if( $(nomToggle).is(':checked') ) {
        // console.log("activado");
        var valor=0;
        alertify.success('Registro habilitado' );
        $(nomBoton).removeAttr("disabled");
        $(numero).removeClass("desabilita");
        $(persona).removeClass("desabilita");
        $(correo).removeClass("desabilita");
        $(telefono).removeClass("desabilita");
        $(sexo).removeClass("desabilita");
    }else{
        console.log("desactivado");
        var valor=1;
        alertify.error('Registro deshabilitado' );
        $(nomBoton).attr("disabled", "disabled");
        $(numero).addClass("desabilita");
        $(persona).addClass("desabilita");
        $(correo).addClass("desabilita");
        $(telefono).addClass("desabilita");
        $(sexo).addClass("desabilita");
    }
    // console.log(concecutivo+' | '+id);
    $.ajax({
        url:"status.php",
        type:"POST",
        dateType:"html",
        data:{
                'valor':valor,
                'id':id
             },
        success:function(respuesta){
            // console.log(respuesta);
        },
        error:function(xhr,status){
            alert(xhr);
        },
    });
}

function imprimir(){

    var titular = "Lista de personas";
    var mensaje = "¿Deseas generar un archivo con PDF oon la lista de personas activas";
    // var link    = "pdfListaPersona.php?id="+idPersona+"&datos="+datos;
    var link    = "pdfListaPersona.php?";

    alertify.confirm('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
    alertify.confirm(
        titular, 
        mensaje, 
        function(){ 
            window.open(link,'_blank');
            }, 
        function(){ 
                alertify.error('Cancelar') ; 
                // console.log('cancelado')
              }
    ).set('labels',{ok:'Generar PDF',cancel:'Cancelar'}); 
  }

  function llenar_persona()
{
    // alert(idRepre);
    $.ajax({
        url : 'comboPersonas.php',
        // data : {'id':id},
        type : 'POST',
        dataType : 'html',
        success : function(respuesta) {
            $("#idMedicamento").empty();
            $("#idMedicamento").html(respuesta);
            $("#idMedicamento").val(idPersona);
            $("#idMedicamento").select2();       
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}