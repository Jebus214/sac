
<script src="/js/fileinput.min.js" type="text/javascript"></script>
<script src="/js/fileinput_locale_es.js" type="text/javascript"></script>
<script src="/js/crud.js"></script>
<script src="/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/vendors/jqueryui/jquery-ui.min.js"></script>


<script>
  


$(document).ready(function(){






var columnsArray=[  {"data":"id"},{"data":"no_oficio"},
                    {"data":"remitenteresponse"},
                    {"data":"destinatarios[,].fullname"},
                    {"data":"destinatarios[,].dependenciap"},
                    {"data":"destinatarios[,].area.nombre"},
                    {"data":"fecha_emision"},
                    {"data":"asunto"},
                    {"data":"destinatarios[,].pivot.recibido"},
                    ];

                    

var myDataTable=$('#dataTable').DataTable( {
  "language":{
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
  },
  ajax: {
    url:  '/dep/oficios',
    dataSrc: ''
  },
  "columns": columnsArray/*[{ "data": "id" },{ "data": "name" }]*/,

  "columnDefs": [{
    "targets":11,
    "data": null,
    "defaultContent": '<button class="btn btn-primary"><i class="fa fa-file-text"></i>Ver</button>'
  } ,
  
  {
    "targets":10,
    "data": "id",
      "render": function ( data, type, full, meta ) {
      return '<a class="btn btn-success" href="/dep/detalle/'+data+'"><i class="fa fa-file-text"></i>detalle</a>'
    },
    

  },

  {
    "targets":9,
    "data": "id",
      "render": function ( data, type, full, meta ) {
        var status=data;


          return '<button class="btn btn-secondary">Reenviar</button>'    
        
        
      
    },
    

  },

  {
    "targets":8,
    "data": "id",
      "render": function ( data, type, full, meta ) {
        var status=data;

        if (status==1) {
          return '<button class="btn btn-danger"><i class="fa fa-file-text"></i>Recibir</button>'    
        }

        if (status==0) {
          return '<a class="btn btn-warning" href="#'+data+'">oficialia</a>'    
        }


        if (status==2) {
          return '<a class="btn btn-info" href="#'+data+'">Recibido</a>'    
        }
        
      
    },
    

  },
  
    {
    "targets":2,
    "data": null, 
      "render": function ( data, type, full, meta ) {
        
          console.log(data);


     if(data.remitenteCiudadano==""&&data.remitenteExterno==""&&data.remitenteInterno==null){
           //var dataColumns = myDataTable.row( $('#dataTable tbody').parents('tr') ).data();  
           return "";
        }


        if(data.remitenteCiudadano==""&&data.remitenteExterno==""){
           //var dataColumns = myDataTable.row( $('#dataTable tbody').parents('tr') ).data();  
           return data.remitenteInterno.fullname;
        }


        if(data.remitenteCiudadano==""&&data.remitenteInterno==null){
           //var dataColumns = myDataTable.row( $('#dataTable tbody').parents('tr') ).data();  
           return data.remitenteExterno;
        }

        if(data.remitenteExterno==""&&data.remitenteInterno==null){
           //var dataColumns = myDataTable.row( $('#dataTable tbody').parents('tr') ).data();  
           return data.remitenteCiudadano;
        }
        

   
        
    }     
   },  

  ]

} );



$('#dataTable tbody').on( 'click', 'button.btn-secondary', function () {
        
        var data = myDataTable.row( $(this).parents('tr') ).data();

        console.log('asdasdasdsad');

        $('#form-message').hide();

          $('#form-modal').modal('toggle');
    } );



$('#dataTable tbody').on( 'click', 'button.btn-primary', function () {
        
        var data = myDataTable.row( $(this).parents('tr') ).data();

        console.log(data.remitentes);

        if (data.remitente_id==0) {
          $("iframe").attr('src','/uploads/15/47/'+data.no_oficio+'/'+data.archivo);
        }

        else{
          $("iframe").attr('src','/uploads/'+data.remitentes.dependencia.id+'/'+data.remitentes.area_id+'/'+data.no_oficio+'/'+data.archivo);
          //alert("el archivo  es: "+ data.archivo );
        }

          $('#myModal').modal('toggle');
    } );





$('#dataTable tbody').on( 'click', 'button.btn-danger', function () {
        var data = myDataTable.row( $(this).parents('tr') ).data();
//        console.log("uploads/"+data.archivo);

  
  var data = myDataTable.row( $(this).parents('tr') ).data();
     
  var token=$('#token').val();
  var jsonData={};
  var urlRequest="";

jsonData.id=data.id;  
urlRequest='/dep/changeStatusRecibir';


  $.ajax({
    url:urlRequest,
    headers:{'X-CSRF-TOKEN':token},
    type:'POST',
    dataType:'json',
    data:jsonData,
    success:function(response){

      console.log(response);
      myDataTable.ajax.reload();
      
    },
    error:function(msj){
         //var message=msj[Object.keys(msj)];
         console.log(msj.responseText);
         var resObjt=JSON.parse(msj.responseText);
         var message=resObjt[Object.keys(resObjt)];      
         console.log(message);

       }


     });


    

    } );







});


</script>


            