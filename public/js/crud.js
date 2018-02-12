 function crud(modelName,parentTable,listingRoute,modelRoute){
  this.modalId="myModal";
  this.token=$("#token").val();
  //this.token="";
  this.listingRoute=listingRoute;
  this.formId=modelName;
  this.modelName=modelName;
  this.modelRoute=modelRoute;
  this.model=[];
  this.dataTableReferences=[];

  
  var formModel;
  var editFormModel;
  var insertForm;
  var editForm;
  var parentEditForm;
  var parentInsertForm;
  //var dataTableReference;
  
  //var tableElement;

//crearEditForm(parentEditForm,editFormModel)
//crearInsertForm(parentInsertForm,formModel)
//crearTabla(parentTable)
//llenarTabla(dataArray)
//postFormAjaxRequest()
//updateFormAjaxRequest()
//deleteAjaxRequest(idInput)

}


crud.prototype.record=function(){
  var s="crear ";
  for (key in this.formModel){
    s=s+key+',';
  }
  console.log(s);	
}



crud.prototype.crearEditForm=function(parentEditForm,editFormModel){

this.parentEditForm=parentEditForm;
this. editFormModel=editFormModel;
this.editForm=$('<form>',{id:'formEdit'+this.modelName,role:'form',class:'form-horizontal'})[0];


  var formChilds=[];
  var elementType='';

  for (var key in this.editFormModel) {    



    if (this.editFormModel.hasOwnProperty(key)) {


      switch (this.editFormModel[key]) {
        case 'text':
        elementType = "input";
        break;
        case 'password':
        elementType = "input";
        break;
        case 'hidden':
        elementType = "input";
        break;

        case 'date':
        elementType= "input";
        break;

        case 'select':
        elementType= "select";
        break;

      }

      elementType='<'+elementType+'>';


            //formChilds.push($(elementType,{class:'form-control',id:key, placeholder:key, type:this.editFormModel[key]})[0]);
             //myForm.appendChild($('<div>',{class:'form-control'}).append($('<label>',{class:'control-label',text:key})[0],$(elementType,{class:'form-control',id:key, placeholder:key, type:this.editFormModel[key]})[0])[0]);


             if(this.editFormModel[key]=='hidden'){
              this.editForm.appendChild(
                $('<div>',{class:'form-group'}).append(

                  $('<div>',{class:'col-sm-6'}).append(
                    $(elementType,{class:'form-control',id:key+"editForm", placeholder:key, type:this.editFormModel[key]})[0]
                    )[0]

                  )[0]

                );
            }

            else{
              this.editForm.appendChild(
                $('<div>',{class:'form-group'}).append(

                  $('<label>',{class:'control-label col-sm-offset-2 col-sm-2',text:key})[0],
                  $('<div>',{class:'col-sm-6'}).append(
                    $(elementType,{class:'form-control',id:key+"editForm", placeholder:key, type:this.editFormModel[key]})[0]
                    )[0]

                  )[0]

                );
            }



          }
        }


        var testInstance=this;

       /* $('body').on('click', '#edit-button', function () {
       

      });*/
         var btnEdit=$("<a>",{class:"btn btn-primary",id:"update-btn",href:'#',text:"Actualizar"})[0];
         var btnClose=$("<a>",{class:"btn btn-danger","data-dismiss":"modal",href:'#',text:"Cancelar"})[0];

console.log('#'+this.parentEditForm+" .modal-footer");
        $('#'+this.parentEditForm+' .modal-footer').append(btnEdit);
        $('#'+this.parentEditForm+' .modal-footer').append(btnClose);





         $('body').on('click', '#update-btn', function () {
         jsonString="{";

         for(key in testInstance.editFormModel){

          jsonString=jsonString +key+":"+$('#'+key+"editForm").val()+",";
          //console.log($('#'+key).val());
        }

        jsonString=jsonString.substring(0,jsonString.length-1);
        jsonString=jsonString+"}";
        console.log(jsonString);

        testInstance.updateFormAjaxRequest();
        var routeDel=testInstance.listingRoute;

        for (var i =0; i< testInstance.dataTableReferences.length ; i++) {
            testInstance.dataTableReferences[i].ajax.reload();
            testInstance.dataTableReferences[i].columns.adjust().draw();

        }

        

      });


    $('#'+parentEditForm+" .modal-body").append(this.editForm);
    
}

