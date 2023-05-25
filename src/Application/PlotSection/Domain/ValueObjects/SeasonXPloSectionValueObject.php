<?php

namespace Src\Application\PlotSection\Domain\ValueObjects;

use Src\Shared\Domain\ValueObjects\StringValueObject;

class SeasonXPloSectionValueObject extends StringValueObject
{

    public function __construct(string $value)
    {
        parent::__construct($value);
    }

    public function toArray():array
    {
        $valor = explode('x', $this->value());
        return [
          "season"=>$valor[0],
          "plotSection"=>$valor[1]
        ];
    }
}
