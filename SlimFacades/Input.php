<?php
namespace SlimFacades;

class Input extends Facade
{
	protected static function getFacadeAccessor() { return 'request'; }

	public static function file($name)
	{
		return isset($_FILES[$name]) && $_FILES[$name]['size'] ? $_FILES[$name] : null;
	}
}
