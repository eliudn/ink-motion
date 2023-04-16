<?php

namespace Src\Application\GalleryFileUser\Infrastructure\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Src\Application\FileUser\Infrastructure\Repositories\Eloquent\FileUser;
use Src\Application\Gallery\Infrastructure\Repositories\Eloquent\Gallery;

class GalleryFileUser extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'gallery_file_user';

    protected $fillable =['gallery_id', 'file_user_id'];

    /**
     * @return BelongsTo
     */
    public function gallery(): BelongsTo
    {
        return $this->belongsTo(Gallery::class, 'gallery_id');
    }

    /**
     * @return BelongsTo
     */
    public function file(): BelongsTo
    {
        return $this->belongsTo(FileUser::class, 'file_user_id');
    }

    /**
     * @param int $galleryId
     * @param array $request
     * @return GalleryFileUser
     */
    public function addFile(int $galleryId, array $request): GalleryFileUser
    {

        $array = new GalleryFileUser();
        foreach ($request as $index => $file){
            $array[$index] = $this->create([
                    'gallery_id'=>$galleryId,
                    'file_user_id'=>$file
                ] );
        }

        return $array;

    }
}
