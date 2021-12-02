<?php

namespace App\Providers;

use App\Domain\Users\UserFunds\UserWallet\Contracts\Entities\UserWalletEntityInterface;
use App\Domain\Users\UserFunds\UserWallet\Contracts\Repositories\UserWalletRepositoryInterface;
use App\Domain\Users\UserFunds\UserWallet\Repositories\UserWalletRepository;
use App\Domain\Users\UserFunds\UserWallet\Entities\UserWalletEntity;
use App\Domain\Users\UserTypes\BaseUser\Contracts\Entities\UserTypeEntityInterface;
use App\Domain\Users\UserTypes\BaseUser\Contracts\Repositories\UserAccountRepositoryInterface;
use App\Domain\Users\UserTypes\BaseUser\Entities\UserEntity;
use App\Domain\Users\UserTypes\BaseUser\Contracts\Entities\UserEntityInterface;
use App\Domain\Users\UserTypes\BaseUser\Entities\UserTypeEntity;
use App\Domain\Users\UserTypes\BaseUser\Repositories\BaseUserAccountRepository;
use App\Domain\Users\UserTypes\BusinessUser\Contracts\Repositories\BusinessUserRepositoryInterface;
use App\Domain\Users\UserTypes\BusinessUser\Repositories\BusinessUserRepository;
use App\Domain\Users\UserTypes\BusinessUser\Contracts\Repositories\BusinessAccountRepositoryInterface;
use App\Domain\Users\UserTypes\BusinessUser\Repositories\BusinessAccountRepository;
use App\Domain\Users\UserTypes\PersonalUser\Contracts\Repositories\PersonalUserRepositoryInterface;
use App\Domain\Users\UserTypes\PersonalUser\Repositories\PersonalAccountRepository;
use App\Domain\Users\UserTypes\PersonalUser\Contracts\Repositories\PersonalAccountRepositoryInterface;
use App\Domain\Users\UserTypes\PersonalUser\Repositories\PersonalUserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserEntityInterface::class, UserEntity::class);
        $this->app->bind(UserTypeEntityInterface::class, UserTypeEntity::class);
        $this->app->bind(UserAccountRepositoryInterface::class, BaseUserAccountRepository::class);
        $this->app->bind(PersonalAccountRepositoryInterface::class, PersonalAccountRepository::class);
        $this->app->bind(BusinessAccountRepositoryInterface::class, BusinessAccountRepository::class);
        $this->app->bind(PersonalUserRepositoryInterface::class, PersonalUserRepository::class);
        $this->app->bind(BusinessUserRepositoryInterface::class, BusinessUserRepository::class);
        $this->app->bind(BusinessUserRepositoryInterface::class, BusinessUserRepository::class);

        $this->app->bind(UserWalletEntityInterface::class, UserWalletEntity::class);
        $this->app->bind(UserWalletRepositoryInterface::class, UserWalletRepository::class);

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
}
