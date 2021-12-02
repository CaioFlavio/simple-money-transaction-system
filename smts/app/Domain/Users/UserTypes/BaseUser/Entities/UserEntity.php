<?php
namespace App\Domain\Users\UserTypes\BaseUser\Entities;

use App\Domain\Users\UserTypes\BaseUser\Contracts\Entities\UserEntityInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserEntity extends Model implements UserEntityInterface, JWTSubject
{
    use SoftDeletes;

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
     * @param string $email
     * @param string $password
     * @return mixed
     */
    public function ormFindUserByCredential(string $email, string $password)
    {
        return $this->where('email', $email)
            ->where('password', hash('sha256', $password));
    }

    public function loadEntityFromCredentials(string $email, string $password): array
    {
        try {
            $user = $this->ormFindUserByCredential($email, $password);
            return ($user->count() == 1) ? $user->first()->toArray() : [];
        } catch (\Exception $e) {
            return [];
        }
    }

    public function loadEntityAuth(string $email, string $password) : array
    {
        $user = $this->ormFindUserByCredential($email, $password);
        return ['token' => JWTAuth::fromUser($user->first())];
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

    /**
     * @inheritDoc
     */
    public function getJWTIdentifier()
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
