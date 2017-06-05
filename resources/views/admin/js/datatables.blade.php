
<script src="/js/fileinput.min.js" type="text/javascript"></script>
<script src="/js/fileinput_locale_es.js" type="text/javascript"></script>
<script src="/js/crud.js"></script>
<script src="/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/vendors/jqueryui/jquery-ui.min.js"></script>


<script>
  


$(document).ready(function(){






var columnsArray=[  
                    {"data":"id"},{"data":"no_oficio"},
                    {"data":"remitentes.fullname"},
                    {"data":"destinatarios[,].fullname"},
                    {"data":"destinatarios[,].dependenciap"},
                    {"data":"destinatarios[,].area.nombre"},
                    {"data":"fecha_emision"},
                    {"data":"asunto"},
                    {"data":"cpersona[,].nombre"}
                    
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
    url:  '/oficialia/capturados',
    dataSrc: ''
  },
  "columns": columnsArray/*[{ "data": "id" },{ "data": "name" }]*/,

  "columnDefs": [{
    "targets":10,
    "data": null,
    "defaultContent": '<button class="btn btn-primary"><i class="fa fa-file-text"></i>Ver</button>'
  } ,
  
    {
    "targets":2,
    "data": null, 
      "render": function ( data, type, full, meta ) {
        console.log(data);
        
        if(data==null){
           //var dataColumns = myDataTable.row( $('#dataTable tbody').parents('tr') ).data();  
           return "&nbspCiudadano" 
        }
        else{
          return data;  
        }
        
    }     
   },

   {
    "targets":9,
    "data": "id",
      "render": function ( data, type, full, meta ) {
      return '<a class="btn btn-success" href="/oficialia/detalle/'+data+'"><i class="fa fa-file-text"></i>detalle</a>'
    },
    

  },
  

  ]

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


});


</script>


            