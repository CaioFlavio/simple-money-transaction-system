<?php
namespace App\Http\Controllers\Api\User;

use App\Domain\Users\UserTypes\BaseUser\Contracts\Repositories\UserAccountRepositoryInterface;
use App\Domain\Users\UserTypes\BaseUser\Factory\UserRepositoryFactory;
use App\Infrastructure\Requests\Api\User\UserAuthRequest;
use App\Infrastructure\Requests\Api\User\UserCreateRequest;
use Illuminate\Support\Facades\Log;

class UserRestController
{

    /**
     * @var UserRepositoryFactory
     */
    private $userRepositoryFactory;

    private $userAccountRepository;

    public function __construct(
        UserRepositoryFactory $userRepositoryFactory,
        UserAccountRepositoryInterface $userAccountRepository
    ){
        $this->userRepositoryFactory = $userRepositoryFactory;
        $this->userAccountRepository = $userAccountRepository;
    }

    public function create(
        UserCreateRequest $userRequest
    ) {
        try {
            $userData = $userRequest->only('name', 'email', 'account_type', 'document_number', 'password');
            $newUser = $this->userRepositoryFactory->make($userData['account_type'])->createEntity($userData);
            return response()->json($newUser, empty($newUser) ? 501 : 201);
        } catch (\Exception $e) {
            $currentMethod = __METHOD__;
            Log::error("{$currentMethod} : {$e->getMessage()}");
        }
        return response()->json([], 501);
    }

    public function read()
    {
        //todo: implement user read;
    }


    public function update()
    {
        //todo: implement user update;
    }

    public function delete()
    {
        //todo: implement user delete;
    }

    public function auth(UserAuthRequest $request)
    {
        $loginData = $request->only('email', 'password');
        $tokenData = $this->userAccountRepository->authenticate($loginData);
        return response()->json(
            $tokenData,
            (!empty($tokenData)) ? 200 : 501
        );
    }
}
