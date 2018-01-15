<?php
namespace Ajthinking\LaravelFME;
use Illuminate\Support\ServiceProvider;
class FMEServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        require __DIR__ . '/routes/web.php';
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}