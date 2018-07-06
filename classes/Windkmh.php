<?php

namespace Foo\Bar;

use Foo\Bar\Interfaces\WindConverterInterface;

class Windkmh implements WindConverterInterface
{
	private $wind;
	
	public function __construct(float $wind)
	{
		$this->wind = $wind;
	}
	
	public function getWind() : string
	{
		return $this->wind * 3.6;
	}
}
