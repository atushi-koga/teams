<?php

namespace App\Providers;

use App;
use Blade;
use Illuminate\Support\ServiceProvider;
use packages\Domain\Application\Auth\Register\RegisterUserFormInteractor;
use packages\Domain\Application\Auth\Register\RegisterUserInteractor;
use packages\Domain\Application\MyPage\DetailRecruitmentInteractor;
use packages\Domain\Application\MyPage\JoinRecruitmentInteractor;
use packages\Domain\Application\MyPage\NewRecruitmentFormInteractor;
use packages\Domain\Application\MyPage\NewRecruitmentInteractor;
use packages\Domain\Application\MyPage\ShowTopInteractor;
use packages\Domain\Application\MyPage\UserProfileInteractor;
use packages\Domain\Domain\Recruitment\RecruitmentRepositoryInterface;
use packages\Domain\Domain\User\UserRepositoryInterface;
use packages\Infrustructure\Recruitment\RecruitmentRepository;
use packages\Infrustructure\User\UserRepository;
use packages\UseCase\Auth\Register\RegisterUserFormUseCaseInterface;
use packages\UseCase\Auth\Register\RegisterUserUseCaseInterface;
use packages\UseCase\MyPage\Recruitment\DetailRecruitmentUseCaseInterface;
use packages\UseCase\MyPage\Recruitment\JoinRecruitmentUseCaseInterface;
use packages\UseCase\MyPage\Recruitment\NewRecruitmentFormUseCaseInterface;
use packages\UseCase\MyPage\Recruitment\NewRecruitmentUseCaseInterface;
use packages\UseCase\MyPage\Top\ShowTopUseCaseInterface;
use packages\UseCase\MyPage\User\UserProfileUseCaseInterface;

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
        Blade::directive('error', function ($expression) {
            return "<?php echo \$errors->first($expression, '<span class=\"error\">:message</span><br>'); ?>";
        });
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
        $this->app->bind(DetailRecruitmentUseCaseInterface::class, DetailRecruitmentInteractor::class);
        $this->app->bind(JoinRecruitmentUseCaseInterface::class, JoinRecruitmentInteractor::class);
        $this->app->bind(UserProfileUseCaseInterface::class, UserProfileInteractor::class);

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
