<?php
namespace App\Domain\Users\UserTypes\BusinessUser\Repositories;

use App\Domain\Users\UserTypes\BusinessUser\Contracts\Repositories\BusinessUserRepositoryInterface;

class BusinessUserRepository implements BusinessUserRepositoryInterface
{

    public function getTypeCode(): string
    {
        // TODO: Implement getTypeCode() method.
    }

    /**
     * @inheritDoc
     */
    public function loadEntity($id): array
    {
        // TODO: Implement loadEntity() method.
    }

    /**
     * @inheritDoc
     */
    public function createEntity(array $data): array
    {
        // TODO: Implement createEntity() method.
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
}
