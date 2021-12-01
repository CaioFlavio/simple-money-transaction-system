<?php
namespace App\Domain\Transactions\BaseTransaction;

interface TransactionRepositoryInterface
{
    /**
     * @param $sender_user_id
     * @param $receiver_user_id
     * @param $value
     * @return bool
     */
    public function sendFunds($sender_user_id, $receiver_user_id, $value) : bool;

    /**
     * @param $user_id
     * @param $value
     * @return bool
     */
    public function withdrawFunds($user_id, $value) : bool;

    /**
     * @param $id
     * @return bool
     */
    public function isTransactionAuthorized($id) : bool;

}
