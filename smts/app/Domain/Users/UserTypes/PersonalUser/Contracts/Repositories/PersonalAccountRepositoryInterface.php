<?php
namespace App\Domain\Users\UserTypes\PersonalUser\Contracts\Repositories;

use App\Domain\Users\BaseUser\Contracts\Repositories\UserAccountRepositoryInterface;

interface PersonalAccountRepositoryInterface extends UserAccountRepositoryInterface
{
    /**
     * @return float
     */
    public function getWithdrawLimit() : float;
}
