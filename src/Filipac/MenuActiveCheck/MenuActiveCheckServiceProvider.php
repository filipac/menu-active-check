<?php namespace Filipac\MenuActiveCheck;

use Illuminate\Support\ServiceProvider, Blade;

class MenuActiveCheckServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

  public function boot() {
    Blade::extend(function($view, $compiler)
    {
        return preg_replace('/(\s*){@checkActive(\s*)([a-zA-Z]*?)\|(.*)}/i', '$1<?php $__check = explode(\'\\\\\\\',Active::getController()); if(\'$3\' == end($__check)) echo \'$4\'; ?>', $view);
    });
  }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
