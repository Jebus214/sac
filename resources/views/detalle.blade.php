@extends('layouts.app')


@section('css')
        
    <link href="/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="/vendors/jqueryui/jquery-ui.min.css" rel="stylesheet">
    <link href="/css/fileinput.min.css" rel="stylesheet">



@endsection


@section('sidemenu')
        
            
      @include('op.menu')

@endsection


@section('content')

<!-- Small modal -->
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Oficio</h4>
      </div>
      <div class="modal-body">

                  <div class="col-md-12 embed-responsive embed-responsive-4by3">
                     <iframe  id="iframeFile" class="embed-responsive-item" src="/uploads/{{ $oficios->remitentes->area_id}}/{{$oficios->no_oficio}}/{{$oficios->archivo}}"></iframe>
                  </div>


      </div>
      <div class="modal-footer">
        <!--<a href="#" id="edit-button" onclick="editar()" class="btn btn-primary" >Actualizar</a>-->
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal2" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Oficio</h4>
      </div>
      <div class="modal-body">

                  <div class="col-md-12 embed-responsive embed-responsive-4by3">
                     <iframe  id="iframeAnexo" class="embed-responsive-item" src=""></iframe>
                  </div>  


      </div>
      <div class="modal-footer">
        <!--<a href="#" id="edit-button" onclick="editar()" class="btn btn-primary" >Actualizar</a>-->
      </div>
    </div>
  </div>
</div>
<div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Oficios</h3>
          </div>
          <div id="parentF" class="panel-body">
                  @if (count($oficios) > 0)


              <table class="table table-condensed">

                    <!-- Table Headings -->
                    <thead>
                        <th class="col-md-6">No de Oficio</th>
                        <th class="col-md-6">Archivo</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                            <tr>
                                <!-- oficio Name -->
                                <td >
                                    <div>{{$oficios->no_oficio  }}</div>
                                </td>

                                <td>
                                    <div><button id="modalButton" class="btn btn-primary"><i class="fa fa-file-text"></i>Visualizar</button></div>

                                </td>
                            </tr>
                        
                    </tbody>
                </table>
        Anexos


        <table class="table table-condensed">

                    <!-- Table Headings -->
                    <thead>
                        <th class="col-md-6">Nombre</th>
                        <th class="col-md-6">Estado</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>

                        @foreach ($oficios->anexos as $anexo)
                             <tr>
                                <!-- oficio Name -->
                                <td >
                                    <div>{{$anexo->archivo}} </div>
                                </td>

                                <td>

                                <div><button id="modalButton2" onclick="anexo('{{$anexo->archivo}}');" class="btn btn-primary"><i class="fa fa-file-text"></i>Visualizar</button></div>


                                </td>
                            </tr>
                      
                        @endforeach
                            
                        
                    </tbody>
                </table>
                
              Destinatarios
              <table class="table table-condensed">

                    <!-- Table Headings -->
                    <thead>
                        <th class="col-md-6">Nombre</th>
                        <th class="col-md-6">Estado</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>

                        @foreach ($oficios->destinatarios as $destinatario)
                             <tr>
                                <!-- oficio Name -->
                                <td >
                                    <div>{{$destinatario->fullname}} </div>
                                </td>

                                <td>

                                       @if ($destinatario->pivot['recibido'] == 1)
                                    <div> Recibido</div>
                                      @else
                                              
                                      <div> Sin recibir</div>

                                      @endif
                                </td>
                            </tr>
                      
                        @endforeach
                            
                        
                    </tbody>
                </table>
                  Copias
                <table class="table table-condensed">

                    <!-- Table Headings -->
                    <thead>
                        <th class="col-md-6">Nombre</th>
                        <th class="col-md-6">Estado</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>

                       @foreach ($oficios->cpersona as $cdestinatario)
                             <tr>
                                <td >
                                    <div>{{$cdestinatario->fullname}} </div>
                                </td>

                                <td>

                                       @if ($cdestinatario->pivot['recibido'] == 1)
                                    <div> Recibido</div>
                                      @else
                                              
                                      <div> Sin recibir</div>

                                      @endif
                                </td>
                            </tr>
                      
                        @endforeach 
                            
                        
                    </tbody>
                </table>
          
              Seguimientos
                <table class="table table-condensed">

                    <!-- Table Headings -->
                    <thead>
                        <th class="col-md-6">Nombre</th>
                        <th class="col-md-6">Estado</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>

                  
                         @foreach ($oficios->seguimientos as $seg)
                             <tr>
                                <!-- oficio Name -->
                                <td >
                                    <div>En respuesta del Oficio {{$seg->no_oficio}}</div>
                                </td>

                                <td>

                                <div>
                                  
                                 <a class="btn btn-success" href="../detalleNo/{{$seg->no_oficio}}"><i class="fa fa-file-text"></i>detalle</a>

                                </div>


                                </td>
                            </tr>
                      
                        @endforeach
                 
                    @foreach ($seguimientos->oficios as $seg)
                             <tr>
                                <!-- oficio Name -->
                                <td >
                                    <div>Contestado con el Oficio  {{$seg->no_oficio}}</div>
                                </td>

                                <td>

                                <div>
                                  <a class="btn btn-success" href="../detalleNo/{{$seg->no_oficio}}"><i class="fa fa-file-text"></i>detalle</a>

                                </div>


                                </td>
                            </tr>
                      
                        @endforeach

          
                

                @endif

                    </tbody>
                </table>
          </div>
</div>





  
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/dataTables.bootstrap.min.js"></script>
<script src="/js/select2.full.min.js"></script>


<script src="/js/crud.js"></script>

<script>

  var oficio=new crud('','','','');


oficio.crearSelect('/cargarPersonaFilter','destinatario_id','id','fullname','1');
oficio.crearSelect('/dependencia','dependencias','id','nombre','0');
console.log('asdasd');
$('#destinatario_id').attr('multiple',"multiple");
$('#destinatario_id').select2();

var stack=[];



$('#destinatario_id').on("select2:unselect", function (e) { 
  if ($('#destinatario_id').val()!=null) {
    stack=$('#destinatario_id').val();

  }
  else{
    stack=[];    
  }

});


$('#dependencias').change(function (evt) {
  
  var dependencia_id=$('#dependencias').val();
  


  $.ajax({
                url:'/persona/dependencia/'+dependencia_id,
               // headers:{'X-CSRF-TOKEN':token},
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

function anexo(file){

  $("#iframeAnexo").attr('src', "/anexos/{{ $oficios->remitente_id }}/{{$oficios->no_oficio}}/"+file);

   
    $('#myModal2').modal('toggle');

}
  
$(document).ready(function(){

  $('#buscar-nav-item').addClass("active");
 $('#modalButton').click(
    function(){
    $('#myModal').modal('toggle');

  }

  );

});

</script>
@endsection
