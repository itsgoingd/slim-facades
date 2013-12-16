<?php
namespace SlimFacades;

class Request extends Facade
{
	protected static function getFacadeAccessor() { return 'request'; }
}
