
function mostrar(value,id){
var	m_id='#'+id
var c=$(m_id).children();

for(i=0;i<c.length-2;i++){console.log(c[i].textContent)}

 $('#myModal').modal('show');
 $('#edit-id').val(id);
 $("#m_num_of").val(c[0].textContent);
 $("#m_asunto").val(c[1].textContent);
 $("#m_destinatario").val(c[2].textContent);
 $("#m_remitente").val(c[3].textContent);


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
	data:{'numero_oficio':in_num_of,'asunto':in_asunto,'destinatario':in_destinatario,'remitente':in_remitente},//name corresponde al nombre de la columna
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
var route="/oficio/"+btn.value;
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
var routeDel="/load2";

	tablaDatos.empty();


	$.get(routeDel,function(res){
		console.log(JSON.stringify(res));
		$(res).each(function(key,value){
			tablaDatos.append('<tr id="'+value.id+'"><td><button class="btn btn-primary" value="'+value.id+'" OnClick="editar2('+value.id+')">test</button></td><td>'+value.numero_oficio+'</td><td>'+value.destinatario+'</td><td>'+value.remitente+'</td><td>'+value.asunto+'</td><td><button class="btn btn-primary"  onclick="mostrar(\''+value.name+'\',\''+value.id+'\')">Editar</button></td><td><button class="btn btn-danger" value="'+value.id+'" OnClick="eliminar(this)">Eliminar</button></td></tr>');
		});

	});
}




$(document).ready(function(){

console.log("hola mundo");
cargarTabla();







$("#guardar").click(function(){

var operation="POST";
var route="/oficio";

var in_num_of=$("#num_of").val();
var in_asunto=$("#asunto").val();
var in_destinatario=$("#destinatario").val();
var in_remitente=$("#remitente").val();

var token=$("#token").val();


$.ajax({
	url:route,
	headers:{'X-CSRF-TOKEN':token},
	type:operation,
	dataType:'json',
	data:{'numero_oficio':in_num_of,'asunto':in_asunto,'destinatario':in_destinatario,'remitente':in_remitente},//name corresponde al nombre de la columna
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