<?php

namespace Aitor24\Localizer;

use Illuminate\Support\ServiceProvider;
use Unicodeveloper\Identify\IdentifyServiceProvider;

class LocalizerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        if (!$this->app->routesAreCached()) {
            require __DIR__.'/Routes/web.php';
        }

        $this->publishes([
            __DIR__.'/Config/localizer.php' => config_path('localizer.php'),
        ], 'localizer_config');

        $this->publishes([
            __DIR__.'/Config/localizer_languages.php' => config_path('localizer_languages.php'),
        ], 'localizer_languages');

        $router->aliasMiddleware('localizer', config('localizer.middleware'));
        $this->app->register(IdentifyServiceProvider::class);

        $this->loadMigrationsFrom(__DIR__.'/Migrations', 'localizer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/Config/localizer.php', 'localizer');
        $this->mergeConfigFrom(__DIR__.'/Config/localizer_languages.php', 'localizer_languages');
    }
}
