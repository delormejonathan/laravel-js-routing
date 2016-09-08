# Javascript Routing for Laravel 4/5

This package allows you to access Laravel's routing from your Javascript.

The main feature is the possibility to use it easily in local and production environment. 

In local environment, the JS routes are re-written each request. In production environment, the JS routes are dumped in a static file for better performance.

If you're using Laravel 4, please read this documentation : [Laravel 4 README](https://github.com/delormejonathan/laravel-js-routing/tree/5fcf8e1aac3c36c14262191452451565717738f1)

## Installation

Add this line to your **composer.json** and run `composer update`

```
"delormejonathan/laravel-js-routing": "~2.0"
```

Add the provider to **app.php** to the **providers** section

```
DelormeJonathan\LaravelJsRouting\LaravelJsRoutingServiceProvider::class,
```

Add the facade to **app.php** to the **aliases** section

```
'JSRouter' => DelormeJonathan\LaravelJsRouting\Facades\JSRouter::class,
```

Publish assets to public folder

```
php artisan vendor:publish --tag=public --force
```

## Usage

Call the JSRouter plugin in your application template :

```html
<script type="text/javascript" src="{{ asset('packages/delormejonathan/laravel-js-routing/jsrouter.js') }}"></script>

```

And import routes file dynamically in local and statically in production :

```html
@if (App::environment() == 'production')
	<script type="text/javascript" src="/js/routes.js"></script>
@else
	<script type="text/javascript">{!! JSRouter::generate() !!}</script>
@endif
```

Now, you can use it in JavaScript :

```javascript
JSRouter.action('UsersController@edit', { id : 5 }); // For routes without a name
JSRouter.route('mycustomroutename'); // For routes with a name
```

Don't forget to export routes in production. You can add a custom path right after the 'dump' word. Default path is : public/js/routes.js

```php
php artisan laravel-js-routing:dump
```

```php
php artisan laravel-js-routing:dump public/mycustompath/mycustomfile.js
```

## Configuration

You can change the default path with the configuration file. You have to publish the config file :

```html
php artisan config:publish delormejonathan/laravel-js-routing
```

Then modify it in app/config/packages.

## Common issues

**Browser console report "No routes detected"**

Make sure you have at least one route with a name or a controller in your routes.php.

**I added a route to Laravel and the JSRouter doesn't see it**

If you are in production environment, remember to export your routes with *php artisan laravel-js-routing:dump* when you change your routes.php

If you are in local environment, remember that your route needs to point to a controller. It can have a name (optional). This package doesn't work with Closure routes.

## Contribution & improvements

The plugin is pretty basic currently. He needs a better parsing engine to manage optional parameters.

## Issues or features

Feel free to open an issue if you encounter a problem or contact me directly.

## Credits

* [FOSJsRoutingBundle](https://github.com/FriendsOfSymfony/FOSJsRoutingBundle) for the inspiration.

## License

This project is licensed under the MIT license.
