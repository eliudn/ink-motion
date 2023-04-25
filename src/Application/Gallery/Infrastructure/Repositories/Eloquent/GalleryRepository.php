<?php

namespace Src\Application\Gallery\Infrastructure\Repositories\Eloquent;

use Src\Application\Gallery\Domain\Contract\GalleryRepositoryContract;
use Src\Application\Gallery\Domain\GalleryEntity;
use Src\Application\Gallery\Domain\ValueObjects\GalleryIdValueObject;
use Src\Application\Gallery\Domain\ValueObjects\GalleryStoreValueObject;
use Src\Application\Gallery\Domain\ValueObjects\GalleryUpdateValueObject;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;
use Src\Application\Gallery\Infrastructure\Repositories\Eloquent\Gallery as Model;

class GalleryRepository implements GalleryRepositoryContract
{

    private $model;
    public function __construct()
    {
        $this->model = new Model();
    }

    /**
     * @return GalleryEntity
     */
    public function index(): GalleryEntity
    {
        $gallery = $this->model->all();
        if($gallery->isEmpty() ){
            return new GalleryEntity(null, "GALLERY_NOT_FOUND");
        }
        return new GalleryEntity($this->responseData($gallery)->toArray());
    }

    /**
     * @param UserIdValueObject $userIdValueObject
     * @return GalleryEntity
     */
    public function show(UserIdValueObject $userIdValueObject): GalleryEntity
    {
        $gallery = $this->model->where('user_id', $userIdValueObject->value())
           // ->with('galleryFile.file')
            ->get();

        if($gallery->isEmpty() ){
            return new GalleryEntity(null, "GALLERY_NOT_FOUND");
        }
       // dd($gallery->toArray());
        return new GalleryEntity($this->responseData($gallery)->toArray());
    }

    public function showGalleryId(GalleryIdValueObject $galleryIdValueObject): GalleryEntity
    {
        $gallery = $this->model->find($galleryIdValueObject->value());

        if($gallery->isEmpty() ){
            return new GalleryEntity(null, "GALLERY_NOT_FOUND");
        }

        return new GalleryEntity($gallery->toArray());
    }

    /**
     * @param GalleryStoreValueObject $galleryStoreValueObject
     * @param UserIdValueObject $userIdValueObject
     * @return GalleryEntity
     */
    public function store(GalleryStoreValueObject $galleryStoreValueObject, UserIdValueObject $userIdValueObject): GalleryEntity
    {
        $gallery = $this->model->create([
            'name'=>$galleryStoreValueObject->value()["name"],
            'description'=>$galleryStoreValueObject->value()["description"],
            'user_id'=>$userIdValueObject->value()
        ]);

        return new GalleryEntity($gallery->toArray());
    }

    /**
     * @param GalleryUpdateValueObject $galleryUpdateValueObject
     * @param UserIdValueObject $userIdValueObject
     * @return GalleryEntity
     */
    public function update(
        GalleryUpdateValueObject $galleryUpdateValueObject,
        UserIdValueObject $userIdValueObject,
        GalleryIdValueObject $galleryIdValueObject
    ): GalleryEntity
    {
        $gallery = $this->model
            ->where('user_id', $userIdValueObject->value())
            ->Where('id', $galleryIdValueObject->value())
            ->first();

        if(is_null($gallery)){
            return new GalleryEntity(null, "GALLERY_NOT_FOUND");
        }

        $gallery->update([
            'name'=>$galleryUpdateValueObject->value()["name"],
            'description'=>$galleryUpdateValueObject->value()["description"]
        ]);
        return new GalleryEntity($this->responseData($gallery)->toArray());

    }

    /**
     * @param GalleryIdValueObject $galleryIdValueObject
     * @param UserIdValueObject $userIdValueObject
     * @return GalleryEntity
     */
    public function destroy(GalleryIdValueObject $galleryIdValueObject, UserIdValueObject $userIdValueObject): GalleryEntity
    {
        $gallery = $this->model
            ->where('user_id', $userIdValueObject->value())
            ->Where('id', $galleryIdValueObject->value())
            ->first();
        if(is_null($gallery)){
            return new GalleryEntity(null, "GALLERY_NOT_FOUND");
        }
        return new GalleryEntity($gallery->id);

    }

    private function responseData( $data): \Illuminate\Support\Collection
    {

        $collect = collect($data);
        return $collect->map(fn($value,$key )=>[
            "id"            => $value->id,
            "name"          => $value->name,
            "description"   => $value->description,
            "user_id"       => $value->user_id,
            "created_at"    => $value->created_at,
            "updated_at"    => $value->updated_at,
            "files"         => $value->galleryFile
                                     ->map(fn($value)
                            => $value->file
            )
        ]);
    }
}
