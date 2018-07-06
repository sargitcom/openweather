<!DOCTYPE html>
<html>
	<head>
		<script>
			var $baseUrl = '<?= 'http://localhost' . $_SERVER['REQUEST_URI']; ?>';
		</script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDjkAK-xuj-H-wlf7Eoy_3UfhchcCGBY6Y&sensor=false&libraries=geometry,places"></script>
		<script type="text/javascript" charset="UTF-8" src="http://maps.google.com/maps-api-v3/api/js/33/2/intl/pl_ALL/geocoder.js"></script>
		<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
		<script src="frontendOW.js"></script>
	</head>
	<body>
		<form method="post" action="">
			<input id="address" class="address" placeholder="Podaj adres do wyszukania" type="text" value=""  />
			<select class="temperatureUnit" name="temperature">
				<option value="cel">Temperatura w celsjuszach</option>
				<option value="far">Temperatura w farenheitach</option>
			</select>
			<select class="windUnit" name="wind">
				<option value="ms">Wiatr w m/s</option>
				<option value="kmh">Wiatr w km/h</option>
			</select>
		</form>
		<div class="result">
			<div class="temperature">Temperatura: <span class="value">-</span></div>
			<div class="wind">Prędkość wiatru <span class="value">-</span></div>
		</div>
	</body>
</html>