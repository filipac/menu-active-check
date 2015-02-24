<?php namespace Filipac\MenuActiveCheck;

use Blade;
use Illuminate\Support\ServiceProvider;

class MenuActiveCheckServiceProvider extends ServiceProvider
{

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
        /*
         * Register the service provider for the dependency.
         */
        $this->app->register('HieuLe\Active\ActiveServiceProvider');
        /*
         * Create aliases for the dependency.
         */
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Active', 'HieuLe\Active\Facades\Active');
    }


    public function boot()
    {
        Blade::extend(function ($view, $compiler) {
            return preg_replace('/(\s*){@checkActive(\s*)([a-zA-Z]*?)\|(.*)}/i',
                '$1<?php $__check = explode(\'\\\\\\\',\HieuLe\Active\Facades\Active::getController()); if(\'$3\' == end($__check)) echo \'$4\'; ?>',
                $view);
        });
        Blade::extend(function ($view, $compiler) {
            return preg_replace('/(\s*){@checkActiveAction(\s*)([a-zA-Z]*?)\|(.*)}/i',
                '$1<?php $__check = explode(\'\\\\\\\',\HieuLe\Active\Facades\Active::getMethod()); if(\'$3\' == end($__check)) echo \'$4\'; ?>',
                $view);
        });
        Blade::extend(function ($view, $compiler) {
            return preg_replace('/(\s*){@checkActiveBoth(\s*)([a-zA-Z]*?)&([a-zA-Z]*?)\|(.*)}/i',
                '$1<?php $__check = explode(\'\\\\\\\',\HieuLe\Active\Facades\Active::getMethod());
                $__check2 = explode(\'\\\\\\\',\HieuLe\Active\Facades\Active::getController()); if(\'$3\' == end($__check2) AND \'$4\' == end($__check)) echo \'$5\'; ?>',
                $view);
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
