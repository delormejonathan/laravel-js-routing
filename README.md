# Javascript Routing for Laravel 4

This package allows you to access Laravel's routing from your Javascript.

The main feature is the possibility to use it easily in local and production environment. 

In local environment, the JS routes are re-written each request. In production environment, the JS routes are dumped in a static file for better performance.

## Installation

Add this line to your **composer.json** and run `composer update`

```
"delormejonathan/laravel-js-routing": "~1.0"
```

Add the provider to **app.php**

```
'DelormeJonathan\LaravelJsRouting\LaravelJsRoutingServiceProvider',
```

Add the facade to **app.php**

```
'JSRouter' => 'DelormeJonathan\LaravelJsRouting\Facades\JSRouter',
```

Publish assets to public folder

```
php artisan asset:publish delormejonathan/laravel-js-routing
```

## Usage

Call the JSRouter plugin in your application template :

```html
<script type="text/javascript" src="{{ asset('packages/delormejonathan/laravel-js-routing/jsrouter.js') }}"></script>

```

And import routes file dynamically in local and statically in production :

```html
@if (App::environment() == 'production')
	<script type="text/javascript" src="{{ asset('js/routes.js') }}"></script>
@else
	<script type="text/javascript">{{ JSRouter::generate() }}</script>
@endif
```

Now, you can use it in JavaScript :

```javascript
JSRouter.action('UsersController@edit', { id : 5 });
JSRouter.route('mycustomroutename');
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

## Contribution & improvements

The plugin is pretty basic currently. He needs a better parsing engine to manage optional parameters.

## Issues or features

Feel free to open an issue if you encounter a problem or contact me directly.

## Credits

* [FOSJsRoutingBundle](https://github.com/FriendsOfSymfony/FOSJsRoutingBundle) for the inspiration.

## License

This project is licensed under the MIT license.
