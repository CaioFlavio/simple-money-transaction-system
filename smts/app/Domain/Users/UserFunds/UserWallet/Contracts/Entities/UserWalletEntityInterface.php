<?php
namespace App\Domain\Users\UserFunds\UserWallet\Contracts\Entities;

use App\Infrastructure\Support\Contracts\Entities\CRUDInterface;

interface UserWalletEntityInterface extends CRUDInterface
{
    /**
     * @param $id
     * @return array
     */
    public function getData($id) : array;
}
