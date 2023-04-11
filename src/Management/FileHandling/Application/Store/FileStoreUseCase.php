<?php

namespace Src\Management\FileHandling\Application\Store;

use Src\Management\FileHandling\Domain\Contracts\FileRepositoryContract;
use Src\Management\FileHandling\Domain\File;
use Src\Management\FileHandling\Domain\ValueObjects\FileStoreValueObject;

final class FileStoreUseCase
{
    public function __construct(
        private readonly FileRepositoryContract $fileRepositoryContract
    )
    {
    }
    public function __invoke(array $request):File
    {

            return $this->fileRepositoryContract->store(new FileStoreValueObject($request));
    }
}
