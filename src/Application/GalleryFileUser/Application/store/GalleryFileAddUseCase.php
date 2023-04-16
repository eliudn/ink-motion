<?php

namespace Src\Application\GalleryFileUser\Application\store;

use Src\Application\FileUser\Application\Store\FileUserSavingUseCase;
use Src\Application\Gallery\Application\Get\GalleryShowUseCase;
use Src\Application\Gallery\Domain\ValueObjects\GalleryIdValueObject;
use Src\Application\GalleryFileUser\Domain\Contracts\GalleryFileRepositoryContract;
use Src\Application\GalleryFileUser\Domain\GalleryFileEntity;
use Src\Application\GalleryFileUser\Domain\ValueObjects\GalleryFileValueObject;

class GalleryFileAddUseCase
{
    public function __construct(
        private readonly GalleryFileRepositoryContract $galleryFileRepositoryContract,
        private  readonly FileUserSavingUseCase $fileUserSavingUseCase,
        private readonly GalleryShowUseCase $galleryShowUseCase
    )
    {
    }

    /**
     * @param string $userId
     * @param int $galleryId
     * @param array $request
     * @return GalleryFileEntity
     */
    public function __invoke(string $userId, int $galleryId, array $request): GalleryFileEntity
    {
        $this->galleryShowUseCase->__invoke($galleryId)->entity();
        $file = $this->fileUserSavingUseCase->__invoke($request, $userId);

        return $this->galleryFileRepositoryContract->add(
            new GalleryIdValueObject($galleryId),
            new GalleryFileValueObject(["fileUserIds"=>$this->fileUserIds($file)])
        );
    }

    /**
     * @param array $files
     * @return array
     */
    private function fileUserIds(array $files):array
    {
        return array_map(fn($value)=>
            $value["id"]
        ,$files);
    }
}
