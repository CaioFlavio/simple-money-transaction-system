<?php
namespace App\Domain\Users\UserFunds\UserWallet\Contracts\Repositories;

interface UserWalletRepositoryInterface
{
    /**
     * @param $id
     * @return array
     */
    public function getData($id) : array;

    /**
     * @param $id
     * @return array
     */
    public function canSendFunds($id) : array;

    /**
     * @param $id
     * @return array
     */
    public function canReceiveFunds($id) : array;

    /**
     * @param $id
     * @return bool
     */
    public function hasFunds($id) : bool;

    /**
     * @param $user_id
     * @param float $value
     * @return bool
     */
    public function addFunds($user_id, float $value) : bool;

    /**
     * @param $user_id
     * @param float $value
     * @return bool
     */
    public function withdrawFunds($user_id, float $value) : bool;

    /**
     * @param $id
     * @return float
     */
    public function getBalance($id) : float;

    /**
     * @param $user_id
     * @param array $data
     * @return bool
     */
    public function addFromRequest($user_id, array $data) : bool;
}
