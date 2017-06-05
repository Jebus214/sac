
function mostrar(value,id){
var	m_id='#'+id
var c=$(m_id).children();

for(i=0;i<c.length-2;i++){
	console.log(c[i].textContent)
}

 $('#myModal').modal('show');
 $('#edit-id').val(id);
 $("#m_nombre").val(c[0].textContent);
 


}
function editar2(id_input){

var id=id_input;//id del la llave primaria
var in_num_of=$("#m_num_of").val();
var in_asunto=$("#m_asunto").val();
var in_destinatario=$("#m_destinatario").val();
var in_remitente=$("#m_remitente").val();


var operation="PUT";
var route="/oficio/"+id;
var token=$("#token").val();

$.ajax({
	url:route,
	headers:{'X-CSRF-TOKEN':token},
	dataType:'json',
	data:{'remitente':'one-edit'},//name corresponde al nombre de la columna
	type:operation,
	success:function(response){
		console.log(response);
		cargarTabla();
		 $( "#msj-success" ).fadeIn();
		 $( "#msj-success" ).fadeOut( 3000 );
		}
	});
}

function editar(){

var id=$('#edit-id').val();//id del la llave primaria
var in_nombre=$("#m_nombre").val();



var operation="PUT";
var route="/direccion/"+id;
var token=$("#token").val();

$.ajax({
	url:route,
	headers:{'X-CSRF-TOKEN':token},
	dataType:'json',
	data:{'nombre':in_nombre},//name corresponde al nombre de la columna
	type:operation,
	success:function(response){
		console.log(response);
		cargarTabla();
		$("#myModal").modal('toggle');
		 $( "#msj-success" ).fadeIn();
		 $( "#msj-success" ).fadeOut( 3000 );
		}
	});
}

function eliminar(btn){
var operation="DELETE";
var route="/direccion/"+btn.value;
var dato=btn.value;//id del la llave primaria
var token=$("#token").val();

$.ajax({
	url:route,
	headers:{'X-CSRF-TOKEN':token},
	type:operation,
	success:function(response){
		console.log(response);
		cargarTabla();
		$( "#msj-success" ).fadeIn();
		 $( "#msj-success" ).fadeOut( 2000 );
		}
	});


}

function cargarTabla(){
var tablaDatos=$('#datos');
var routeDel="/cargarDireccion";

	tablaDatos.empty();


	$.get(routeDel,function(res){
		console.log(JSON.stringify(res));
		$(res).each(function(key,value){
			tablaDatos.append('<tr id="'+value.id+'"><td>'+value.nombre+'</td><td><button class="btn btn-primary"  onclick="mostrar(\''+value.nombre+'\',\''+value.id+'\')">Editar</button></td><td><button class="btn btn-danger" value="'+value.id+'" OnClick="eliminar(this)">Eliminar</button></td></tr>');
		});

	});
}




$(document).ready(function(){

console.log("hola mundo");
cargarTabla();







$("#agregar").click(function(){

var operation="POST";
var route="/direccion";

var in_nombre=$("#nombre").val();

var token=$("#token").val();


$.ajax({
	url:route,
	headers:{'X-CSRF-TOKEN':token},
	type:operation,
	dataType:'json',
	data:{'nombre':in_nombre},//name corresponde al nombre de la columna
	success:function(response){
		console.log("exitoso");
		cargarTabla();
		$( "#msj-success" ).fadeIn();
		 $( "#msj-success" ).fadeOut( 2000 );
		},
	error:function(msj){
		 //var message=msj[Object.keys(msj)];
		 console.log(msj.responseText);
		 var resObjt=JSON.parse(msj.responseText);
		 var message=resObjt[Object.keys(resObjt)];		 


		 $("#msj").html(message[0]);
		 $("#msj-error" ).fadeIn();
		 $("#msj-error" ).fadeOut( 2000 );
	}


	});

});







});