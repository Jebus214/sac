<script>
  
$("#guardar").click(function(e){
e.preventDefault();
 postFormAjaxRequest();

});



function normalizeForm(formId){

    var jsonData = "{";
    var data=$('#'+formId).serializeArray();
    
    for (var key in data) {
        jsonData=jsonData+'"'+data[key].name+'":"'+data[key].value+'",';
      }
    
    jsonData=jsonData.substring(0,jsonData.length-1);
    jsonData=jsonData+"}";

    return JSON.parse(jsonData);
}


function postFormAjaxRequest(){

    var route="/oficio";
    var jsonString='{';
    var operation='POST';
    var token=$("#token").val();
    var jsonData = normalizeForm('capturaForm'); 

           



              $.ajax({
                url:route,
                headers:{'X-CSRF-TOKEN':token},
                type:operation,
                dataType:'json',
                data:jsonData,
                success:function(response){
                  $("#good").html(response.mensaje);
                  //$( "#msj-success" ).modal('show');
                
                  alert("Oficio guardado exitosamente");
                  location.reload();

                },
                error:function(xhr, error){
                
            
              var msj=JSON.parse(xhr.responseText);
              $("#msj-error-node" ).empty();

              for (var k in msj){
                    if (msj.hasOwnProperty(k)) {
                        console.log(msj[k][0]);
                        $("#msj-error-node" ).append($('<strong>',{html:msj[k][0]}));
                        $("#msj-error-node" ).append("<br>");
                   }
                 }
                 //window.scrollTo(0, 0);
                 $("#msj-error" ).modal('show');
                
       }


     });



}


$(document).ready(function(){


  $('input').iCheck();

  
  $('#altas-nav-item').addClass("active");
  var oficio=new crud('Oficio','capturaForm','cargarOficio','/oficio');   
  $('<div class="form-group"><label class="control-label col-sm-offset-2 col-sm-2">Tipo</label><div class="col-sm-6"> &nbsp &nbspExterno  &nbsp <input type="radio" class="flat" name="tipo" id="tipoExterno" value="externo" checked="" required /> &nbsp &nbspInterno   &nbsp<input type="radio" class="flat" name="tipo" id="tipoInterno" value="interno" /> &nbsp &nbspCiudadano   &nbsp<input type="radio" class="flat" name="tipo" id="tipoCiudadano" value="ciudadano" /></div></div>').insertBefore($('#no_folio').parent().parent());
         

oficio.crearSelect('/cargarPersonaFilter','remitente_id','id','fullname','0');
oficio.crearSelect('/cargarPersonaFilter','destinatario_id','id','fullname','1');
oficio.crearSelect('/cargarPersonaFilter','copia_id','id','fullname','1');
oficio.crearSelect('/cargarNoOficio','seguimiento','id','no_oficio','1');
oficio.crearSelect('/dependencia','dependencias','id','nombre','0');







var externoCheckBox=document.querySelector('.flat');

$('#dependencias').parent().parent().hide();
$('#remitente_c').parent().parent().hide(); 





externoCheckBox.onchange = function() {
  if(externoCheckBox.checked){
     $('#remitente_id').parent().parent().hide();
     $('#dependencia_e').parent().parent().show();
      $('#remitente_c').parent().parent().hide();
  }
  else{

     $('#remitente_c').parent().parent().hide();
     $('#dependencia_e').parent().parent().hide();
      $('#remitente_id').parent().parent().show();
  }

 

};

          
$("#seguimiento").select2({openOnEnter:false});

$('#seguimiento').parent().parent().hide();


//$('#remitente_id').attr('multiple',"multiple");
$('#remitente_id').select2({
  placeholder: "Remitente",
  allowClear: true,
    
});


$('#remitente_id').parent().parent().hide(); 

$('#destinatario_id').attr('multiple',"multiple");
$('#destinatario_id').select2({

  placeholder: "Destinatario",
  allowClear: true,

});

$('#copia_id').attr('multiple',"multiple");
$('#copia_id').select2();



//$('#remitente_id').parent().parent().append('<button id="dep1" class=" btn btn-primary" data-toggle="modal" data-target=".modalRemitentes"><i class="fa fa-eye" aria-hidden="true"></i></button>');
//$('#destinatario_id').parent().parent().append('<button id="dep2" class=" btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>');
//$('#copia_id').parent().parent().append('<button id="dep3" class=" btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>');








$('input[type=radio][name=tipo]').on('ifChecked', function(event){


var tipo=$('input[type=radio][name=tipo]:checked').val();








switch(tipo) {
    case 'interno':
         $('#remitente_c').parent().parent().hide();
         $('#remitente_e').parent().parent().hide();
         $('#dependencia_e').parent().parent().hide();
         $("input[type='text']").val('');
                  $('#destinatario_id').val('').trigger('change');
                       $('#remitente_id').val('').trigger('change');

         $('#remitente_id').parent().parent().show();
        break;
    case 'externo':
         $('#remitente_c').parent().parent().hide();
         $('#remitente_id').parent().parent().hide();
         $('#dependencia_e').parent().parent().show();
         $('#remitente_e').parent().parent().show();
              $("input[type='text']").val('');
;   $('#destinatario_id').val('').trigger('change');
                       $('#remitente_id').val(0).trigger('change');


        break;
    case 'ciudadano':
        $('#remitente_id').parent().parent().hide();
        $('#remitente_e').parent().parent().hide();
        $('#dependencia_e').parent().parent().hide();


        $('#remitente_c').parent().parent().show();
         $("input[type='text']").val('');
   $('#destinatario_id').val('').trigger('change');
                          $('#remitente_id').val(0).trigger('change');


        break;
   
    default:
}




});






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








});


$('#test').click(function(){

 var route="/pdfTest2/";
    var jsonString='{';
    var operation='POST';
    var token=$("#token").val();
    var jsonData = normalizeForm('form-edit'); 

           



              $.ajax({
                url:route,
                headers:{'X-CSRF-TOKEN':token},
                type:operation,
                dataType:'json',
                data:jsonData,
                success:function(response){
                  $("#good").html(response.mensaje);
                  //$( "#msj-success" ).modal('show');
                  $("#pdfpreview").attr('src','/myfile.pdf');
                  $("#collapseExample").collapse('show');
                },
                error:function(xhr, error){
                
            
              var msj=JSON.parse(xhr.responseText);
              $("#msj-error-node" ).empty();

              for (var k in msj){
                    if (msj.hasOwnProperty(k)) {
                        console.log(msj[k][0]);
                        $("#msj-error-node" ).append($('<strong>',{html:msj[k][0]}));
                        $("#msj-error-node" ).append("<br>");
                   }
                 }
                 //window.scrollTo(0, 0);
                 $("#msj-error" ).modal('show');
                
       }


     });


});






</script>


            