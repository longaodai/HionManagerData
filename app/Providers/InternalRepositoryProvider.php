<?php

namespace App\Providers;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Data\DataRepository;
use App\Repositories\Data\DataRepositoryInterface;
use App\Repositories\DataImport\DataImportRepository;
use App\Repositories\DataImport\DataImportRepositoryInterface;
use App\Repositories\Keyword\KeywordRepository;
use App\Repositories\Keyword\KeywordRepositoryInterface;
use App\Repositories\LogImport\LogImportRepository;
use App\Repositories\LogImport\LogImportRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class InternalRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(DataRepositoryInterface::class, DataRepository::class);
        $this->app->singleton(DataImportRepositoryInterface::class, DataImportRepository::class);
        $this->app->singleton(KeywordRepositoryInterface::class, KeywordRepository::class);
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->singleton(LogImportRepositoryInterface::class, LogImportRepository::class);
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

    public function provides()
    {
        return [
            DataRepositoryInterface::class,
            DataImportRepositoryInterface::class,
            KeywordRepositoryInterface::class,
            CategoryRepositoryInterface::class,
            LogImportRepositoryInterface::class,
        ];
    }
}
