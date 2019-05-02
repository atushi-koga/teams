<?php

namespace App\Providers;

use App;
use Illuminate\Support\ServiceProvider;
use packages\Domain\Application\Auth\Register\RegisterUserFormInteractor;
use packages\Domain\Application\Auth\RegisterUserInteractor;
use packages\Infrustructure\Prefecture\PrefectureRepository;
use packages\UseCase\Auth\Register\RegisterUserFormUseCaseInterface;
use packages\UseCase\Auth\Register\RegisterUserUseCaseInterface;
use PrefectureRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (App::environment() === 'testing') {
            $this->registerForMock();
        } else {
            $this->registerForProduction();
        }
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

    /**
     *
     * @return void
     */
    public function registerForProduction()
    {
        // UseCase
        $this->app->bind(RegisterUserUseCaseInterface::class, RegisterUserInteractor::class);
        $this->app->bind(RegisterUserFormUseCaseInterface::class, RegisterUserFormInteractor::class);

        // Repository
        $this->app->bind(PrefectureRepositoryInterface::class, PrefectureRepository::class);
    }
    /**
     *
     * @return void
     */
    public function registerForMock()
    {
        // UseCase
    }
}
