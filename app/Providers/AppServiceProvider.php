<?php

namespace App\Providers;

use App;
use Illuminate\Support\ServiceProvider;
use packages\Domain\Application\Auth\Register\RegisterUserFormInteractor;
use packages\Domain\Application\Auth\Register\RegisterUserInteractor;
use packages\Domain\Application\MyPage\NewRecruitmentFormInteractor;
use packages\Domain\Application\MyPage\NewRecruitmentInteractor;
use packages\Domain\Application\MyPage\ShowTopInteractor;
use packages\Domain\Domain\Recruitment\RecruitmentRepositoryInterface;
use packages\Domain\Domain\User\UserRepositoryInterface;
use packages\Infrustructure\Recruitment\RecruitmentRepository;
use packages\Infrustructure\User\UserRepository;
use packages\UseCase\Auth\Register\RegisterUserFormUseCaseInterface;
use packages\UseCase\Auth\Register\RegisterUserUseCaseInterface;
use packages\UseCase\MyPage\Recruitment\NewRecruitmentFormUseCaseInterface;
use packages\UseCase\MyPage\Recruitment\NewRecruitmentUseCaseInterface;
use packages\UseCase\MyPage\Top\ShowTopUseCaseInterface;

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
        $this->app->bind(NewRecruitmentUseCaseInterface::class, NewRecruitmentInteractor::class);
        $this->app->bind(ShowTopUseCaseInterface::class, ShowTopInteractor::class);

        // Repository
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(RecruitmentRepositoryInterface::class, RecruitmentRepository::class);
    }

    /**
     *
     * @return void
     */
    public function registerForMock()
    {
        // UseCase
        // Repository
    }
}
