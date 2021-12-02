<?php
namespace App\Domain\Users\UserTypes\BusinessUser\Repositories;

use App\Domain\Users\UserTypes\BaseUser\Contracts\Entities\UserEntityInterface;
use App\Domain\Users\UserTypes\BusinessUser\Contracts\Repositories\BusinessUserRepositoryInterface;

class BusinessUserRepository implements BusinessUserRepositoryInterface
{
    const BUSINESS_USER_CODE = 1;

    private $userEntity;

    public function __construct(
        UserEntityInterface $userEntity
    ) {
        $this->userEntity = $userEntity;
    }

    /**
     * @inheritDoc
     */
    public function loadEntity($id): array
    {
        return $this->userEntity->loadEntity($id);
    }

    /**
     * @inheritDoc
     */
    public function createEntity(array $data): array
    {
        return $this->userEntity->createEntity(
            array_merge(
                ['user_type_id' => $this->getTypeCode()],
                $data
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function updateEntity($id, array $data): array
    {
        return $this->userEntity->updateEntity($id, $data);
    }

    /**
     * @inheritDoc
     */
    public function deleteEntity($id): bool
    {
        return $this->userEntity->deleteEntity($id);
    }

    public function getTypeCode(): string
    {
        return static::BUSINESS_USER_CODE;
    }
}