crud.prototype.crearInsertForm2=function(parentInsertForm,insertFormModel){




this.parentInsertForm=parentInsertForm;
this. insertFormModel=insertFormModel;
this.insertForm=$('<form>',{id:'formEdit'+this.modelName,role:'form',class:'form-horizontal'})[0];


  var formChilds=[];
  var elementType='';

  for (i=0;i<insertFormModel.length;i++) {    

//-----------------------------------------------------------------------------------------------------




      switch (Object.keys(this.insertFormModel[i])[0]) {
        case 'input':
        elementType = "input";
        break;
        case 'select':
        elementType = "select";
        break;     
      }

      elementType='<'+elementType+'>';
      console.log(elementType);
            //formChilds.push($(elementType,{class:'form-control',id:key, placeholder:key, type:this.insertFormModel[key]})[0]);
             //myForm.appendChild($('<div>',{class:'form-control'}).append($('<label>',{class:'control-label',text:key})[0],$(elementType,{class:'form-control',id:key, placeholder:key, type:this.insertFormModel[key]})[0])[0]);


             if(elementType=='<input>'){
              this.insertForm.appendChild(

            $('<div>',{class:'form-group'}).append(

                  $('<label>',{class:'control-label col-sm-offset-2 col-sm-2',text:this.insertFormModel[i].input.label})[0],
                  $('<div>',{class:'col-sm-6'}).append(
                    $(elementType,{class:'form-control',id:this.insertFormModel[i].input.id, placeholder:this.insertFormModel[i].input.label, type:this.insertFormModel[i].input.type})[0]
                    )[0]

                  )[0]

                );
            }

            else{
              this.insertForm.appendChild(
                $('<div>',{class:'form-group'}).append(

                  $('<label>',{class:'control-label col-sm-offset-2 col-sm-2',text:this.insertFormModel[i].select.label})[0],
                  $('<div>',{class:'col-sm-6'}).append(
                    $(elementType,{class:'form-control',id:this.insertFormModel[i].select.id, placeholder:this.insertFormModel[i].select.label} )[0]
                    )[0]

                  )[0]

                );
            }



          


//--------------------------------------------------------------------------------------------------------
        }


       $('<div>',{class:'col-sm-12'}).append($('<a>',{class:'btn btn-primary',id:'create-button',href:'#',role:'button',text:'Agregar'})[0]);

        var b=$('<a>',{class:'btn btn-primary',id:'create-button'+this.formId,href:'#',role:'button',text:'Agregar'})[0];




        this.insertForm.appendChild($('<div>',{class:'col-sm-3 col-sm-offset-9'}).append(b)[0]);


        var testInstance=this;

        $('body').on('click', '#create-button'+this.formId, function (e) {
          e.preventDefault();
         jsonString="{";

         for(key in testInstance.formModel){

          jsonString=jsonString +key+":"+$('#'+key).val()+",";
          //console.log($('#'+key).val());
        }

        jsonString=jsonString.substring(0,jsonString.length-1);
        jsonString=jsonString+"}";
        console.log(jsonString);

        testInstance.postFormAjaxRequest();
        var routeDel=testInstance.listingRoute;

        for (var i=0;i<testInstance.dataTableReferences.length;i++){
           testInstance.dataTableReferences[i].ajax.reload();
           testInstance.dataTableReferences[i].columns.adjust().draw();
        }

      });

      $('#'+parentInsertForm).append(this.insertForm);


      }


