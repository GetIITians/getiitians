<?php

namespace App\Providers;

use App\Helpers\RocketLauncher;
use Illuminate\Support\ServiceProvider;

class RocketShipServiceProvider extends ServiceProvider
{

	protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
		$this->app->bind('App\Helpers\Contracts\RocketShipContract', function(){
			return new RocketLauncher();
		});
    }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['App\Helpers\Contracts\RocketShipContract'];
	}
}
