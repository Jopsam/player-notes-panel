<?php

namespace App\Providers;

use App\Repositories\Contracts\PlayerNoteRepositoryInterface;
use App\Repositories\Contracts\PlayerRepositoryInterface;
use App\Repositories\PlayerNoteRepository;
use App\Repositories\PlayerRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * 
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            PlayerRepositoryInterface::class,
            PlayerRepository::class
        );
    
        $this->app->bind(
            PlayerNoteRepositoryInterface::class,
            PlayerNoteRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     * 
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
