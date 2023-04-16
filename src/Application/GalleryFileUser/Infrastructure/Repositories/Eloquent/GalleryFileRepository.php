<?php

namespace Src\Application\GalleryFileUser\Infrastructure\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Collection;
use Src\Application\Gallery\Domain\ValueObjects\GalleryIdValueObject;
use Src\Application\GalleryFileUser\Domain\GalleryFileEntity;
use Src\Application\GalleryFileUser\Domain\ValueObjects\GalleryFileValueObject;
use Src\Application\GalleryFileUser\Infrastructure\Resources\GalleryFileUserResource;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;
use Src\Application\GalleryFileUser\Infrastructure\Repositories\Eloquent\GalleryFileUser;
use Src\Application\Gallery\Infrastructure\Repositories\Eloquent\Gallery;

class GalleryFileRepository implements \Src\Application\GalleryFileUser\Domain\Contracts\GalleryFileRepositoryContract
{
    private  $model;
    private $gallery;
    public function __construct(

    )
    {
    $this->model = new GalleryFileUser();
    $this->gallery = new Gallery();
    }

    /**
     * @inheritDoc
     */
    public function add(GalleryIdValueObject $galleryIdValueObject, GalleryFileValueObject $galleryFileAddValueObject): GalleryFileEntity
    {
       $file = $this->model->addFile($galleryIdValueObject->value(),$galleryFileAddValueObject->value()["fileUserIds"]);
       //dd(new GalleryFileUserResource($file->toArray()));
        return new GalleryFileEntity($this->data($file)->toArray());
    }

    private function data(GalleryFileUser $file): \Illuminate\Support\Collection
    {
        $coll = collect($file);
        return  $coll->map(fn($item, $key)=>[
            "galleryFileUserId"=> $item->id,
            "gallery"=>$item->gallery,
            "file"=>$item->file,
            "updated_at"=> $item->updated_at,
            "created_at"=> $item->created_at,
        ]);


    }

    public function index(UserIdValueObject $userIdValueObject): GalleryFileEntity
    {
        return new GalleryFileEntity();
    }

    public function show(UserIdValueObject $userIdValueObject, GalleryIdValueObject $galleryIdValueObject): GalleryFileEntity
    {
        return new GalleryFileEntity();
    }

    public function move(UserIdValueObject $userIdValueObject, GalleryIdValueObject $galleryIdValueObject, GalleryFileValueObject $galleryFileMoveValueObject): GalleryFileEntity
    {
        return new GalleryFileEntity();
    }



    public function delete(UserIdValueObject $userIdValueObject, GalleryFileValueObject $galleryFileDeleteValueObject): GalleryFileEntity
    {
        return new GalleryFileEntity();
    }
}
