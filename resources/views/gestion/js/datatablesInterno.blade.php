var columnsArrayInterno=[  {"data":"id"},{"data":"no_oficio"},
                    {"data":"remitentes.fullname"},
                    {"data":"destinatarios[,].fullname"},
                    {"data":"destinatarios[,].dependenciap"},
                    {"data":"destinatarios[,].area.nombre"},
                    {"data":"fecha_emision"},
                    {"data":"asunto"},
                    {"data":"destinatarios[,].pivot.recibido"},
                    ];

                    

var myDataTableInterno=$('#dataTableInterno').DataTable( {
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
    url:  '/gestion/capturados',
    dataSrc: ''
  },
  "columns": columnsArrayInterno/*[{ "data": "id" },{ "data": "name" }]*/,

  "columnDefs": [{
    "targets":10,
    "data": null,
    "defaultContent": '<button class="btn btn-primary"><i class="fa fa-file-text"></i>Ver</button>'
  } ,
  
  {
    "targets":9,
    "data": "id",
      "render": function ( data, type, full, meta ) {
      return '<a class="btn btn-success" href="/gestion/detalle/'+data+'"><i class="fa fa-file-text"></i>detalle</a>'
    },
    

  },

  {
    "targets":8,
    "data": "id",
      "render": function ( data, type, full, meta ) {
        var status=data;

        if (status==0) {
          return '<button class="btn btn-danger interno"><i class="fa fa-file-text"></i>Enviar</button>'    
        }

        if (status==1) {
          return '<a class="btn btn-warning" href="#'+data+'">Enviado</a>'    
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
        
        if(data==null){
           //var dataColumns = myDataTableInterno.row( $('#dataTable tbody').parents('tr') ).data();  
           return "&nbspCiudadano" 
        }
        else{
          return data;  
        }
        
    }     
   },  

  ]

} );



$('#dataTableInterno tbody').on( 'click', 'button.btn-primary', function () {
        
        var data = myDataTableInterno.row( $(this).parents('tr') ).data();

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




$('#dataTableInterno tbody').on( 'click', 'button.btn-danger.interno', function () {

         var data = myDataTableInterno.row( $(this).parents('tr') ).data();
       
          $('#form-modal-interno').modal('toggle');




    } );

