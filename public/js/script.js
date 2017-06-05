
function mostrar(value,id){

$('#myModal').modal('show');
$('#edit-form').val(value);
$('#edit-id').val(id);

}



function editar(){

var id=$('#edit-id').val();//id del la llave primaria
var dato=$('#edit-form').val();

var operation="PUT";
var route="/taskAjax/"+id;
var token=$("#token").val();

$.ajax({
	url:route,
	headers:{'X-CSRF-TOKEN':token},
	dataType:'json',
	data:{name:dato},//name corresponde al nombre de la columna
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
var route="/taskAjax/"+btn.value;
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
var routeDel="/load";

	tablaDatos.empty();


	$.get(routeDel,function(res){
		$(res).each(function(key,value){
			tablaDatos.append('<tr><td>'+value.name+'</td><td><button class="btn btn-primary"  onclick="mostrar(\''+value.name+'\',\''+value.id+'\')">Editar</button></td><td><button class="btn btn-danger" value="'+value.id+'" OnClick="eliminar(this)">Eliminar</button></td></tr>');
		});

	});
}




$(document).ready(function(){

console.log("hola mundo");
cargarTabla();







$("#enviar").click(function(){

var operation="POST";
var route="/taskAjax";
var dato=$("#num_of").val();
var token=$("#token").val();

$.ajax({
	url:route,
	headers:{'X-CSRF-TOKEN':token},
	type:operation,
	dataType:'json',
	data:{'name':dato},//name corresponde al nombre de la columna
	success:function(response){
		console.log("exitoso");
		cargarTabla();
		$( "#msj-success" ).fadeIn();
		 $( "#msj-success" ).fadeOut( 2000 );
		}
	});

});







});