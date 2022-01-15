<?php

namespace App\Providers;

use App\Services\PostalCodeConflictValidator;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PostalCodeConflictValidator::class, static function () {
            return new PostalCodeConflictValidator(new Collection());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
