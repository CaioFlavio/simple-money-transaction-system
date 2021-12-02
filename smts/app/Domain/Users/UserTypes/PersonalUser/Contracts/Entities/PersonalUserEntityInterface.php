<?php
namespace App\Domain\Users\UserTypes\PersonalUser\Contracts\Entities;

use App\Domain\Users\UserTypes\BaseUser\Contracts\Entities\UserEntityInterface;

interface PersonalUserEntityInterface extends UserEntityInterface
{
    /**
     * @return string
     */
    public function getTypeCode() : string;
}
