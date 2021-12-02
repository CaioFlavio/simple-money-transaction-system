<?php
namespace App\Domain\Users\UserFunds\UserWallet\Entities;

use App\Domain\Users\UserFunds\UserWallet\Contracts\Entities\UserWalletEntityInterface;
use Illuminate\Database\Eloquent\Model;

class UserWalletEntity extends Model implements UserWalletEntityInterface
{
    const WALLET_IN_CODE = 'in';
    const WALLET_OUT_CODE = 'out';

    protected $table = 'user_wallet';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'description', 'type', 'value', 'is_authorized'
    ];

    /**
     * @inheritDoc
     */
    public function getInWalletCode(): string
    {
        return static::WALLET_IN_CODE;
    }

    /**
     * @inheritDoc
     */
    public function getOutWalletCode(): string
    {
        return static::WALLET_OUT_CODE;
    }

    /**
     * @inheritDoc
     */
    public function loadEntity($id): array
    {
        // TODO: Implement loadEntity() method.
    }

    public function getInSumByUser($user_id): float
    {
        return $this->where('user_id', $user_id)
            ->where('type', $this->getInWalletCode())->sum('value');
    }

    /**
     * @inheritDoc
     */
    public function getOutSumByUser($user_id): float
    {
        return $this->where('user_id', $user_id)
            ->where('type', $this->getOutWalletCode())->sum('value');
    }

    /**
     * @inheritDoc
     */
    public function createEntity(array $data): array
    {
        try {
            $walletEntry = $this->create($data);
            return ($walletEntry->save()) ? $walletEntry->toArray() : [];
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * @inheritDoc
     */
    public function updateEntity($id, array $data): array
    {
        // TODO: Implement updateEntity() method.
    }

    /**
     * @inheritDoc
     */
    public function deleteEntity($id): bool
    {
        // TODO: Implement deleteEntity() method.
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
    public function getAllByUser($user_id): array
    {
        // TODO: Implement getAllByUser() method.
    }
}
