<?php
namespace App\Domain\Users\BaseUser\Contracts\Repositories;

interface UserAccountRepositoryInterface
{

    /**
     * @param $user_id
     * @return array
     */
    public function getData($user_id) : array;

    /**
     * @param $user_id
     * @return bool
     */
    public function setAsPersonal($user_id) : bool;

    /**
     * @param $user_id
     * @return bool
     */
    public function setAsBusiness($user_id) : bool;

    /**
     * @param $user_id
     * @return array
     */
    public function getAccountType($user_id) : array;

    /**
     * @param $user_id
     * @return bool
     */
    public function canSendFunds($user_id) : bool;

    /**
     * @param $user_id
     * @return bool
     */
    public function canReceiveFunds($user_id) : bool;
}
