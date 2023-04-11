<?php

namespace Src\Application\UserInformation\Infrastructure\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Src\Application\User\Infrastructure\Repositories\Eloquent\User;

class UserInformation extends Model
{

    use HasUuids;

    protected $table = 'users_information';

    protected $fillable = [
                'first_name',
                'last_name',
                'birthdate',
                'email',
                'phone_number',
                'user_id',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
