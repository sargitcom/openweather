<?php

namespace Foo\Bar;

use Foo\Bar\Interfaces\WindConverterInterface;

class Windms implements WindConverterInterface
{
	private $wind;
	
	public function __construct(float $wind)
	{
		$this->wind = $wind;
	}
	
	public function getWind() : string
	{
		return $this->wind;
	}
}
