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

    /**
     * @return string
     */
    public function getInWalletCode() : string;

    /**
     * @return string
     */
    public function getOutWalletCode() : string;

    /**
     * @param $user_id
     * @return array
     */
    public function getAllByUser($user_id) : array;

    /**
     * @param $user_id
     * @return float
     */
    public function getInSumByUser($user_id) : float;

    /**
     * @param $user_id
     * @return float
     */
    public function getOutSumByUser($user_id) : float;
}
