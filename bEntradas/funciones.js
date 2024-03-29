function llenar_lista(){
    // console.log("Se ha llenado listaa");
   preCarga(1000,4);
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
function imprimir(){

   var titular = "Lista de Carreras";
   var mensaje = "¿Deseas generar un archivo con PDF oon la lista de carreras activos";
   // var link    = "pdfListaPersona.php?id="+idPersona+"&datos="+datos;
   var link    = "pdf/index.php?";

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
function ver_alta(){
   preCarga(800,4);
   $("#lista").slideUp('low');
   $("#alta").slideDown('low');
   $("#nombre").focus();
   $("#frmAlta")[0].reset();
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
 
   var medicamento    = $("#idMedicamento").val();
   var cantidad   = $("#cantidad").val();
   var proveedor   = $("#proveedor").val();



       $.ajax({
           url:"guardar.php",
           type:"POST",
           dateType:"html",
           data:{
                   'medicamento':medicamento,
                   'cantidad':cantidad,
                   'proveedor':proveedor
                },
           success:function(respuesta){
             console.log(respuesta);
           alertify.set('notifier','position', 'bottom-right');
           alertify.success('Se ha guardado el registro' );
           $("#frmAlta")[0].reset();
           $("#nombre").focus();
           //llenarLista();
           },
           error:function(xhr,status){
               alert(xhr);
           },
       });
       e.preventDefault();
       return false;
});

function abrirModalEditar(idMedicamento,nombre,codigo,proveedor,ide){
  
   $("#frmActuliza")[0].reset();
   // $("#idMedicamentoE").val(proveedor);
   llenar_sedesA(idMedicamento);
   $("#codigoE").val(codigo);
   $("#Eproveedor").val(proveedor);
 
   $("#idE").val(ide);

   $(".select2").select2();

   $("#modalEditar").modal("show");

    $('#modalEditar').on('shown.bs.modal', function () {
        $('#idMedicamentoE').focus();
    });   
}

$("#frmActuliza").submit(function(e){
 
   var medicamento    = $("#idMedicamentoE").val();
   var codigo   = $("#codigoE").val();    
   var proveedor    = $("#Eproveedor").val();
   
  
   var ide       = $("#idE").val();


       $.ajax({
           url:"actualizar.php",
           type:"POST",
           dateType:"html",
           data:{
                  
               'medicamento':medicamento,
               'proveedor':proveedor,
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
   var nombre   = "#tnombre"+concecutivo;
   var codigo   = "#tcodigo"+concecutivo;
   var tmedicamento   = "#ttmedicamento"+concecutivo;
   // var carrera  = "#tCarrera"+concecutivo;
  // var sexo      = "#tSexo"+concecutivo;

   if( $(nomToggle).is(':checked') ) {
       // console.log("activado");
       var valor=0;
       alertify.success('Registro habilitado' );
       $(nomBoton).removeAttr("disabled");
       $(numero).removeClass("desabilita");
       $(nombre).removeClass("desabilita");
       $(codigo).removeClass("desabilita");
       $(tmedicamento).removeClass("desabilita");
       // $(carrera).removeClass("desabilita");
       //$(sexo).removeClass("desabilita");
   }else{
      // console.log("desactivado");
       var valor=1;
       alertify.error('Registro deshabilitado' );
       $(nomBoton).attr("disabled", "disabled");
       $(numero).removeClass("desabilita");
       $(nombre).removeClass("desabilita");
       $(codigo).removeClass("desabilita");
       $(tmedicamento).removeClass("desabilita");
       // $(noControl).addClass("desabilita");
       // $(carrera).addClass("desabilita");
      // $(sexo).addClass("desabilita");
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

function llenarMedicamento(){

      
          // alert(idRepre);
          $.ajax({
              url : 'comboMedicamentos.php',
              // data : {'id':id},
              type : 'POST',
              dataType : 'html',
              success : function(respuesta) {
                  console.log(respuesta);
                  $("#idMedicamento").empty();
                  $("#idMedicamento").html(respuesta);      
              },
              error : function(xhr, status) {
                  alert('Disculpe, existió un problema');
              },
          });
      
}
function llenar_sedesA(idMedicamento){
    $.ajax({
        url: 'comboMedicamentosU.php',
        type: 'POST',
        dateType: 'html',
        success : function(respuesta){
            console.log(respuesta);
            $("#idMedicamentoE").empty();
            $("#idMedicamentoE").html(respuesta);
            $("#idMedicamentoE").val(idMedicamento);
            $(".select2").select2();
        },
        error : function(xhr, status){
            alert('Disculpe, hubo un problema');
        },
    });
}