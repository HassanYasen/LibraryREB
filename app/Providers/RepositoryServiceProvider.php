<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\RepositoryInterface\InterfaceRepository;
use App\Repository\AuthorsRepository;
use App\Repository\categoriesRepository;
use App\Repository\BookRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() 
{
    $this->app->bind(InterfaceRepository::class, AuthorsRepository::class);
    $this->app->bind(InterfaceRepository::class, categoriesRepository::class);
    $this->app->bind(InterfaceRepository::class, BookRepository::class);
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
