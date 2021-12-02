<?php
namespace App\Domain\Users\UserTypes\BaseUser\Contracts\Entities;

use App\Infrastructure\Support\Contracts\Entities\CRUDInterface;

interface UserEntityInterface extends CRUDInterface
{
    /**
     * @param $id
     * @return array
     */
    public function getData($id) : array;

    /**
     * @param $user_id
     * @param string $account_type_code
     * @return array
     */
    public function setUserAccountType($user_id, string $account_type_code) : array;
}
