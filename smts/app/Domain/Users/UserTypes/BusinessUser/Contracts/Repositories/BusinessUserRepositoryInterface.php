<?php
namespace App\Domain\Users\UserTypes\PersonalUser\Contracts\Repositories;

use App\Infrastructure\Support\Contracts\Entities\CRUDInterface;

interface PersonalUserRepositoryInterface extends CRUDInterface
{
    public function getTypeCode() : string;
}
