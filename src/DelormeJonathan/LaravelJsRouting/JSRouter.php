<?php namespace DelormeJonathan\LaravelJsRouting;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class JSRouter
{
	public static function generate(){
		$router = Route::getRoutes();
		$routesByAction = array();
		$routesByName = array();

		foreach ($router as $route) {
			if ($route->getActionName() != 'Closure') {
				$routesByAction[$route->getActionName()]['route'] = str_replace('?}', '}', url($route->uri()));
				$routesByAction[$route->getActionName()]['parameters'] = $route->parameterNames();
			}
			if ($route->getName() != '') {
				$routesByName[$route->getName()]['route'] = str_replace('?}', '}', url($route->uri()));
				$routesByName[$route->getName()]['parameters'] = $route->parameterNames();
			}
		}


		return View::make('LaravelJsRouting::script', array('routesByAction' => $routesByAction, 'routesByName' => $routesByName));
	}
}
