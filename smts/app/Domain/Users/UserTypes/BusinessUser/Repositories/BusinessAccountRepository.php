<?php

namespace App\Domain\Users\UserTypes\BusinessUser\Repositories;

use App\Domain\Users\UserTypes\BusinessUser\Contracts\Repositories\BusinessAccountRepositoryInterface;

class BusinessAccountRepository implements BusinessAccountRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getWithdrawLimit(): float
    {
        // TODO: Implement getWithdrawLimit() method.
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
}
