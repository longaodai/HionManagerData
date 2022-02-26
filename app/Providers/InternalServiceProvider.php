<?php

namespace App\Providers;

use App\Services\Category\CategoryService;
use App\Services\Category\CategoryServiceInterface;
use App\Services\Data\DataService;
use App\Services\Data\DataServiceInterface;
use App\Services\DataImport\DataImportService;
use App\Services\DataImport\DataImportServiceInterface;
use App\Services\Keyword\KeywordService;
use App\Services\Keyword\KeywordServiceInterface;
use App\Services\LogImport\LogImportService;
use App\Services\LogImport\LogImportServiceInterface;
use Illuminate\Support\ServiceProvider;

class InternalServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(DataServiceInterface::class, DataService::class);
        $this->app->singleton(DataImportServiceInterface::class, DataImportService::class);
        $this->app->singleton(KeywordServiceInterface::class, KeywordService::class);
        $this->app->singleton(CategoryServiceInterface::class, CategoryService::class);
        $this->app->singleton(LogImportServiceInterface::class, LogImportService::class);
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
            DataServiceInterface::class,
            DataImportServiceInterface::class,
            KeywordServiceInterface::class,
            CategoryServiceInterface::class,
            LogImportServiceInterface::class,
        ];
    }
}
