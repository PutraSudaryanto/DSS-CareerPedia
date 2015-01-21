var map;
var gmarkers = [];

function initialize() {
	var infoWindow = new google.maps.InfoWindow();
	var haightAshbury = new google.maps.LatLng(-7.778435, 110.366586);
	var mapOptions = {
		zoom: 13,
		center: haightAshbury,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	
	map = new google.maps.Map(document.getElementById("maps"), mapOptions);

	google.maps.event.addListener(map, 'click', function(){
		infoWindow.close();
	});

	var icons = new google.maps.MarkerImage("http://ecc.ft.ugm.ac.id/externals/employer/images/marker_location.png", new google.maps.Size(42, 48), new google.maps.Point(0, 0));
	 
	function createMarker(point, id, html) {		
		var marker = new google.maps.Marker({
			position: point,			
			icon: icons,
		});

		google.maps.event.addListener(marker, "click", function() {			
			infoWindow.setOptions({
				content: html,
				maxWidth: 500,
				maxHeight: 200,
			});
			map.setCenter(point);
			infoWindow.open(map,marker);
		});			
		gmarkers[id] = marker;

		return marker;
	}
	
	function getAllMarker() {
		var url = baseUrl+'/support/contact/office';
		jQuery.ajax({type: 'GET', url: url, dataType: 'json',
			success: function(v){
				for(i in v.data){				
					printMarker(v.data[i]);
				}		
			}
		});		
	}
	getAllMarker();
	
	function printMarker(v){	
		var point = new google.maps.LatLng(v.lat, v.lng);
		var html = 
		'<div class="bubble">\
			<strong>'+v.name+'</strong>\
			'+v.address+'\
		</div>';
		var marker = createMarker(point, v.id, html);
		marker.setMap(map);	
		return marker;
	}
	
}