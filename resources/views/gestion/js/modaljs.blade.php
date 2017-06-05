<script>
  

var oficio=new crud('Oficio','parentT','cargarOficio','/oficio');
var modalFormModel=[
                    {input:{label:'No Oficio',id:'no_oficio',type:"text"}},
                    {input:{label:'Asunto',id:'asunto',type:"text"}},                                
                    {select:{label:'Destinatario',id:'destinatario_id'}},
                    {select:{label:'C.C.P.',id:'copia_id'}},
                    {input:{label:'',id:'oficio_id',type:"hidden"}},
                    ];

oficio.crearInsertForm2('parentF',  modalFormModel);



$('#create-buttonOficio').remove();


oficio.crearSelect('/cargarPersonaFilter','destinatario_id','id','fullname','1');
oficio.crearSelect('/cargarPersonaFilter','copia_id','id','fullname','1');
oficio.crearSelect('/cargarNoOficio','seguimiento','id','no_oficio','1');
oficio.crearSelect('/dependencia','dependencias','id','nombre','0');

$('#destinatario_id').attr('multiple',"multiple");
$('#destinatario_id').select2();


$('#copia_id').attr('multiple',"multiple");
$('#copia_id').select2();
$('span.select2.select2-container.select2-container--default').attr('style','width:100%')





 var alert=$('<div>',{class:"alert alert-success alert-dismissible fade in",role:"alert"}).append(
  $('<button>',{class:"close","data-dismiss":"alert","aria-label":"Close"}).append()

  ).append().append(

      $('<strong>',{html:"success"})    
  );
  
  $('#parentF').append(alert);

  alert.hide();

  $("#al").hide();




$("#regresar-btn").click(function(){

      $('#enviarModal').modal('toggle');
        $("#al").hide();

});

$("#save-button").click(function(){

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

        $("#al").show();

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



</script>


            