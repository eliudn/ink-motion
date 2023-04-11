<?php

namespace Src\Management\FileHandling\Domain\Contracts;

use Src\Management\FileHandling\Domain\File;
use Src\Management\FileHandling\Domain\ValueObjects\FileStoreValueObject;
use Src\Management\FileHandling\Domain\ValueObjects\PathValueObject;

interface FileRepositoryContract
{
    public function store(FileStoreValueObject $fileStoreValueObject):File;

    public function show(PathValueObject $pathValueObject):File;
}
