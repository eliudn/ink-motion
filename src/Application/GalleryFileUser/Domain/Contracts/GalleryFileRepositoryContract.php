<?php

namespace Src\Application\GalleryFileUser\Domain\Contracts;

use Src\Application\Gallery\Domain\ValueObjects\GalleryIdValueObject;
use Src\Application\GalleryFileUser\Domain\GalleryFileEntity;
use Src\Application\GalleryFileUser\Domain\ValueObjects\GalleryFileValueObject;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;

interface GalleryFileRepositoryContract
{
    /**
     * @param GalleryIdValueObject $galleryIdValueObject
     * @param GalleryFileValueObject $galleryFileAddValueObject
     * @return GalleryFileEntity
     */
    public function add(GalleryIdValueObject $galleryIdValueObject, GalleryFileValueObject $galleryFileAddValueObject): GalleryFileEntity;

    /**
     * @param UserIdValueObject $userIdValueObject
     * @return GalleryFileEntity
     */
    public function index(UserIdValueObject $userIdValueObject):GalleryFileEntity;


    /**
     * @param UserIdValueObject $userIdValueObject
     * @param GalleryIdValueObject $galleryIdValueObject
     * @return GalleryFileEntity
     */
    public function show(UserIdValueObject $userIdValueObject, GalleryIdValueObject $galleryIdValueObject):GalleryFileEntity;

    /**
     * @param UserIdValueObject $userIdValueObject
     * @param GalleryIdValueObject $galleryIdValueObject
     * @param GalleryFileValueObject $galleryFileMoveValueObject
     * @return GalleryFileEntity
     */
    public function move(UserIdValueObject $userIdValueObject,
                         GalleryIdValueObject $galleryIdValueObject,
                         GalleryFileValueObject $galleryFileMoveValueObject
    ):GalleryFileEntity;

    /**
     * @param UserIdValueObject $userIdValueObject
     * @param GalleryFileValueObject $galleryFileDeleteValueObject
     * @return GalleryFileEntity
     */
    public function delete(UserIdValueObject $userIdValueObject,GalleryFileValueObject $galleryFileDeleteValueObject):GalleryFileEntity;
}
