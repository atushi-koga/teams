<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

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
//        $this->mapApiRoutes();
        $this->mapAdminRoutes();
        $this->mapMemberRoutes();
    }

    /**
     * API
     * 現状APIは無いためコメントアウト
     *
     * @return void
     */
//    protected function mapApiRoutes()
//    {
//        Route::prefix('api')
//             ->middleware('api')
//             ->namespace($this->namespace)
//             ->group(base_path('routes/api.php'));
//    }

    /**
     * 管理者ユーザ
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::prefix('admin')
             ->middleware('web')
             ->namespace($this->namespace . '\Admin')
             ->as('Admin::')
             ->group(base_path('routes/admin.php'));
    }

    /**
     * 一般ユーザ
     *
     * @return void
     */
    protected function mapMemberRoutes()
    {
        Route::prefix('member')
             ->middleware('web')
             ->namespace($this->namespace . '\Member')
             ->as('Member::')
             ->group(base_path('routes/member.php'));
    }
}
