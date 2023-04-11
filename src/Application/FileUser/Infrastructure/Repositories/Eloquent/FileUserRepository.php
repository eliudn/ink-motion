<?php

namespace Src\Application\FileUser\Infrastructure\Repositories\Eloquent;

use Src\Application\FileUser\Domain\FileUserEntity;
use Src\Application\FileUser\Domain\ValueObjects\FileUserIdValueObject;
use Src\Application\FileUser\Domain\ValueObjects\FileUserStoreValueObject;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;
use Src\Application\FileUser\Infrastructure\Repositories\Eloquent\FileUser as Model;
use Src\Management\FileHandling\Application\Get\FileShowUseCase;

class FileUserRepository implements \Src\Application\FileUser\Domain\Contracts\FileUserRepositoryContract
{
    private $model;
    public function __construct(
        private FileShowUseCase $fileShowUseCase
    )
    {
        $this->model = new Model;
    }

    /**
     * @param FileUserStoreValueObject $fileUserStoreValueObject
     * @return FileUserEntity
     */
    public function store(FileUserStoreValueObject $fileUserStoreValueObject): FileUserEntity
    {
        $file = $this->model->create([
            'filename'=>$fileUserStoreValueObject->value()["filename"],
            'file_type'=>$fileUserStoreValueObject->value()["file_type"],
            'file_size'=>$fileUserStoreValueObject->value()["file_size"],
            'path'=>$fileUserStoreValueObject->value()["path"],
            'file_saving_service_id'=>'1',
            'resolution'=>$fileUserStoreValueObject->value()["resolution"]?? null,
            'user_id'=>$fileUserStoreValueObject->value()["user_id"]
        ]);
        return new FileUserEntity($file->toArray());
    }

    public function index(UserIdValueObject $userIdValueObject): FileUserEntity
    {
        $fileUser = $this->model->
        where('user_id', $userIdValueObject->value())
            ->get();
        if(is_null($fileUser)){
            return new FileUserEntity(null, "FILE_NOT_FOUND");
        }
       return new FileUserEntity($fileUser->toArray());
    }

    /**
     * @param UserIdValueObject $userIdValueObject
     * @param FileUserIdValueObject $fileUserIdValueObject
     * @return FileUserEntity
     */
    public function show(UserIdValueObject $userIdValueObject, FileUserIdValueObject $fileUserIdValueObject): FileUserEntity
    {
        $fileUser = $this->model
            ->where("id",$fileUserIdValueObject->value())
            ->where("user_id", $userIdValueObject->value(),)
            ->first();

       if(is_null($fileUser)){
           return new FileUserEntity(null, "FILE_NOT_FOUND");
       }
        return new FileUserEntity($fileUser->toArray());
    }


    /**
     * @param UserIdValueObject $userIdValueObject
     * @param FileUserIdValueObject $fileUserIdValueObject
     * @return FileUserEntity
     */
    public function delete(UserIdValueObject $userIdValueObject, FileUserIdValueObject $fileUserIdValueObject): FileUserEntity
    {
        $fileUser = $this->model
            ->where("id",$fileUserIdValueObject->value())
            ->where("user_id", $userIdValueObject->value(),)
            ->first();

        if(is_null($fileUser)){
            return new FileUserEntity(null, "FILE_NOT_FOUND");
        }
        $fileUser->delete();
        return new FileUserEntity($fileUser->id);
    }

    /**
     * @param UserIdValueObject $userIdValueObject
     * @return FileUserEntity
     */
    public function showUserId(UserIdValueObject $userIdValueObject): FileUserEntity
    {
        $fileUser = $this->model
            ->where('user_id', $userIdValueObject->value())
            ->get();

        if(is_null($fileUser)){
            return new FileUserEntity(null, "FILE_NOT_FOUND");
        }
        return  new FileUserEntity($this->addUrl($fileUser->toArray(), true));
    }


    /**
     * @param array $response
     * @param bool|null $excep
     * @return array
     */
    private function addUrl(array $response, ?bool $excep = false):array
    {
        if ($excep){
            $array =[];
            foreach ($response as $index => $value)
            {
                $array[$index] = array_merge(
                    $value,
                    [
                        "url"=>$this->fileShowUseCase->__invoke($value)->entity()
                    ]
                );
            }
            return  $array;
        }
        return array_merge(
            $response,
            [
                "url"=>$this->fileShowUseCase->__invoke($response)
            ]
        );
    }
}
