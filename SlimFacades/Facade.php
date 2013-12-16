<?php
namespace SlimFacades;

use Illuminate\Support\Facades\Facade as IlluminateFacade;

class Facade extends IlluminateFacade
{
	protected static $slim;

	public static function registerAliases($aliases = null)
	{
		if (!$aliases) {
			$aliases = array(
				'App'      => 'SlimFacades\App',
				'Config'   => 'SlimFacades\Config',
				'Input'    => 'SlimFacades\Input',
				'Log'      => 'SlimFacades\Log',
				'Request'  => 'SlimFacades\Request',
				'Response' => 'SlimFacades\Response',
				'Route'    => 'SlimFacades\Route',
				'View'     => 'SlimFacades\View',
			);
		}

		foreach ($aliases as $alias => $class) {
			class_alias($class, $alias);
		}
	}

	public static function setFacadeApplication($app)
	{
		parent::$app = $app->container;
		self::$app   = $app->container;
		
		self::$slim = $app;
	}
}
