<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $adminDashboard_namespace = 'App\Http\Controllers\AdminDashboard';
    protected $admin_namespace = 'App\Http\Controllers\AdminDashboard\Admin';
    protected $shop_namespace = 'App\Http\Controllers\Shop';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';
    public const SHOP = '/shop';
    public const DASHBOARD = '/adminDashboard';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminDashboardRoutes();
        
        $this->mapShopRoutes();
        
        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "admin" routes for the application.
     *
     * @return void
     */
    protected function mapAdminDashboardRoutes()
    {
        Route::middleware('web')
            ->namespace($this->adminDashboard_namespace)
            ->group(base_path('routes/adminDashboard/web.php'));
    }

     /**
     * Define the "shop" routes for the application.
     *
     * @return void
     */
    protected function mapShopRoutes()
    {
        Route::middleware('web')
            ->namespace($this->shop_namespace)
            ->group(base_path('routes/shop/web.php'));
    }


}
