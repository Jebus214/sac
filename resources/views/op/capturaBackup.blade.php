@extends('layouts.app')

@section('content')

 <style>
  #personas .ui-selecting { background: #337ab7; }
  #personas .ui-selected { background: #337ab7; color: white; }
  #personas { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  
  </style>
<!-- Small modal -->
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Administrar Usuarios </h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">


      </div>

      <div class="modal-footer">
        <!--<a href="#" id="edit-button" onclick="editar()" class="btn btn-primary" >Actualizar</a>-->
      </div>
    
    </div>
  </div>
</div>


<div class="panel panel-default">
          
          <div class="panel-heading">
              <h3 class="panel-title">Alta de Oficios a enviar</h3>
          </div>


          <div id="parentF" class="panel-body">

            
          </div>




<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/dataTables.bootstrap.min.js"></script>
<script src="/js/select2.full.min.js"></script>
<script src="/js/fileinput.min.js" type="text/javascript"></script>
<script src="/js/fileinput_locale_es.js" type="text/javascript"></script>
<script src="/js/crud.js"></script>

<script>
  
$(document).ready(function(){

  $('#altas-nav-item').addClass("active");

  var oficio=new crud('Oficio','parentT','cargarOficio','oficio');


oficio.crearInsertForm2('parentF', 
                                    [
                                       

                                      {input:{label:'Numero de oficio',id:'no_oficio',type:"text"}},
                                      {select:{label:'Seguimiento',id:'seguimiento'}},
                                      {select:{label:'Remitente',id:'remitente_id'}},
                                      {select:{label:'Depedendencias',id:'dependencias'}},
                                      {select:{label:'Destinatario',id:'destinatario_id'}},
                                      {select:{label:'Con copia',id:'copia_id'}},
                                      {select:{label:'Elaborado por',id:'autor_id'}},
                                      {input:{label:'Fecha de emisión',id:'fecha_emision',type:"date"}},
                                      {input:{label:'Asunto',id:'asunto',type:"text"}},
                                      {input:{label:'Subir Archivo',id:'archivo',type:"file"}},
                                      {input:{label:'Subir Anexos',id:'anexos',type:"file"}},
                                      {input:{label:'',id:'user_id',type:"hidden"}},

                                      ]);




oficio.crearTabla('parentT',[{"data":'no_oficio'}, {"data":'remitente_id'}, {"data":'destinatario_id'}, {"data":'remitentes.nombre'}
],'cargarOficio');


$('#no_oficio').parent().attr('class','col-sm-5');

$('#no_oficio').parent().parent().append('<button id="seg-button" class=" btn btn-primary">Seguimiento</button>');

$('#seguimiento').attr('class','form-control');

$('#seguimiento').attr('multiple',"multiple");


oficio.crearSelect('cargarPersonaDireccion','remitente_id','id','fullname','1');
oficio.crearSelect('cargarAutorDireccion','autor_id','id','fullname','0');
oficio.crearSelect('cargarPersonaFilter','destinatario_id','id','fullname','1');
oficio.crearSelect('cargarPersonaFilter','copia_id','id','fullname','1');
oficio.crearSelect('cargarPersonaFilter','copia_id','id','fullname','1');
oficio.crearSelect('cargarNoOficio','seguimiento','id','no_oficio','1');
oficio.crearSelect('dependencia','dependencias','id','nombre','0');
        




          
$("#seguimiento").select2({openOnEnter:false});

$('#seguimiento').parent().parent().hide();

$('#destinatario_id').attr('multiple',"multiple");
$('#destinatario_id').select2();

$('#copia_id').attr('multiple',"multiple");

$('#copia_id').select2();


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
      
    var funcionariosListaContainer=$('<div>',{class:'form-group'}).append(
                                                $('<label>',{
                                                  class:"control-label col-sm-offset-2 col-sm-2",
                                                  html:"Funcionarios"
                                                  })
                                                );  

    funcionariosListaContainer.append(funcionariosLista);

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




          





$('#dependencias').parent().parent().after(funcionariosListaContainer);

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



});



</script>
@endsection
