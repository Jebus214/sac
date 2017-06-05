@extends('layouts.app')


@section('css')
        
    <link href="/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="/vendors/jqueryui/jquery-ui.min.css" rel="stylesheet">
        <!-- Switchery -->
    <link href="/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <link href="/css/fileinput.min.css" rel="stylesheet">

    <style>
      #personas .ui-selecting { background: #337ab7; }
      #personas .ui-selected { background: #337ab7; color: white; }
      #personas { list-style-type: none; margin: 0; padding: 0; width: 60%; }  
    </style>



@endsection


@section('sidemenu')
        
            
      @include('dependencia.menu')

@endsection


@section('content')



            <div id="parentF">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

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

    @include('dependencia.js.form')

@endsection