<?php namespace DelormeJonathan\LaravelJsRouting;

use Illuminate\Support\ServiceProvider;
use DelormeJonathan\LaravelJsRouting\Commands\Dump;

class LaravelJsRoutingServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishes([
			__DIR__.'/../../../public' => resource_path ('assets/vendor/laravel-js-routing'),
		], 'public');
		$this->loadViewsFrom(__DIR__.'/../../views', 'LaravelJsRouting');
		$this->commands('dump');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['jsrouter'] = $this->app->share(function($app)
		{
			return new JSRouter;
		});

		$this->app['dump'] = $this->app->share(function($app)
		{
			return new Dump;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('jsrouter');
	}

}
