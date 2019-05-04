<?php

namespace App\Providers;

use App;
use Illuminate\Support\ServiceProvider;
use packages\Domain\Application\Auth\Register\RegisterUserFormInteractor;
use packages\Domain\Application\Auth\Register\RegisterUserInteractor;
use packages\Domain\Application\MyPage\NewRecruitmentFormInteractor;
use packages\Domain\Domain\User\UserRepositoryInterface;
use packages\Infrustructure\User\UserRepository;
use packages\UseCase\Auth\Register\RegisterUserFormUseCaseInterface;
use packages\UseCase\Auth\Register\RegisterUserUseCaseInterface;
use packages\UseCase\MyPage\Recruitment\NewRecruitmentFormUseCaseInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerForProduction();
//        if (App::environment() === 'testing') {
//            $this->registerForMock();
//        } else {
//            $this->registerForProduction();
//        }
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
        $this->app->bind(NewRecruitmentFormUseCaseInterface::class, NewRecruitmentFormInteractor::class);

        // Repository
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
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
