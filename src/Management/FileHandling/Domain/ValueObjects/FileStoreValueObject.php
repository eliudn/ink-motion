<?php

namespace Src\Management\FileHandling\Domain\ValueObjects;

use Src\Shared\Domain\ValueObjects\MixedValueObject;

class FileStoreValueObject extends MixedValueObject
{

    public function __construct(private mixed $value)
    {
        parent::__construct($this->value);

    }


}
