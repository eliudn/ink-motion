<?php

namespace Src\Application\FileUser\Domain;

use Src\Application\FileUser\Domain\Exceptions\FileNotFoundException;
use Src\Shared\Domain\Domain;
use Src\Shared\Domain\Helper\HttpCodesDomainHelper;

class FileUserEntity extends Domain
{
    use HttpCodesDomainHelper;
    private const   FILE_NOT_FOUND = "FILE_NOT_FOUND";
    public function __construct(private readonly mixed $entity = null, private readonly ?string $exception = null)
    {

        parent::__construct($this->entity, $this->exception);
    }

    public function handle():array
    {

        return [
            "id" =>$this->entity()["id"] ,
            "filename" => $this->entity()["filename"],
            "file_type" => $this->entity()["file_type"],
            "file_size" => $this->entity()["file_size"],
            "path" => $this->entity()["path"],
            "file_saving_service_id" => $this->entity()["file_saving_service_id"],
            "resolution" => $this->entity()["resolution"],
            "user_id" => $this->entity()["user_id"],
            "created_at" =>$this->entity()["created_at"] ,
            "updated_at" => $this->entity()["updated_at"]
        ];
    }

    /**
     * @inheritDoc
     */
    protected function isException(?string $exception): void
    {
        if(!is_null($exception))
        {
            match ($exception) {
                self::FILE_NOT_FOUND => throw new FileNotFoundException("File not found", $this->notFound())
            };
        }
    }
}
