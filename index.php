<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'autoload.php');

if (!empty($_POST)) {

	$tempUnit = $_POST['tempUnit'];
	$windUnit = $_POST['windUnit'];

	$lon = $_POST['lon'];
	$lat = $_POST['lat'];

	$forecast = new Foo\Bar\OpenWeatherClass($lon, $lat, 'far', 'ms');
	$weatherForecast = $forecast->getWeatherForecast();

	$tempConverter = "Foo\Bar\Temp".$tempUnit;
	
	if (! in_array(
		'Foo\Bar\Interfaces\TemperatureConverterInterface',
		class_implements($tempConverter)
	)) {
		throw new \Exception('Class is not temperature converter');
	}
	
	$temperatureConverter = new $tempConverter((float)$weatherForecast->main->temp);
	$temperature = $temperatureConverter->getTemperature();
	
	$windConverter = "Foo\Bar\Wind".$windUnit;
	
	if (! in_array(
		'Foo\Bar\Interfaces\WindConverterInterface',
		class_implements($windConverter)
	)) {
		throw new \Exception('Class is not wind converter');
	}
	
	$windConverter = new $windConverter((float)$weatherForecast->wind->speed);
	$wind = $windConverter->getWind();
	
	echo json_encode([
		'temperature' => $temperature,
		'wind' => $wind
	]);
	die;
}

require_once('form.php');