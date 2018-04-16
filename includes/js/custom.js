$('input[name="daterange"]').daterangepicker({

	"minDate": "01/01/2017"
	}, 
	function(start, end, label) {
		console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
	}
);

$('body').on('click','.applyBtn',function(e){
	$("#range").submit();
});