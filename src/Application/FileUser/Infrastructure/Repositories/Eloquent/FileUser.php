<?php

namespace Src\Application\FileUser\Infrastructure\Repositories\Eloquent;

use Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Src\Management\FileHandling\Application\Get\FileShowUseCase;


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
        'user_id',
    ];
    protected $appends=['url'];

    public function getUrlAttribute(): string
    {
        return asset(Storage::disk("public")
            ->url($this->attributes["path"]."/".$this->attributes["filename"]));
    }

}
