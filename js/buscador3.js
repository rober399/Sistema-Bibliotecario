
$(buscar_datos("", 1));

function buscar_datos(consulta, p){
	$.ajax({
		url: 'buscar-reader.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta, pag: p},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}

var pagination = 1;
var searchval = "";

$(document).on('keyup','#caja_busqueda', function(){
	pagination = 1;
	getData($(this).val());
});

function nextPag(){
	 pagination++;	
	getData();
}

function changePag(val){
	pagination = val;	
   getData();
}

function prevPag(){
 	pagination--;	
	getData();
}


function getData(value){
	searchval = value;
	if (searchval != "") {
		buscar_datos(searchval, pagination);
	}else{
		buscar_datos("",pagination);
	}
}

