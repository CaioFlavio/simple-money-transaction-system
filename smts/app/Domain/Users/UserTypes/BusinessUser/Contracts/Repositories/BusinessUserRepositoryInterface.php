<?php
namespace App\Domain\Users\UserTypes\BusinessUser\Contracts\Repositories;

use App\Infrastructure\Support\Contracts\Entities\CRUDInterface;

interface BusinessUserRepositoryInterface extends CRUDInterface
{
    public function getTypeCode() : string;
}
