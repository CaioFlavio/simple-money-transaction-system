<?php
namespace App\Domain\Users\UserTypes\BaseUser\Repositories;

use App\Domain\Users\UserTypes\BaseUser\Contracts\Entities\UserEntityInterface;
use App\Domain\Users\UserTypes\BaseUser\Contracts\Entities\UserTypeEntityInterface;
use App\Domain\Users\UserTypes\BaseUser\Contracts\Repositories\UserAccountRepositoryInterface;

class BaseUserAccountRepository implements UserAccountRepositoryInterface
{

    private $userEntity;

    public function __construct(
        UserEntityInterface $userEntity,
        UserTypeEntityInterface $userTypeEntity
    ){
        $this->userEntity = $userEntity;
        $this->userTypeEntity = $userTypeEntity;
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
        $user = $this->userEntity->loadEntity($user_id);
        return $this->userTypeEntity->loadEntity($user['user_type_id']);
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

    public function findUserIdByEmail(string $email)
    {
        return $this->userEntity->findIdBy('email', $email);
    }
}
