<?php

namespace Src\Application\FileUser\Infrastructure\Repositories\Eloquent;

use Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;


class FileUser extends Model
{
    use HasUuids;
    protected $table = 'files_users';

    protected $fillable = [
        'filename',
        'file_type',
        'file_size',
        'path',
        'file_saving_service_id',
        'resolution',
        'user_id'
    ];


}
