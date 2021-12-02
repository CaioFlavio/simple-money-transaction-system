<?php
namespace App\Domain\Users\UserTypes\BaseUser\Entities;

use App\Domain\Users\UserTypes\BaseUser\Contracts\Entities\UserEntityInterface;
use Illuminate\Database\Eloquent\Model;

class UserEntity extends Model implements UserEntityInterface
{

    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_type_id', 'name', 'email', 'document_number', 'password'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = hash('sha256', $value);
    }

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
