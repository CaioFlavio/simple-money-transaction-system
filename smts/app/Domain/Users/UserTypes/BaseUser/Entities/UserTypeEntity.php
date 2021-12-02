<?php
namespace App\Domain\Users\UserTypes\BaseUser\Entities;

use App\Domain\Users\UserTypes\BaseUser\Contracts\Entities\UserTypeEntityInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTypeEntity extends Model implements UserTypeEntityInterface
{
    use SoftDeletes;

    protected $table = 'user_types';

    protected $primaryKey = 'id';


    /**
     * @inheritDoc
     */
    public function loadEntity($id): array
    {
        try {
            return $this->find($id)->toArray();
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * @inheritDoc
     */
    public function createEntity(array $data): array
    {
        try {
            $newUser = $this->create($data);
            return ($newUser->save()) ? $newUser->toArray() : [];
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * @inheritDoc
     */
    public function updateEntity($id, array $data): array
    {
        try {
            $user = $this->find($id);
            $user->fill($data);
            return $user->save() ? $user->toArray() : [];
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * @inheritDoc
     */
    public function deleteEntity($id): bool
    {
        return $this->destroy($id);
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
    public function setUserAccountType($user_id, string $account_type_code): array
    {
        // TODO: Implement setUserAccountType() method.
    }
}
