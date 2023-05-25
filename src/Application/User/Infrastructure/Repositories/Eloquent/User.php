<?php

namespace Src\Application\User\Infrastructure\Repositories\Eloquent;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Src\Application\Role\Infrastructure\Repositories\Eloquent\Role;

class User extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table ='users';
    protected $fillable = [
        'int_id',
        'nick_name',
        'email',
        'password',
        'state_id',
    ];

    protected $hidden = [
        'password',
        'int_id'
    ];

    /**
     * @return UserFactory
     */
    protected static function newFactory(): UserFactory
    {
        return  UserFactory::new();
    }

    /**
     * @return BelongsToMany
     */
    public function roles():BelongsToMany
    {
        return  $this->belongsToMany(Role::class,
            'users_roles',
            'user_id',
            'role_id'
        );
    }
}
