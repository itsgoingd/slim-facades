<?php
namespace SlimFacades;

class Config extends Facade
{
	protected static function getFacadeAccessor() { return self::$slim; }

	public static function get($key)
	{
		return self::$slim->config($key);
	}

	public static function set($key, $value)
	{
		return self::$slim->config($key, $value);
	}
}
