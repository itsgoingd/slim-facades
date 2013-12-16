<?php
namespace SlimFacades;

class Route extends Facade
{
	protected static function getFacadeAccessor() { return 'router'; }

    public static function map()
    {
    	return call_user_func_array(array(self::$slim, 'map'), func_get_args());
    }

    public static function get()
    {
    	return call_user_func_array(array(self::$slim, 'get'), func_get_args());
    }

    public static function post()
    {
    	return call_user_func_array(array(self::$slim, 'post'), func_get_args());
    }

    public static function put()
    {
    	return call_user_func_array(array(self::$slim, 'put'), func_get_args());
    }

    public static function patch()
    {
    	return call_user_func_array(array(self::$slim, 'patch'), func_get_args());
    }

    public static function delete()
    {
    	return call_user_func_array(array(self::$slim, 'delete'), func_get_args());
    }

    public static function options()
    {
    	return call_user_func_array(array(self::$slim, 'options'), func_get_args());
    }

    public static function group()
    {
    	return call_user_func_array(array(self::$slim, 'group'), func_get_args());
    }

    public static function any()
    {
    	return call_user_func_array(array(self::$slim, 'any'), func_get_args());
    }
}
