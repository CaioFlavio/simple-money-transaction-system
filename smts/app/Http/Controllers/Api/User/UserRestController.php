<?php
namespace App\Http\Controllers\Api\User;

use App\Domain\Users\UserTypes\BaseUser\Contracts\Repositories\UserAccountRepositoryInterface;
use App\Domain\Users\UserTypes\BaseUser\Factory\UserRepositoryFactory;
use App\Infrastructure\Requests\Api\User\UserCreateRequest;
use Illuminate\Support\Facades\Log;

class UserRestController
{

    /**
     * @var UserRepositoryFactory
     */
    private $userRepositoryFactory;

    public function __construct(
        UserRepositoryFactory $userRepositoryFactory
    ){
        $this->userRepositoryFactory = $userRepositoryFactory;
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

    }


    public function update()
    {

    }

    public function delete()
    {

    }
}
