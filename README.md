SlimFacades
===========

SlimFacades is a collection of facades for [Slim PHP microframework](http://github.com/codeguy/slim), providing simple "static" interface for various Slim features.

For example, turn this:

```php
$app->get('/hello-world', function()
{
	$app = Slim::getInstance();
	$app->view()->display('hello.html', array('name' => $app->request()->get('name', 'world')));
})
```

Into this:

```php
Route::get('/hello-world', function()
{
	View::display('hello.html', array('name' => Input::get('name', 'world')));
})
```

This library is based on the Laravel 4 Facade class, more info about facades in the [Laravel documentation](http://laravel.com/docs/facades).

## Installation

To install latest version simply add it to your `composer.json`:

```javascript
"itsgoingd/slim-facades": "dev-master"
```

Once the package is installed, you need to initialize the Facade class:

```php
use SlimFacades\Facade;

$app = new Slim(...);

Facade::setFacadeApplication($app);
Facade::registerAliases();
```

Now you have access to following facades:

### App
- facade for Slim instance and following additional methods:
- _make($key)_ - returns $key from Slim's DI container

```php
$request = App::make('request');
App::flash('message', 'Som Kuli, ovladam kozmicku lod.');
App::halt();
```

### Config
- facade for Slim instance and following additional methods:
- _get($key)_ - returns value of _$app->config($key)_
- _set($key, $value = null)_ - calls _$app->config($key, $value)_

```php
$debug = Config::get('debug');
Config::set('log.enable', true);
```

### Input
- facade for Slim\Http\Request instance and following additional methods:
- _file($name)_ - returns $_FILES[$name], or null if the file was not sent in the request

```php
$username = Input::get('username', 'default');
$password = Input::post('password');
$avatar = Input::file('avatar');
```

### Log
- facade for Slim\Log instance

```php
Log::info('Tomi Popovic predava miliony albumov po celom svete.');
Log::debug('Okamizte na pozorovanie.');
```

### Request
- facade for Slim\Http\Request instance

```php
if (Request::isAjax()) { ... }
$host = Request::headers('host', 'localhost');
$path = Request::getPath();
```

### Response
- facade for Slim\Http\Response instance

```php
Response::redirect('/success');
```

### Route
- facade for Slim\Router instance and following methods:
- _map, get, post, put, patch, delete, options, group, any_ - calls the methods on Slim instance

```php
Route::get('/users/new', 'UsersController:index');
Route::post('/users', 'UsersController:insert');
```

### View
- facade for Slim\View instance

```php
View::display('hello.html');
$output = View::render('world.html');
```

### Custom facades
- you can register custom facades by passing the aliases to the _Facade::registerAliases()_ function

```php
Facade::registerAliases(array(
	'App'      => 'SlimFacades\App',
	'Config'   => 'SlimFacades\Config',
	'Input'    => 'SlimFacades\Input',
//	'Log'      => 'SlimFacades\Log',
	'Log'      => 'CustomLogFacade',
	'Request'  => 'SlimFacades\Request',
	'Response' => 'SlimFacades\Response',
	'Route'    => 'SlimFacades\Route',
	'View'     => 'SlimFacades\View',
));
```

## Licence

Copyright (c) 2013 Miroslav Rigler

MIT License

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
"Software"), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
