<?php
namespace App\Http\Controllers\Api\User;


use App\Domain\Users\UserFunds\UserWallet\Contracts\Repositories\UserWalletRepositoryInterface;
use App\Infrastructure\Requests\Api\UserWallet\AddFundsRequest;
use App\Infrastructure\Requests\Api\UserWallet\WithdrawFundsRequest;

class UserWalletRestController
{
    private $userWalletRepository;

    public function __construct(
        UserWalletRepositoryInterface $userWalletRepository
    ){
        $this->userWalletRepository = $userWalletRepository;
    }

    public function add(
        AddFundsRequest $request,
        $id
    ) {
        $walletRequest = $request->only('value', 'description');
        $walletResponse = $this->userWalletRepository->addFromRequest($id, $walletRequest);
        return response()->json([], ($walletResponse) ? 201 : 401);
    }

    public function withdraw(
        WithdrawFundsRequest $request,
        $id
    ){
        $walletRequest = $request->only('value', 'description');
        $walletResponse = $this->userWalletRepository->withdrawFromRequest($id, $walletRequest);
        return response()->json([], ($walletResponse) ? 201 : 401);
    }

    public function getFunds()
    {

    }
}
