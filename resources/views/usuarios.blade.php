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
            <h3 class="panel-title">Alta Usuarios</h3>
          </div>
          <div id="parentF" class="panel-body">

            
          </div>
</div>


<div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Usuarios</h3>
          </div>
          <div id="parentT" class="panel-body">
            
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
<script>
  
$(document).ready(function(){

var usuario=new crud('User','parentT','cargarUsuario','usuario');
usuario.crearInsertForm('parentF', {id:'hidden',email:'text',name:'text',apellidos:'text',direccion_id:'select',permisos:'text',status:'text',password:'password'});
usuario.crearEditForm('myModal', {id:'hidden',email:'text',name:'text',apellidos:'text',direccion_id:'select',permisos:'text',status:'text',password:'password'});
usuario.crearTabla('parentT',[{"data":"id"},{"data":"email"},{"data":"name"},{"data":"direccion.nombre"},{"data":"permisos"},{"data":"status"}],'cargarUsuario');
usuario.crearSelect('cargarDireccion','direccion_id','id','nombre');
usuario.crearSelect('cargarDireccion','direccion_ideditForm','id','nombre');


});

</script>


  

    @include('op.js.form')


@endsection