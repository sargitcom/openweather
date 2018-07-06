<?php

namespace Foo\Bar;

use Foo\Bar\Interfaces\TemperatureConverterInterface;

class Tempfar implements TemperatureConverterInterface
{
	private $temperature;
	
	public function __construct(float $temperature)
	{
		$this->temperature = $temperature;
	}
	
	public function getTemperature() : string
	{
		return $this->temperature;
	}
}
