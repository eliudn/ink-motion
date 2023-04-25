<?php

namespace Src\Application\MediaRepositories\Infrastructure\Repositories\Eloquent;

use Src\Application\FileUser\Domain\ValueObjects\FileUserIdValueObject;
use Src\Application\MediaRepositories\Domain\Contracts\MediaRepositoryRepositoryContract;
use Src\Application\MediaRepositories\Domain\MediaRepositoryEntity;
use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryIdValueObject;
use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryStatusValueObject;
use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryValueObject;
use Src\Application\MediaRepositories\Infrastructure\Enum\Status;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;
use Src\Application\MediaRepositories\Infrastructure\Repositories\Eloquent\MediaRepository as Model;

final class MediaRepositoryRepository implements MediaRepositoryRepositoryContract
{
    private  $model;
    public function __construct( )
    {
        $this->model = new Model;
    }

    /**
     * @inheritDoc
     */
    public function index(UserIdValueObject $userIdValueObject): MediaRepositoryEntity
    {
        $repository = $this->model
            ->where('user_id', $userIdValueObject->value())
            ->get();
        if(is_null($repository) )
        {
            return new MediaRepositoryEntity(null, 'REPOSITORY_NOT_FOUND');
        }
        return  new MediaRepositoryEntity($repository->map(fn($value)=>$this->handle($value))->toArray());
    }

    /**
     * @inheritDoc
     */
    public function show(UserIdValueObject $userIdValueObject, RepositoryIdValueObject $idValueObject): MediaRepositoryEntity
    {
        $repository = $this->model
            ->where('id', $idValueObject->value() )
            ->where('user_id', $userIdValueObject->value())
            ->first();
        if(is_null($repository) )
        {
            return new MediaRepositoryEntity(null, 'REPOSITORY_NOT_FOUND');
        }
        return  new MediaRepositoryEntity($repository);
    }

    /**
     * @param UserIdValueObject $userIdValueObject
     * @param RepositoryIdValueObject $idValueObject
     * @param RepositoryValueObject $repositoryValueObject
     * @inheritDoc
     */
    public function update(
        UserIdValueObject $userIdValueObject,
        RepositoryIdValueObject $idValueObject,
        RepositoryValueObject $repositoryValueObject
    ): MediaRepositoryEntity
    {
        $repository = $this->model
            ->where('id', $idValueObject->value() )
            ->where('user_id', $userIdValueObject->value())
            ->first();


        if(is_null($repository) )
        {
            return new MediaRepositoryEntity(null, 'REPOSITORY_NOT_FOUND');
        }

        $repository->update([
            'name'=>$repositoryValueObject->value()["name"],
            'secondary_name'=>$repositoryValueObject->value()["secondaryName"],
            'detail'=>$repositoryValueObject->value()["detail"],
            //'file_id'=>$repositoryValueObject->value()["fileId"],
            'user_id'=>$userIdValueObject->value()
        ]);
        return  new MediaRepositoryEntity($this->handle($repository));

    }

    /**
     * @inheritDoc
     */
    public function delete(UserIdValueObject $userIdValueObject, RepositoryIdValueObject $idValueObject): MediaRepositoryEntity
    {
        return  new MediaRepositoryEntity();
    }

    /**
     * @inheritDoc
     */
    public function store(UserIdValueObject $userIdValueObject, RepositoryValueObject $repositoryValueObject): MediaRepositoryEntity
    {
        $repository =$this->model->create([
            'name'=>$repositoryValueObject->value()["name"],
            'secondary_name'=>$repositoryValueObject->value()["secondaryName"],
            'detail'=>$repositoryValueObject->value()["detail"],
            'media_repository_type'=>$repositoryValueObject->value()['mediaRepositoryType'],
            'file_id'=>$repositoryValueObject->value()["fileId"],
            'user_id'=>$userIdValueObject->value()
        ]);
        return new MediaRepositoryEntity($this->handle($repository->first()));
    }
    /**
     * @inheritDoc
     */
    public function updateImage(UserIdValueObject $userIdValueObject, RepositoryIdValueObject $repositoryIdValueObject, FileUserIdValueObject $fileUserIdValueObject): MediaRepositoryEntity
    {
        $repository = $this->model
            ->where('id',$repositoryIdValueObject->value())
            ->where('user_id',$userIdValueObject->value())
            ->first();
        if(is_null($repository) )
        {
            return new MediaRepositoryEntity(null, 'REPOSITORY_NOT_FOUND');
        }
        $repository->update([
            'file_id'=>$fileUserIdValueObject->value()
        ]);
        return new MediaRepositoryEntity($this->handle($repository));
    }



    private function handle(object $value): array
    {

        return [
            "id"=>$value->id,
            "name"=>$value->name,
            "secondary_name"=>$value->secondary_name,
            "detail"=> $value->detail,
            "user_id"=> $value->user_id,
            "mediaRepositoryType"=>$value->media_repository_type,
            "status"=>$value->status,
            "updated_at"=> $value->updated_at,
            "created_at"=> $value->created_at,
            "url"=>!empty($value->file->url)
                    ?$value->file->url:'null'
        ];
    }


    /**
     * @param UserIdValueObject $userIdValueObject
     * @param RepositoryIdValueObject $repositoryIdValueObject
     * @param RepositoryStatusValueObject $repositoryStatusValueObject
     * @return MediaRepositoryEntity
     */
    public function updateStatus(UserIdValueObject $userIdValueObject, RepositoryIdValueObject $repositoryIdValueObject, RepositoryStatusValueObject $repositoryStatusValueObject): MediaRepositoryEntity
    {

        $repository = $this->show( $userIdValueObject, $repositoryIdValueObject);
        $repository->entity()
                    ->update(["status"=>$repositoryStatusValueObject->value()]);
        return   $repository;
    }
}
