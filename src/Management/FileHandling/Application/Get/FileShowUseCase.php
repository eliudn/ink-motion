<?php

namespace Src\Management\FileHandling\Application\Get;

use Src\Management\FileHandling\Domain\Contracts\FileRepositoryContract;
use Src\Management\FileHandling\Domain\File;
use Src\Management\FileHandling\Domain\ValueObjects\PathValueObject;

class FileShowUseCase
{

    public function __construct(
        private readonly FileRepositoryContract $fileRepositoryContract
    )
    {
    }
    public function __invoke(array $path):File
    {
        return  $this->fileRepositoryContract->show(new PathValueObject($path));
    }
}
