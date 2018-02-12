@extends('layouts.app')


@section('css')
        
    <link href="/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="/vendors/jqueryui/jquery-ui.min.css" rel="stylesheet">

        <!-- Switchery -->
    <link href="/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <link href="/css/fileinput.min.css" rel="stylesheet">

      <link href="/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <style>
      #personas .ui-selecting { background: #337ab7; }
      #personas .ui-selected { background: #337ab7; color: white; }
      #personas { list-style-type: none; margin: 0; padding: 0; width: 60%; }  
    </style>



@endsection


@section('sidemenu')
        
            
      @include('op.menu')

@endsection


@section('content')




            <div>
                
                <div class="container" >
      <div class="row">
        <div class="col-md-12">
                    <input class=" col-sm-offset-2 col-sm-2" type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

          <form id="capturaForm" class="form-horizontal"  >
            <div class="form-group"> 
              <label class="control-label col-sm-offset-2 col-sm-2">Número de Folio</label>
            <div class="col-sm-6">
              <input type="text" id="no_folio" name="no_folio" class="form-control" placeholder="Número de Folio"> 
            </div>
          </div>
            <div class="form-group"> 
              <label class="control-label col-sm-offset-2 col-sm-2">Número de Oficio</label>
              <div class="col-sm-6">
                <input type="text" id="no_oficio" name="no_oficio" class="form-control" placeholder="Número de Oficio">
              </div> 
          </div>
            <div class="form-group"> 
              <label class="control-label col-sm-offset-2 col-sm-2">Remitente</label>
              <div class="col-sm-6">
                <input type="text" id="remitente_c" name="remitente_c" class="form-control" placeholder="Remitente">
              </div> 
          </div>
          <div class="form-group"> 
            <label class="control-label col-sm-offset-2 col-sm-2">Remitente</label>
              <div class="col-sm-6">
                <input type="text" id="remitente_e" name="remitente_e" class="form-control" placeholder="Remitente">
              </div> 
          </div>
          <div class="form-group"> 
            <label class="control-label col-sm-offset-2 col-sm-2">Remitente</label>
              <div class="col-sm-6">
                <select type="text" id="remitente_id" name="remitente_id" class="form-control" placeholder="Remitente">
                </select>
              </div> 
          </div>
          <div class="form-group"> 
            <label class="control-label col-sm-offset-2 col-sm-2">Destinatario</label>
              <div class="col-sm-6">
                <select type="text" id="destinatario_id" name="destinatario_id" class="form-control" placeholder="Destinatario">
                </select>
              </div> 
          </div>
            <div class="form-group"> 
              <label class="control-label col-sm-offset-2 col-sm-2">Dependencia</label>
              <div class="col-sm-6">
                <input type="text" id="dependencia_e" name="text" class="form-control" placeholder="Dependencia">
              </div> 
          </div>
            <div class="form-group"> 
              <label class="control-label col-sm-offset-2 col-sm-2">Fecha de emisión</label>
              <div class="col-sm-6">
                <input type="date" id="fecha_emision" name="fecha_emision" class="form-control" placeholder="Fecha de emisión">
              </div> 
          </div>
            <div class="form-group"> 
              <label class="control-label col-sm-offset-2 col-sm-2">Asunto</label>
              <div class="col-sm-6">
                <input type="text" id="asunto" name="asunto" class="form-control" placeholder="Asunto">
              </div> 
          </div>

          <div class="form-group"> 
            <label class="control-label col-sm-offset-2 col-sm-2">Archivo</label>
              <div class="col-sm-6">
                <input type="file" id="archivo" name="archivo" class="form-control" placeholder="Subir Archivo">
              </div> 
          </div>
          

            <button id="guardar" class="btn btn-primary col-sm-offset-8 col-sm-2">Guardar Cambios</button>
          
          </form>

        </div>
      </div>
    </div>
            </div>
                
  

@endsection

@section('javascript')
      
    

    <script src="/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="/js/fileinput.min.js" type="text/javascript"></script>
    <script src="/js/fileinput_locale_es.js" type="text/javascript"></script>
    <script src="/js/crud.js"></script>
    <script src="/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/vendors/jqueryui/jquery-ui.min.js"></script>
    <script src="/vendors/switchery/dist/switchery.min.js"></script>
    <!-- iCheck -->
    <script src="/vendors/iCheck/icheck.min.js"></script>

    @include('op.js.form')


@endsection