@extends('layouts.app')


@section('css')
        
    <link href="/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="/vendors/jqueryui/jquery-ui.min.css" rel="stylesheet">
    <link href="/css/fileinput.min.css" rel="stylesheet">



@endsection


@section('sidemenu')
        
            
      @include('gestion.menu')

@endsection


@section('content')


          


<div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Oficios</h3>
          </div>
          <div id="parentF" class="panel-body">

           <table id="dataTable" class="cell-border" cellspacing="0"  style="width:100%">
           
            <thead>
              @include('gestion.tabs')
            </thead>
          
 
          </table>  


          
          </div>
</div>



@endsection


@section('javascript')

     @include('gestion.js.datatables')

@endsection