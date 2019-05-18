function get_wx_stick_data_ajax(wx_id) {
	var fn = [];
	fn.push({id: wx_id});
	$.ajax({
		type: 'POST',
		url: 'inc/get-location-data.php',
		dataType: 'json',
		data: {
			wx_id: wx_id,
		},
		success: function(data) {
			$('.loading-modal').removeClass('hidden');
			$('.wx-data__wrapper .wx-stick__data').remove();
			$('.wx-sticks__wrapper').addClass('hidden');
			var sponsor = data['sponsor'];
			var logo = 'img/'+data['sponsor_id']+'.jpg';
			var address = data['sponsor_address'];
			var reportingTime = data['time'];
			var reportingDate = data['dateabbr'];
			var sData = data['reporting-station'];
			var city = sData['city'];
			var dewpoint = sData['dewpoint'];
			var heatIndex = sData['heat-index'];
			var highToday = sData['high-today'];
			var lowToday = sData['low-today'];
			var relativeHumidity = sData['relative-humidity'];
			var temp = sData['temperature'];
			var windChill = sData['wind-chill'];
			var windDirection = sData['wind-direction'];
			var windSpeed = sData['wind-speed'];
			var windGusts = sData['wind-gusts'];
			var pressure = sData['pressure'];
			
			$('.wx-data__wrapper').append(
				'<div class="wx-stick__data">'+
				'<div class="sponsor-logo"><img src="'+logo+'" alt="'+sponsor+' logo" /><strong>Sponsored By: </strong>'+sponsor+ '<br>'+address+'</div>'+
					'<div class="reporting-time"><strong>Reporting Time: </strong>'+reportingTime+' | <strong>Reporting Date: </strong>'+reportingDate+'</div>'+
					'<div><strong>Temperature:</strong> '
						+temp+'&deg;'+
					'</div>'+
					'<div><strong>Dewpoint:</strong> '
						+dewpoint+
					'</div>'+
					'<div><strong>Relative Humidity:</strong> '
						+relativeHumidity+
					'</div>'+
					'<div><strong>Wind Chill:</strong> '
						+windChill+'&deg;'+
					'</div>'+
					'<div><strong>Heat Index:</strong> '
						+heatIndex+'&deg;'+
					'</div>'+
					'<div><strong>Wind Direction:</strong> '
						+windDirection+
					'</div>'+
					'<div><strong>Wind Gusts:</strong> '
						+windGusts+' mph'+
					'</div>'+
					'<div><strong>Pressure:</strong> '
						+pressure+
					'</div>'+
					'<div><strong>High Today:</strong> '
						+highToday+'&deg;'+
					'</div>'+
					'<div><strong>Low today:</strong> '
						+lowToday+'&deg;'+
					'</div>'+
				'</div>'
				);
			setTimeout(function() {
				$('.loading-modal').addClass('hidden');
			}, 3000);
			$('.wx-data__wrapper').removeClass('hidden');
			
		}
	});	
}

$('.wx-stick__btn span.btn').on('click', function(){
	var wx_id = $(this).attr('data-id');
	console.log(wx_id);

	get_wx_stick_data_ajax(wx_id);
});

$('select.wx-nav').on('change', function() {
	var wx_id = $(this).val();
	get_wx_stick_data_ajax(wx_id);
});

$('.wx-data__wrapper span.close-btn').on('click', function() {
	$('.wx-data__wrapper').addClass('hidden');
	$('.wx-stick__data').slideUp(200).remove();
	$('.wx-sticks__wrapper').removeClass('hidden');
});