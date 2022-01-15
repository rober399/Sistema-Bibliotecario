$(document).ready(function(){
	$('#date1').datepicker();
	$('#date2').datepicker();
	load();
	
	$('#reset').on('click', function(){
		location.reload();
	});
});

function load(){
	

			$date1 = $('#date1').val();
			$date2 = $('#date2').val();
			$('#load_data').empty();
			$loader = $('<tr ><td colspan = "12"><center>Cargando...</center></td></tr>');
			$loader.appendTo('#load_data');
			setTimeout(function(){
				$loader.remove();
				$.ajax({
					url: 'ajax_data.php',
					type: 'POST',
					data: {
						date1: $date1,
						date2: $date2
					},
					success: function(res){
						$('#load_data').html(res);
					}
				});
			}, 1000);
			
	
	
}
$.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '< Ant',
 nextText: ' - Sig >',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['D','L','M','M','J','V','S'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);

/*
 function reportPDF(){
 	var date1 = $("date1").val();
 	var date2 = $("date2").val();
 	window.open('../ioan-report-date.php?date1='+date1+'&date2='+date2+);

 }
*/
