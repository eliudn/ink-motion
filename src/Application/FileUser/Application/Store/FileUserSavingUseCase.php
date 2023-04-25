<?php

namespace Src\Application\FileUser\Application\Store;


use Src\Management\FileHandling\Application\Get\FileShowUseCase;
use Src\Management\FileHandling\Application\Store\FileStoreUseCase;

final class FileUserSavingUseCase
{
    public function __construct(
        private readonly FileUserStoreUseCase $fileUserStoreUseCase,
        private readonly FileStoreUseCase $fileStoreUseCase,
        private readonly FileShowUseCase $fileShowUseCase
    )
    {
    }

    public function __invoke(array $request, string $userId, ?string $path): array
    {
        $response =[];

        foreach ($request as $index => $value){

            $file = $this->fileStoreUseCase->__invoke($this->toArray($value,$userId,$path));
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

    private function toArray(mixed $request, string $userId, ?string $path):array
    {
        $valor = $path ?  '/'.$path: '';
        return [
            "file"=>$request,
            "userId"=>$userId,
            "path"=>"Users/".$userId.$valor

        ];
    }
}
