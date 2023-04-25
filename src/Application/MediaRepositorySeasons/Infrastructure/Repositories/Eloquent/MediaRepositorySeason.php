<?php

namespace Src\Application\MediaRepositorySeasons\Infrastructure\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Src\Application\MediaRepositorySeasons\Infrastructure\Enum\Status;

class MediaRepositorySeason extends Model
{
    use HasUuids;
    protected $table ='media_repository_seasons';

    protected $fillable = [
            'order',
            'media_repository_id',
            'status',
            'file_id'
        ];
    protected $casts=[
        'status'=>Status::class
    ];
}
