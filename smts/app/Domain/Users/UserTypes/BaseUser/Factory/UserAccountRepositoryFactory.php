<?php
namespace App\Domain\Users\UserTypes\BaseUser\Factory;

use App\Domain\Users\UserTypes\BaseUser\Contracts\Repositories\UserAccountRepositoryInterface;
use App\Domain\Users\UserTypes\BusinessUser\Contracts\Repositories\BusinessAccountRepositoryInterface;
use App\Domain\Users\UserTypes\PersonalUser\Contracts\Repositories\PersonalAccountRepositoryInterface;

class UserAccountRepositoryFactory
{

    /**
     * @var PersonalAccountRepositoryInterface
     */
    private $personalUser;

    /**
     * @var BusinessAccountRepositoryInterface
     */
    private $businessUser;

    /**
     * UserRepositoryFactory constructor.
     * @param PersonalAccountRepositoryInterface $personalUser
     * @param BusinessAccountRepositoryInterface $businessUser
     */
    public function __construct(
        PersonalAccountRepositoryInterface $personalUser,
        BusinessAccountRepositoryInterface $businessUser
    ) {
        $this->personalUser = $personalUser;
        $this->businessUser = $businessUser;
    }

    /**
     * @param string $userType
     * @return BusinessAccountRepositoryInterface|PersonalAccountRepositoryInterface|bool
     */
    public function make(string $userType)
    {
        switch (strtolower($userType)) :
            case 'personal' :
                return $this->personalUser;
            break;
            case 'business':
                return $this->businessUser;
            break;
        endswitch;
        return false;
    }
}
