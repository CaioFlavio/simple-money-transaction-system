<?php
namespace App\Domain\Users\UserTypes\BusinessUser\Contracts\Repositories;

use App\Domain\Users\BaseUser\Contracts\Repositories\UserAccountRepositoryInterface;

interface BusinessAccountRepositoryInterface extends UserAccountRepositoryInterface
{
    /**
     * @return float
     */
    public function getWithdrawLimit() : float;
}
