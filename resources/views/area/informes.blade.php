@extends('layouts.app')


@section('css')
        
    <link href="/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="/vendors/jqueryui/jquery-ui.min.css" rel="stylesheet">
    <link href="/css/fileinput.min.css" rel="stylesheet">



@endsection


@section('sidemenu')
        
            
      @include('area.menu')

@endsection


@section('content')


          <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Archivo </h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            
                  <div class="col-md-12 embed-responsive embed-responsive-4by3">
                     <iframe  class="embed-responsive-item" src=""></iframe>
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

           <table id="dataTable" class="cell-border" cellspacing="0"  style="width:100%">
           
            <thead>
              @include('area.datatablesfields')
            </thead>
          
 
          </table>  


          
          </div>
</div>



@endsection


@section('javascript')

     @include('area.js.datatables')

@endsection