crud.prototype.crearInsertForm=function(parentInsertForm,formModel){
  
this.parentInsertForm=parentInsertForm;
  this.formModel=formModel;


 
 this.insertForm=$('<form>',{id:'formInsert'+this.modelName,role:'form',class:'form-horizontal'})[0];
 

  var formChilds=[];
  var elementType='';

  for (var key in this.formModel) {    



    if (this.formModel.hasOwnProperty(key)) {


      switch (this.formModel[key]) {
        case 'text':
        elementType = "input";
        break;
        case 'password':
        elementType = "input";
        break;
        case 'hidden':
        elementType = "input";
        break;
         
        case 'date':
        elementType= "input";
        break;

        case 'select':
        elementType= "select";
        break;

      }

      elementType='<'+elementType+'>';


            //formChilds.push($(elementType,{class:'form-control',id:key, placeholder:key, type:this.formModel[key]})[0]);
             //myForm.appendChild($('<div>',{class:'form-control'}).append($('<label>',{class:'control-label',text:key})[0],$(elementType,{class:'form-control',id:key, placeholder:key, type:this.formModel[key]})[0])[0]);


             if(this.formModel[key]=='hidden'){
              this.insertForm.appendChild(
                $('<div>',{class:'form-group'}).append(

                  $('<div>',{class:'col-sm-6'}).append(
                    $(elementType,{class:'form-control',id:key, placeholder:key, type:this.formModel[key]})[0]
                    )[0]

                  )[0]

                );
            }

            else{
              this.insertForm.appendChild(
                $('<div>',{class:'form-group'}).append(

                  $('<label>',{class:'control-label col-sm-offset-2 col-sm-2',text:key})[0],
                  $('<div>',{class:'col-sm-6'}).append(
                    $(elementType,{class:'form-control',id:key, placeholder:key, type:this.formModel[key]})[0]
                    )[0]

                  )[0]

                );
            }



          }
        }


        $('<div>',{class:'col-sm-12'}).append($('<a>',{class:'btn btn-primary',id:'create-button',href:'#',role:'button',text:'Agregar'})[0]);

        var b=$('<a>',{class:'btn btn-primary',id:'create-button'+this.formId,href:'#',role:'button',text:'Agregar'})[0];




        this.insertForm.appendChild($('<div>',{class:'col-sm-4 col-sm-offset-8'}).append(b)[0]);


        var testInstance=this;

        $('body').on('click', '#create-button'+this.formId, function () {
         jsonString="{";

         for(key in testInstance.formModel){

          jsonString=jsonString +key+":"+$('#'+key).val()+",";
     			//console.log($('#'+key).val());
     		}

     		jsonString=jsonString.substring(0,jsonString.length-1);
     		jsonString=jsonString+"}";
     		console.log(jsonString);

        testInstance.postFormAjaxRequest();
        var routeDel=testInstance.listingRoute;

       testInstance.dataTableReference.ajax.reload();
          testInstance.dataTableReference.columns.adjust().draw();


      });

      $('#'+parentInsertForm).append(this.insertForm);


      }





crud.prototype.crearTabla=function(parentTable,columnsArray,listingRoute){
 

var myTable=$('<table>',{id:parentTable+this.modelName+"DataTable",class:"cell-border",cellspacing:"0",width:"100%"}).append($('<thead>').append($('<tr>')));
var tr=myTable.children().children();

for(i=0;i<columnsArray.length;i++){
  tr.append($('<th>',{text:columnsArray[i]['data']}));
}

tr.append($('<th>',{text:'Editar'}));
tr.append($('<th>',{text:'Eliminar'}));




$('#'+parentTable).append(myTable);

console.log($('#'+parentTable).html());


 var myDataTable=$('#'+parentTable+this.modelName+"DataTable").DataTable( {
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
    url:  listingRoute,
    dataSrc: ''
  },
  "columns": columnsArray/*[{ "data": "id" },{ "data": "name" }]*/,

  "columnDefs": [{
    "targets":columnsArray.length,
    "data": null,
    "defaultContent": '<button class="btn btn-primary"><i class="fa fa-file-text"></i>Editar</button>'
  } ,
  {
    "targets":columnsArray.length+1,
    "data": null,
    "defaultContent": '<button class="btn btn-danger"><i class="fa fa-trash"></i>Borrar</button>'
  },

  ]

} );

 this.dataTableReferences.push(myDataTable);


