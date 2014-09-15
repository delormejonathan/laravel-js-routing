<?php namespace DelormeJonathan\LaravelJsRouting\Commands;

use DelormeJonathan\LaravelJsRouting\JSRouter;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class Dump extends Command {

	protected $name = 'laravel-js-routing:dump';

	protected $description = 'Export routes to a static js file for production. (default path : public/js/routes.js)';

	public function fire()
	{
		$content = JSRouter::generate();
		File::put($this->argument('path') ? $this->argument('path') : Config::get('LaravelJsRouting::dump_path'), $content);
	}

	protected function getArguments()
	{
		return array(
			array('path', InputArgument::OPTIONAL, 'Path', 'public/js/routes.js'),
		);
	}
}