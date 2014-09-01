<?php namespace DelormeJonathan\LaravelJsRouting\Facades;

use Illuminate\Support\Facades\Facade;

class JSRouter extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'jsrouter'; }

}