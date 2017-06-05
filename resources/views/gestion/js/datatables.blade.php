
<script src="/js/fileinput.min.js" type="text/javascript"></script>
<script src="/js/fileinput_locale_es.js" type="text/javascript"></script>
<script src="/js/crud.js"></script>
<script src="/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/vendors/jqueryui/jquery-ui.min.js"></script>


<script>
  


$(document).ready(function(){



  @include('gestion.js.datatablesExterno')
  
  @include('gestion.js.datatablesInterno')

  @include('gestion.js.datatablesCiudadano')
  

$('#enviar-button').click(  function () {


var tab=$('.nav-tabs .active')[0].children[0].id;



switch(tab) {
    case 'externo-tab':
        var dataTable=myDataTable;
        break;
    
    case 'interno-tab':
        var dataTable=myDataTableExterno;
        break;
    
    case 'ciudadano-tab':
        var dataTable=myDataTableCiudadano;
        break;
   
}
        var data = dataTable.row( $(this).parents('tr') ).data();
//        console.log("uploads/"+data.archivo);

  
  var data = dataTable.row( $(this).parents('tr') ).data();
     
  var token=$('#token').val();
  var jsonData={};
  var urlRequest="";

jsonData.id=$('#oficio_id').val();
urlRequest='/gestion/changeStatusEnviar';


  $.ajax({
    url:urlRequest,
    headers:{'X-CSRF-TOKEN':token},
    type:'POST',
    dataType:'json',
    data:jsonData,
    success:function(response){

      console.log(response);
      dataTable.ajax.reload();



      
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


$("#save-button").click(function(){



var tab=$('.nav-tabs .active')[0].children[0].id;



switch(tab) {
    case 'externo-tab':
        var dataTable=myDataTable;
        break;
    
    case 'interno-tab':
        var dataTable=myDataTableExterno;
        break;
    
    case 'ciudadano-tab':
        var dataTable=myDataTableCiudadano;
        break;
   
}

  var token=$('#token').val();
  var urlRequest='/gestion/updateTurnado';
  var jsonString='{';
  var keyname="";

    
  for(i=0;i<modalFormModel.length;i++){

   keyname=Object.keys(modalFormModel[i])[0];
   jsonString=jsonString +'"'+modalFormModel[i][keyname].id+'":"'+$('#'+modalFormModel[i][keyname].id).val()+'",';


   }

    jsonString=jsonString.substring(0,jsonString.length-1);
    jsonString=jsonString+"}";
    console.log(jsonString);

    var jsonData=JSON.parse(jsonString);
  

  $.ajax({
    url:urlRequest,
    headers:{'X-CSRF-TOKEN':token},
    type:'POST',
    dataType:'json',
    data:jsonData,
    success:function(response){


    dataTable.ajax.reload();
      console.log(response);
     
                
      
    },
    error:function(msj){
         //var message=msj[Object.keys(msj)];
         console.log(msj.responseText);
         var resObjt=JSON.parse(msj.responseText);
         var message=resObjt[Object.keys(resObjt)];      
         console.log(message);

       }


     });





});


});


</script>


            