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

function ver_alta(){
    // preCarga(800,4);
    $("#lista").slideUp('low');
    $("#alta").slideDown('low');
    $("#nombre").focus();
}

function ver_lista(){
    $("#alta").slideUp('low');
    $("#lista").slideDown('low');
}

$('#btnLista').on('click',function(){
    llenar_lista();
    ver_lista();
});

$("#frmAlta").submit(function(e){
  
    var paciente = $("#idPersona").val(); 
    var numSeguro = $("#numSeguro").val();
    var sangre = $("#tipoSangre").val();
    var estatura = $("#estatura").val();
    var peso = $("#peso").val();
    var detalle = $("#detalle").val();
    

        $.ajax({
            url:"guardar.php",
            type:"POST",
            dateType:"html",
            data:{
                    'persona':paciente,
                    'numSeguro':numSeguro,
                    'tipoSangre':sangre,
                    'estatura':estatura,
                    'peso':peso,
                    'detalle':detalle,
                    
                 },
            success:function(respuesta){
            alertify.success();
            alertify.set('notifier','position', 'bottom-right');
            alertify.success(numSeguro);
            $("#frmAlta")[0].reset();
            // $("#nombre").focus();
            // llenarLista();
            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
        e.preventDefault();
        return false;
});

function abrirModalEditar(idPersona,numSeguro,tipo_sangre,estatura,peso,detalle,ide){
   
    $("#frmActuliza")[0].reset();
    llenar_personaU(idPersona);
    $("#numSeguroE").val(numSeguro);
    $("#tipoSangreE").val(tipo_sangre);
    $("#estaturaE").val(estatura);
    $("#pesoE").val(peso);
    $("#idE").val(ide);


    $(".select2").select2();

    $("#modalEditar").modal("show");

     $('#modalEditar').on('shown.bs.modal', function () {
         $('#numSeguroE').focus();
     });   
}

$("#frmActuliza").submit(function(e){
  

       var seguro = $("#numSeguroE").val();
       var sangre = $("#tipoSangreE").val();
       var estatura =  $("#estaturaE").val();
       var peso =  $("#pesoE").val();
       var ide = $("#idE").val();

        $.ajax({
            url:"actualizar.php",
            type:"POST",
            dateType:"html",
            data:{
                    'seguro':seguro,
                    'sangre':sangre,
                    'estatura':estatura,
                    'peso':peso,
                    'ide':ide
                 },
            success:function(respuesta){

            alertify.set('notifier','position', 'bottom-right');
            alertify.success('Se ha actualizado el registro' );
            $("#frmActuliza")[0].reset();
            $("#modalEditar").modal("hide");
            llenar_lista();
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

  function llenar_personaU(idPersona)
{
    // alert(idRepre);
    $.ajax({
        url : 'comboPersonasU.php',
        // data : {'id':id},
        type : 'POST',
        dataType : 'html',
        success : function(respuesta) {
            $("#idPersonaE").empty();
            $("#idPersonaE").html(respuesta);
            $("#idPersonaE").val(idPersona);
            $("#idPersonaE").select2();       
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}