<?php
namespace App\Domain\Users\UserTypes\BusinessUser\Contracts\Entities;

use App\Domain\Users\UserTypes\BaseUser\Contracts\Entities\UserEntityInterface;

interface BusinessUserEntityInterface extends UserEntityInterface
{
    /**
     * @return string
     */
    public function getTypeCode() : string;
}
