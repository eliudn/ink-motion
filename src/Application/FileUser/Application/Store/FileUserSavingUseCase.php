<?php

namespace Src\Application\FileUser\Application\Store;


use Src\Management\FileHandling\Application\Get\FileShowUseCase;
use Src\Management\FileHandling\Application\Store\FileStoreUseCase;

class FileUserSavingUseCase
{
    public function __construct(
        private readonly FileUserStoreUseCase $fileUserStoreUseCase,
        private readonly FileStoreUseCase $fileStoreUseCase,
        private readonly FileShowUseCase $fileShowUseCase
    )
    {
    }

    public function __invoke(array $request, string $userId): array
    {
        $response =[];

        foreach ($request as $index => $value){

            $file = $this->fileStoreUseCase->__invoke($this->toArray($value,$userId));
            $fileUserStore = $this->fileUserStoreUseCase->__invoke($file->entity())->entity();
            $response[$index]= array_merge(
               $fileUserStore,
                [
                    "url" => $this->fileShowUseCase->__invoke($fileUserStore)->entity()
                ]
            );
        }
        return $response;
    }

    private function toArray(mixed $request, string $userId):array
    {
        return [
            "file"=>$request,
            "userId"=>$userId,
            "path"=>"Users/".$userId

        ];
    }
}
