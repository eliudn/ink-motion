<?php

namespace Src\Management\FileHandling\Infrastructure\Repositories\Storage;

use Illuminate\Support\Facades\Storage;
use Src\Management\FileHandling\Domain\Contracts\FileRepositoryContract;
use Src\Management\FileHandling\Domain\File;
use Src\Management\FileHandling\Domain\ValueObjects\FileStoreValueObject;
use Src\Management\FileHandling\Domain\ValueObjects\PathValueObject;

final class FileRepository implements FileRepositoryContract
{

    /**
     * @param FileStoreValueObject $fileStoreValueObject
     * @return File
     */
    public function store(FileStoreValueObject $fileStoreValueObject): File
    {
       // dd($fileStoreValueObject->value()["file"]);
        $url =  $fileStoreValueObject->value()["file"]
            ->store($fileStoreValueObject->value()["path"],'public');

        return new File($this->toArray($fileStoreValueObject->value(),$url));
    }

    /**
     * @param array $file
     * @param string $url
     * @return array
     */
    private function toArray(array $file, string $url): array
    {
        return [
            "filename" => str_replace($file["path"]."/","",$url)  ,
            "file_type" =>$file["file"]->extension(),
            "file_size"=>$file["file"]->getSize(),
            "path"=>$file["path"],
            "url"=>$url,
            "user_id"=>$file["userId"]

        ];
    }

    public function show(PathValueObject $pathValueObject): File
    {

        return  new File(asset(Storage::disk("public")
            ->url($pathValueObject->value()["path"]."/".$pathValueObject->value()["filename"])));
    }
}
