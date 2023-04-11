<?php

namespace Src\Shared\Domain\ValueObjects;

abstract class IntValueObject
{
    /**
     * @param int $value
     */
    public function __construct( private readonly int $value)
    {
    }

    /**
     * @return int
     */
    public function value():int
    {
        return $this->value;
    }
}
