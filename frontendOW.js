var frontendOW = {
	init : function() {
		this.bind();
	},
	
	bind : function() {
		
		jQuery('.forecastWeather').on('click', function(event){
			event.preventDefault();
			
			
		});
		
		this.initGeocoder();
	},
	
	initGeocoder : function() {
		geocoder = new google.maps.Geocoder();
		
		
		var input = document.getElementById("address");
		
		var autocompleteObject = new google.maps.places.Autocomplete(input);
		
        autocompleteObject.addListener('place_changed', function() {
          //infowindow.close();
          //marker.setVisible(false);
          var place = autocompleteObject.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }
			
			$lat = place.geometry.location.lat();
			$lng = place.geometry.location.lng();
			
			jQuery.ajax({
				method: "POST",
				url: $baseUrl,
				data: { 
					lon: $lng, 
					lat: $lat,
					tempUnit : jQuery('.temperatureUnit').val(),
					windUnit : jQuery('.windUnit').val(),
				},
				dataType: 'json'
			}).done(function( response ) {
				
				var temperatureText = response.temperature;
				var windText = response.wind;
				
				switch (jQuery('.temperatureUnit').val()) {
					case 'far':
						temperatureText += " oF";
						break;
					
					default:
						temperatureText += " oC";
				}
				
				switch (jQuery('.windUnit').val()) {
					case 'ms':
						windText += " m/s";
						break;
					
					default:
						windText += " km/s";
				}
				
				jQuery('.temperature .value').text(temperatureText);
				jQuery('.wind .value').text(windText);
				
			});
		});
	}
}

jQuery(document).ready(function(){
	frontendOW.init();
});