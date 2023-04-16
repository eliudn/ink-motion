<?php

namespace Src\Application\Gallery\Domain\Contract;

use Src\Application\Gallery\Domain\GalleryEntity;
use Src\Application\Gallery\Domain\ValueObjects\GalleryIdValueObject;
use Src\Application\Gallery\Domain\ValueObjects\GalleryStoreValueObject;
use Src\Application\Gallery\Domain\ValueObjects\GalleryUpdateValueObject;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;

interface GalleryRepositoryContract
{

    /**
     * @return GalleryEntity
     */
    public function index():GalleryEntity;

    /**
     * @param UserIdValueObject $userIdValueObject
     * @return GalleryEntity
     */
    public function show(UserIdValueObject $userIdValueObject):GalleryEntity;

    /**
     * @param GalleryIdValueObject $galleryIdValueObject
     * @return GalleryEntity
     */
    public function showGalleryId(GalleryIdValueObject $galleryIdValueObject):GalleryEntity;

    /**
     * @param GalleryStoreValueObject $galleryStoreValueObject
     * @param UserIdValueObject $userIdValueObject
     * @return GalleryEntity
     */
    public function store(GalleryStoreValueObject $galleryStoreValueObject, UserIdValueObject $userIdValueObject):GalleryEntity;

    /**
     * @param GalleryUpdateValueObject $galleryUpdateValueObject
     * @param UserIdValueObject $userIdValueObject
     * @return GalleryEntity
     */
    public function update(
        GalleryUpdateValueObject $galleryUpdateValueObject,
        UserIdValueObject $userIdValueObject,
        GalleryIdValueObject $galleryIdValueObject
    ):GalleryEntity;

    /**
     * @param GalleryIdValueObject $galleryIdValueObject
     * @return GalleryEntity
     */
    public function destroy(GalleryIdValueObject $galleryIdValueObject, UserIdValueObject $userIdValueObject):GalleryEntity;

}
