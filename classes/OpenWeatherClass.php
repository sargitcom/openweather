<?php

namespace Foo\Bar;

class OpenWeatherClass
{
	/**
	 * @var string
	 */
	private $temperatureUnit;

	/**
	 * @var string
	 */
	private $windUnit;
	
	/**
	 * @var string
	 */
	private $address;
	
	public function __construct(
		string $lon,
		string $lat,
		string $temperatureUnit,
		string $windUnit
	) {	
		$appId = '734ac1799f673dd15d6c73d06858db4e';
		
		$this->address = 'http://api.openweathermap.org/data/2.5/weather?lat='.$lat.'&lon='.$lon.'&APPID='.$appId;
	}

	public function getWeatherForecast()
	{
		try {
			$forecast = json_decode($this->getWeatherForecastFromAPI());
	
			return $forecast;
		} catch(\Exception $e) {
		
			print_r($e);
		}
	}

	private function getWeatherForecastFromAPI()
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->address);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		$data = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		return ($httpcode>=200 && $httpcode<300) ? $data : false;		
	}
}