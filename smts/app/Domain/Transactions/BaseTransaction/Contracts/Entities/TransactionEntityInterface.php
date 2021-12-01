<?php
namespace App\Domain\Transactions\BaseTransaction\Contracts\Entities;

use App\Infrastructure\Support\Contracts\Entities\CRUDInterface;

interface TransactionEntityInterface extends CRUDInterface
{
    /**
     * @param $id
     * @return array
     */
    public function getData($id) : array;

    /**
     * @param $user_id
     * @return array
     */
    public function getUserLastTransaction($user_id) : array;
}