var ObjectPointer=this;
//$('#'+parentTable+this.modelName+"DataTable"+ ' tbody').off();
   $('#'+parentTable+this.modelName+"DataTable"+ ' tbody').on( 'click', 'button.btn-danger', function () {
        var data = myDataTable.row( $(this).parents('tr') ).data();
  console.log(data.id);

        alert("Desea borrar el id "+ data.nombre +"  es: "+ data.id );

        ObjectPointer.deleteAjaxRequest(data.id);
        myDataTable.ajax.reload();
        myDataTable.columns.adjust().draw();


    } );


 $('#'+parentTable+this.modelName+"DataTable"+ ' tbody').on( 'click', 'button.btn-primary', function () {
        var data = myDataTable.row( $(this).parents('tr') ).data();
  
  var route=ObjectPointer.modelRoute+"/"+data.id;
  console.log(route);

$.get({url:route,
    headers:{'X-CSRF-TOKEN':ObjectPointer.token},
    success:function(res){
      console.log("exito "+route);
      console.log(JSON.stringify(res));
      if(!res){console.log("nop"); return};
      for(key in ObjectPointer.editFormModel){

        $('#'+key+'editForm').val(res[key]);
                console.log($('#'+key).val());
              }

            },
    error:function(res){
        console.log("error en la "+route);

      }            

          });

  $('#myModal').modal('show');

    } );
  


  }


  crud.prototype.postFormAjaxRequest=function(){

    var route=this.modelRoute;
    var jsonString='{';
    var operation='POST';
    var token=this.token;

    for(i=0;i<this.insertFormModel.length;i++){

       keyname=Object.keys(this.insertFormModel[i])[0];




       

       if(this.insertFormModel[i][keyname].id!="archivo"){



        jsonString=jsonString +'"'+this.insertFormModel[i][keyname].id+'":"'+$('#'+this.insertFormModel[i][keyname].id).val()+'",';
        
      }
      else{

        /*if($('#archivo').val()==""){

           $("#msj-error" ).empty();
           $("#msj-error" ).append($('<strong>',{html:"Seleccionar archivo"}));
            window.scrollTo(0, 0);

           $("#msj-error" ).fadeIn(1000);
           $("#msj-error" ).fadeOut(6000 );

         return
       }*/


     }




      }

              jsonString=jsonString.substring(0,jsonString.length-1);
              jsonString=jsonString+"}";

              console.log(jsonString);

              var jsonData=JSON.parse(jsonString);
              



              $.ajax({
                url:route,
                headers:{'X-CSRF-TOKEN':token},
                type:operation,
                dataType:'json',
                data:jsonData,
                success:function(response){
                  $("#good").html(response.mensaje);
                  //$( "#msj-success" ).modal('show');
                
                  alert("Oficio guardado exitosamente");
                  location.reload();

                },
                error:function(xhr, error){
                
            
              var msj=JSON.parse(xhr.responseText);
              $("#msj-error-node" ).empty();

              for (var k in msj){
                    if (msj.hasOwnProperty(k)) {
                        console.log(msj[k][0]);
                        $("#msj-error-node" ).append($('<strong>',{html:msj[k][0]}));
                        $("#msj-error-node" ).append("<br>");
                   }
                 }
                 //window.scrollTo(0, 0);
                 $("#msj-error" ).modal('show');
                
       }


     });



}


  crud.prototype.updateFormAjaxRequest=function(){

    var route=this.modelRoute+"/"+$('#ideditForm').val();
    var jsonString='{';
    var operation='PUT';
    var token=this.token;

    for(key in this.editFormModel){

      jsonString=jsonString +'"'+key+'":"'+$('#'+key+"editForm").val()+'",';
                //console.log($('#'+key).val());
              }

              jsonString=jsonString.substring(0,jsonString.length-1);
              jsonString=jsonString+"}";

              var jsonData=JSON.parse(jsonString);

              $.ajax({
                url:route,
                headers:{'X-CSRF-TOKEN':token},
                type:operation,
                dataType:'json',
                data:jsonData,
                success:function(response){
                  console.log(response);
                  $('#myModal').modal('toggle');

                },
                error:function(msj){
         //var message=msj[Object.keys(msj)];
         console.log(msj.responseText);
         var resObjt=JSON.parse(msj.responseText);
         var message=resObjt[Object.keys(resObjt)];      
         console.log(message);

       }


     });

}


crud.prototype.llenarSelect=function(targetId,dataArray,targetValueKey,targetTextKey,inicial){

    var options=[];

    if(inicial=='0')
      options.push($('<option>',{value:0,text:""}));

    $(dataArray).each(function(key,val){

      options.push($('<option>',{value:val[targetValueKey],text:val[targetTextKey]}));

    });
    
    $("#"+targetId).append(options);
    console.log($("#"+targetId));

  }

crud.prototype.crearSelect=function(modelRoute,targetId,targetValueKey,targetTextKey,inicial){

   var ObjectPointer=this;
    var ini=inicial;
   $.get({url:modelRoute,
    headers:{'X-CSRF-TOKEN':ObjectPointer.token},
    success:function(res){
      console.log("exito "+modelRoute);
      console.log(JSON.stringify(res));
      if(!res){console.log("nop"); return};
      ObjectPointer.llenarSelect(targetId,res,targetValueKey,targetTextKey,ini);

      },
    error:function(res){
        console.log("error en la "+modelRoute);

      }            

      });


    }    

crud.prototype.deleteAjaxRequest=function(idInput){
  var route=this.modelRoute+"/"+idInput;

  var operation='DELETE';
  var token=this.token;
  var jsonData={'id':idInput};


  $.ajax({
    url:route,
    headers:{'X-CSRF-TOKEN':token},
    type:operation,
    dataType:'json',
    data:jsonData,
    success:function(response){
      console.log(response);
    },
    error:function(msj){
         //var message=msj[Object.keys(msj)];
         console.log(msj[0].responseText);
         var resObjt=JSON.parse(msj[0].responseText);
         var message=resObjt[Object.keys(resObjt)];      
         console.log(message);

       }


     });

}

