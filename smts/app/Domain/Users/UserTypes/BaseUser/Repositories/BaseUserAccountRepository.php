<?php
namespace App\Domain\Users\UserTypes\BaseUser\Repositories;

use App\Domain\Users\UserTypes\BaseUser\Contracts\Entities\UserEntityInterface;
use App\Domain\Users\UserTypes\BaseUser\Contracts\Repositories\UserAccountRepositoryInterface;

class BaseUserAccountRepository implements UserAccountRepositoryInterface
{

    private $userEntity;

    public function __construct(
        UserEntityInterface $userEntity
    ){
        $this->userEntity = $userEntity;
    }

    /**
     * @inheritDoc
     */
    public function getData($user_id): array
    {
        // TODO: Implement getData() method.
    }

    /**
     * @inheritDoc
     */
    public function setAsPersonal($user_id): bool
    {
        // TODO: Implement setAsPersonal() method.
    }

    /**
     * @inheritDoc
     */
    public function setAsBusiness($user_id): bool
    {
        // TODO: Implement setAsBusiness() method.
    }

    /**
     * @inheritDoc
     */
    public function getAccountType($user_id): array
    {
        // TODO: Implement getAccountType() method.
    }

    /**
     * @inheritDoc
     */
    public function canSendFunds($user_id): bool
    {
        // TODO: Implement canSendFunds() method.
    }

    /**
     * @inheritDoc
     */
    public function canReceiveFunds($user_id): bool
    {
        // TODO: Implement canReceiveFunds() method.
    }

    public function authenticate(array $data) : array
    {
        try {
            return $this->userEntity->loadEntityAuth($data['email'], $data['password']);
        } catch (\Exception $e) {
            return [];
        }

    }
}
