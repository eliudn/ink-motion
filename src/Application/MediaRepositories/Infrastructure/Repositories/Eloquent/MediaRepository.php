<?php

namespace Src\Application\MediaRepositories\Infrastructure\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Src\Application\FileUser\Infrastructure\Repositories\Eloquent\FileUser;
use Src\Application\MediaRepositories\Infrastructure\Enum\MediaRepositoryType;
use Src\Application\MediaRepositories\Infrastructure\Enum\Status;

class MediaRepository extends \Illuminate\Database\Eloquent\Model
{
    use HasUuids;

    protected  $table = "media_repositories";

    protected $fillable = [
        'name',
        'secondary_name',
        'user_id',
        'media_repository_type',
        'status',
        'file_id',
        'detail'
    ];

    protected $casts = [
        'media_repository_type'=>MediaRepositoryType::class,
        'status'=>Status::class
    ];

    public function file(): BelongsTo
    {
        return $this->belongsTo(FileUser::class);
    }
}
