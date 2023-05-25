<?php

namespace Src\Application\MediaRepositories\Domain;

use Src\Application\MediaRepositories\Domain\Exceptions\RepositoryFinalizedOrCancelledException;
use Src\Application\MediaRepositories\Domain\Exceptions\RepositoryNotFoundException;
use Src\Shared\Domain\Domain;
use Src\Shared\Domain\Helper\HttpCodesDomainHelper;

final class MediaRepositoryEntity extends Domain
{
    use HttpCodesDomainHelper;
    private const REPOSITORY_NOT_FOUND ="REPOSITORY_NOT_FOUND";
    private const REPOSITORY_FINALIZED_OR_CANCELLED = "REPOSITORY_FINALIZED_OR_CANCELLED";

    public function __construct(mixed $entity = null, ?string $exception = null)
    {

        parent::__construct($entity, $exception);
    }

    public function handle():array
    {
        return [
            "id"=>$this->entity()->id,
            "name"=>$this->entity()->name,
            "secondary_name"=>$this->entity()->secondary_name,
            "detail"=> $this->entity()->detail,
            "user_id"=> $this->entity()->user_id,
            "mediaRepositoryType"=>$this->entity()->media_repository_type,
            "status"=>$this->entity()->status,
            "updated_at"=> $this->entity()->updated_at,
            "created_at"=> $this->entity()->created_at,
            "url"=>!empty($this->entity()->file->url)
                ?$this->entity()->file->url:'null'
        ];
    }
    /**
     * @inheritDoc
     */
    protected function isException(?string $exception): void
    {
        if (!is_null($exception)) {
            match ($exception) {

                self::REPOSITORY_NOT_FOUND => throw new RepositoryNotFoundException("Repository not found", $this->notFound()),
                self::REPOSITORY_FINALIZED_OR_CANCELLED => throw  new RepositoryFinalizedOrCancelledException("Repository finalized or cancelled", $this->badRequest())
            };
        }
    }
}
