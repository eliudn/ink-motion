<?php

namespace Src\Application\Gallery\Infrastructure\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Src\Application\GalleryFileUser\Infrastructure\Repositories\Eloquent\GalleryFileUser;

class Gallery extends Model
{
    protected $table ='galleries';

    protected  $fillable =[
        'name',
        'description',
        'user_id'
    ];

    public function GalleryFile(): BelongsToMany
    {
        return $this->belongsToMany(GalleryFileUser::class, 'gallery_file_user');
    }
}
