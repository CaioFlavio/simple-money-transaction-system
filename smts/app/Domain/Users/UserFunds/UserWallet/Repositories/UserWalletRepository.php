<?php
namespace App\Domain\Users\UserFunds\UserWallet\Repositories;

use App\Domain\Transactions\ExternalAuthorization\Contracts\ExternalAuthorizationApiServiceInterface;
use App\Domain\Users\UserFunds\UserWallet\Contracts\Entities\UserWalletEntityInterface;
use App\Domain\Users\UserFunds\UserWallet\Contracts\Repositories\UserWalletRepositoryInterface;
use App\Domain\Users\UserTypes\BaseUser\Contracts\Repositories\UserAccountRepositoryInterface;
use Illuminate\Support\Facades\DB;

class UserWalletRepository implements UserWalletRepositoryInterface
{
    private $userWalletEntity;

    private $userAccountRepository;

    private $externalAuthorizationApiService;

    public function __construct(
        UserWalletEntityInterface $userWalletEntity,
        UserAccountRepositoryInterface $userAccountRepository,
        ExternalAuthorizationApiServiceInterface $externalAuthorizationApiService
    ){
        $this->userWalletEntity = $userWalletEntity;
        $this->userAccountRepository = $userAccountRepository;
        $this->externalAuthorizationApiService = $externalAuthorizationApiService;
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
        if ($this->externalAuthorizationApiService->isAuthorized()) {
            $newEntry = $this->userWalletEntity->createEntity([
                'user_id'       => $user_id,
                'value'         => $value,
                'description'   => $description,
                'type'          => $this->userWalletEntity->getInWalletCode(),
                'is_authorized' => 1
            ]);
            return (!empty($newEntry)) ? true : false;
        }
        return false;
    }

    /**
     * @inheritDoc
     */
    public function withdrawFunds($user_id, float $value, $description = null): bool
    {
        if ($this->externalAuthorizationApiService->isAuthorized()) {
            $newEntry = $this->userWalletEntity->createEntity([
                'user_id' => $user_id,
                'value' => $value,
                'type' => $this->userWalletEntity->getOutWalletCode(),
                'description' => $description,
                'is_authorized' => 1
            ]);
            return (!empty($newEntry)) ? true : false;
        }
        return false;
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

    public function transferByEmail($sender_user_id, array $data) : bool
    {
        $accountType = $this->userAccountRepository->getAccountType($sender_user_id);
        if ($accountType['can_send_money']
            && $this->hasFunds($sender_user_id, $data['value'])
            && $this->externalAuthorizationApiService->isAuthorized()
        ) {
            try {
                DB::beginTransaction();
                $receiver_user_id = $this->userAccountRepository->findUserIdByEmail($data['email']);
                $withdrawAction = $this->withdrawFunds($sender_user_id, $data['value'], "Transference to: {$data['email']}");
                $addAction = $this->addFunds($receiver_user_id, $data['value'], "Transference from: {$data['email']}");
                if($withdrawAction && $addAction) {
                    DB::commit();
                    return true;
                }
            } catch (\Exception $e) {
                DB::rollBack();
                return false;
            }
            DB::rollBack();
        }
        return false;
    }
}
