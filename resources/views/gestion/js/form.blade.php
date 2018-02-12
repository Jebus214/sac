


<script>
  
$(document).ready(function(){

  $('#altas-nav-item').addClass("active")
;
  var oficio=new crud('Oficio','parentT','cargarOficio','/oficio');


oficio.crearInsertForm2('parentF',  [
                                       
                                      {input:{label:'Número de Folio',id:'no_folio',type:"text"}},
                                      {input:{label:'Número de Oficio',id:'no_oficio',type:"text"}},
                                      {input:{label:'Remitente',id:'remitente_c',type:"text"}},
                                      {select:{label:'Remitente',id:'remitente_id'}},
                                      {select:{label:'Destinatario',id:'destinatario_id'}},
                                      {select:{label:'C.C.P.',id:'copia_id'}},
                                      {select:{label:'Elaborado por',id:'autor_id'}},
                                      {input:{label:'Fecha de emisión',id:'fecha_emision',type:"date"}},
                                      {input:{label:'Asunto',id:'asunto',type:"text"}},
                                      {input:{label:'Subir Archivo',id:'archivo',type:"file"}},
                                      {input:{label:'Subir Anexos',id:'anexos',type:"file"}},
                                      {input:{label:'',id:'user_id',type:"hidden"}},

                                      ]);




$('#no_oficio').parent().attr('class','col-sm-5');

$('#seguimiento').attr('class','form-control');

$('#seguimiento').attr('multiple',"multiple");

$('#no_oficio').parent().parent().append('<br><br><br><div class="form-group"><label class="control-label col-sm-offset-2 col-sm-2">Ciudadano</label><div class="col-sm-6"><input type="checkbox" id="ciudadano" class="js-switch" checked /> Ciudadano</div></div>');






oficio.crearSelect('/cargarPersonaFilter','remitente_id','id','fullname','0');
oficio.crearSelect('/cargarPersonaFilter','destinatario_id','id','fullname','1');
oficio.crearSelect('/cargarPersonaFilter','copia_id','id','fullname','1');
oficio.crearSelect('/cargarNoOficio','seguimiento','id','no_oficio','1');
oficio.crearSelect('/dependencia','dependencias','id','nombre','0');

//var dep=$('#dependencias').parent().parent().detach();

//dep.appendTo('#dep-container1');




var ciudadanoCheckBox=document.querySelector('.js-switch');



ciudadanoCheckBox.onchange = function() {
  if(ciudadanoCheckBox.checked){
     $('#remitente_id').parent().parent().hide();
     $('#remitente_c').parent().parent().show();
  }
  else{

     $('#remitente_c').parent().parent().hide();
      $('#remitente_id').parent().parent().show();
  }

 

};

          
$("#seguimiento").select2({openOnEnter:false});

$('#seguimiento').parent().parent().hide();


//$('#remitente_id').attr('multiple',"multiple");
$('#remitente_id').select2({
  placeholder: "Remitente",
  allowClear: true
});

$('#destinatario_id').attr('multiple',"multiple");
$('#destinatario_id').select2();

$('#copia_id').attr('multiple',"multiple");
$('#copia_id').select2();



$('#remitente_id').parent().parent().append('<button id="dep1" class=" btn btn-primary" data-toggle="modal" data-target=".modalRemitentes"><i class="fa fa-eye" aria-hidden="true"></i></button>');
$('#destinatario_id').parent().parent().append('<button id="dep2" class=" btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>');
$('#copia_id').parent().parent().append('<button id="dep3" class=" btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>');


var stack=[];



$('#destinatario_id').on("select2:unselect", function (e) { 
  if ($('#destinatario_id').val()!=null) {
    stack=$('#destinatario_id').val();

  }
  else{
    stack=[];    
  }

});
 




  var funcionariosLista=$('<div>',{class:'col-sm-5'}).append($('<ul>',{id:"personas"}));
      
    var funcionariosListaContainer=$('<div>',{id:'funcionarios',class:'form-group'}).append(
                                                $('<label>',{
                                                  class:"control-label col-sm-offset-2 col-sm-2",
                                                  html:"Funcionarios"
                                                  })
                                                );  

    funcionariosListaContainer.append(funcionariosLista);


$('#dependencias').parent().parent().append(funcionariosListaContainer);

$('#dependencias').change(function (evt) {
  
  var dependencia_id=$('#dependencias').val();
  


  $.ajax({
                url:'/persona/dependencia/'+dependencia_id,
                headers:{'X-CSRF-TOKEN':token},
                type:'GET',
                dataType:'json',
                success:function(response){
                  console.log(response)
                $('#personas').empty(); 

                for (var i = 0; i < response.data.length; i++) {

                    var nombre=response.data[i].nombre+' '+response.data[i].apaterno+' '+response.data[i].amaterno;

                   var li=$('<li>',{class:"ui-widget-content",id:response.data[i].id,html:nombre}) ;

                  $('#personas').append(li);



    $( "#personas" ).selectable({
      stop: function() {
        $( ".ui-selected", this ).each(function() {
        
             stack.push($(this).attr('id'));//alert(this.innerHTML );
       
        });



        $("#destinatario_id").val(stack).trigger("change");

      }
    });
  

                };

                },
                error:function(xhr, error){
               
           
                
                }
              
              });
});




          





$('#dep-container1').append(funcionariosListaContainer);





$("#archivo").attr("name","file");
$("#anexos").attr("name","anexos[]");
$("#anexos").attr("multiple","multiple");





$('#dep1').click(function(e){

  e.preventDefault();


});

$('#dep2').click(function(e){

  e.preventDefault();


  $('#dependencias').parent().parent().toggle();
  $('#funcionarios').toggle();

});

$('#dep3').click(function(e){

  e.preventDefault();

});



$('#seg-button').click(function(e){

  e.preventDefault();

  $('#seguimiento').parent().parent().toggle();
  
  if('btn btn-primary'==$('#seg-button').attr('class')){

     $('#seg-button').attr('class','btn');

  }

  else{

     $('#seg-button').attr('class','btn btn-primary');

  }

});
var $input = $("#archivo");
$input.fileinput({
    dropZoneEnabled:false,
    maxFileCount:1,
    language: 'es',
        uploadAsync: false,
        uploadUrl: "/upload", // your upload server url
        uploadExtraData: function() {
            return {
                no_oficio: $("#no_oficio").val(),
            };
        }
    }).on("filebatchselected", function(event, files) {
    // trigger upload method immediately after files are selected
    $input.fileinput("upload");
  });

$("#anexos").fileinput({
    dropZoneEnabled:false,
    maxFileCount:0,
    language: 'es',
        uploadAsync: false,
        uploadUrl: "/anexosUpload", // your upload server url
        uploadExtraData: function() {
            return {
                no_oficio: $("#no_oficio").val(),
            };
        }
    });

 $('#remitente_id').parent().parent().hide();


});



</script>


            