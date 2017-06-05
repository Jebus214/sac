@extends('layouts.app')


@section('sidemenu')
        
            
      @include('gestion.menu')

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

           @if ($oficios->remitente_id==0)

                     <iframe  id="iframeFile" class="embed-responsive-item" src="/uploads/15/47/{{$oficios->no_oficio}}/{{$oficios->archivo}}"></iframe>
                  
            @else

                      <iframe  id="iframeFile" class="embed-responsive-item" src="/uploads/{{ $oficios->remitentes->dependencia->id}}/{{ $oficios->remitentes->area_id}}/{{$oficios->no_oficio}}/{{$oficios->archivo}}"></iframe>
          


          @endif

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

                                       @if ($destinatario->pivot['recibido'] == 2)
                                    <div> Recibido</div>
                                      @endif

                                      @if ($destinatario->pivot['recibido'] == 0)
                                                <div> En oficialia</div>   
                                      @endif


                                      @if ($destinatario->pivot['recibido'] == 1)
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


@endsection



@section('javascript')

<script>





function anexo(file){

  $("#iframeAnexo").attr('src', "/anexos/{{ $oficios->id }}/{{$oficios->no_oficio}}/"+file);

   
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
