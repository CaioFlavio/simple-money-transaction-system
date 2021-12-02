<?php
namespace App\Domain\Users\UserFunds\UserWallet\Repositories;

use App\Domain\Users\UserFunds\UserWallet\Contracts\Entities\UserWalletEntityInterface;
use App\Domain\Users\UserFunds\UserWallet\Contracts\Repositories\UserWalletRepositoryInterface;

class UserWalletRepository implements UserWalletRepositoryInterface
{
    private $userWalletEntity;

    public function __construct(
        UserWalletEntityInterface $userWalletEntity
    ){
        $this->userWalletEntity = $userWalletEntity;
    }

    /**
     * @inheritDoc
     */
    public function getData($id): array
    {
        // TODO: Implement getData() method.
    }

    /**
     * @inheritDoc
     */
    public function canSendFunds($id): array
    {
        // TODO: Implement canSendFunds() method.
    }

    /**
     * @inheritDoc
     */
    public function canReceiveFunds($id): array
    {
        // TODO: Implement canReceiveFunds() method.
    }

    /**
     * @inheritDoc
     */
    public function hasFunds($user_id, $value = 0): bool
    {
        return ($this->getBalance($user_id) - $value) >= 0;
    }

    /**
     * @inheritDoc
     */
    public function addFunds($user_id, float $value, $description = null): bool
    {
        // TODO: Add external authorization
        $newEntry = $this->userWalletEntity->createEntity([
            'user_id'       => $user_id,
            'value'         => $value,
            'description'   => $description,
            'type'          => $this->userWalletEntity->getInWalletCode(),
            'is_authorized' => 1
        ]);
        return (!empty($newEntry)) ? true : false;
    }

    /**
     * @inheritDoc
     */
    public function withdrawFunds($user_id, float $value, $description = null): bool
    {
        // TODO: Add external authorization
        $newEntry = $this->userWalletEntity->createEntity([
            'user_id'       => $user_id,
            'value'         => $value,
            'type'          => $this->userWalletEntity->getOutWalletCode(),
            'description'   => $description,
            'is_authorized' => 1
        ]);
        return (!empty($newEntry)) ? true : false;
    }

    /**
     * @inheritDoc
     */
    public function getBalance($user_id): float
    {
        return ($this->getInBalance($user_id) - $this->getOutBalance($user_id));
    }

    public function getInBalance($user_id) : float
    {
        return $this->userWalletEntity->getInSumByUser($user_id);
    }

    public function getOutBalance($user_id) : float
    {
        return $this->userWalletEntity->getOutSumByUser($user_id);
    }

    /**
     * @inheritDoc
     */
    public function addFromRequest($user_id, array $data): bool
    {
        $description = $data['description'] ?? null;
        return $this->addFunds($user_id, $data['value'], $description);
    }

    public function withdrawFromRequest($user_id, array $data) : bool
    {
        if ($this->hasFunds($user_id, $data['value'])) {
            $description = $data['description'] ?? null;
            return $this->withdrawFunds($user_id, $data['value'], $description);
        }
        return (!empty($newEntry)) ? true : false;
    }
}
