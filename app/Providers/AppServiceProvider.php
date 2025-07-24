<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\Product;
use App\Models\User;
use App\Models\Partner;
use App\Models\Setting;
use App\Models\CategoryProduct;
use App\Models\CategoryService;
use App\Models\CategoryFormation;
use App\Models\BlogTag;
use App\Observers\AdminActivityObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useTailwind();

        Product::observe(AdminActivityObserver::class);
        User::observe(AdminActivityObserver::class);
        Partner::observe(AdminActivityObserver::class);
        Setting::observe(AdminActivityObserver::class);
        CategoryProduct::observe(AdminActivityObserver::class);
        CategoryService::observe(AdminActivityObserver::class);
        CategoryFormation::observe(AdminActivityObserver::class);
        BlogTag::observe(AdminActivityObserver::class);
    }
}
