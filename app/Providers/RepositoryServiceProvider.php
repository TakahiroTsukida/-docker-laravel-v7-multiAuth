<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bindings of models
     *
     * @var array
     */
    public $models = [
        'Admin',
        'User',
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Abstract repositories bind concrete one.
        foreach ($this->models as $model) {
            $this->app->bind(
                "App\Repositories\Contracts\\{$model}Contract",
                "App\Repositories\Eloquents\Eloquent{$model}Repository"
            );
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
