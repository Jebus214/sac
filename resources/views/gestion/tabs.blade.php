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
        
            
      @include('gestion.menu')

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


                @include('gestion.enviarmodal')



                <div class="x_panel">
                  <div class="x_title">
                    
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist">

                        <li role="presentation" class="active"><a href="#tab_content11" id="externo-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Externo</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content22" role="tab" id="interno-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Interno</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content33" role="tab" id="ciudadano-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Ciudadano</a>
                        </li>

                      </ul>

                      <div id="myTabContent2" class="tab-content">
                       
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content11" aria-labelledby="home-tab">
                                  <table id="dataTableExterno" class="cell-border" cellspacing="0"  style="width:100%">
           
                                      <thead>
                                        @include('gestion.datatablesfieldsExterno')
                                      </thead>
                                    
                           
                                    </table>
                        </div>
                        
                        <div role="tabpanel" class="tab-pane fade" id="tab_content22" aria-labelledby="profile-tab">
                                  <table id="dataTableInterno" class="cell-border" cellspacing="0"  style="width:100%">
           
                                      <thead>
                                        @include('gestion.datatablesfieldsInterno')
                                      </thead>
                                    
                           
                                    </table>
                        </div>
                        
                        <div role="tabpanel" class="tab-pane fade" id="tab_content33" aria-labelledby="profile-tab">
                                      <table id="dataTableCiudadano" class="cell-border" cellspacing="0"  style="width:100%">
           
                                      <thead>
                                        @include('gestion.datatablesfieldsCiudadano')
                                      </thead>
                                    
                           
                                    </table>
                        </div>
                      
                      </div>

                    </div>

                  </div>
                </div>



@endsection


@section('javascript')
      <script src="/js/crud.js"></script>

    <script src="/vendors/select2/dist/js/select2.full.min.js"></script>
      

     @include('gestion.js.modaljs')  
     @include('gestion.js.datatables')
    
     
@endsection
              