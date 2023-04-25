<?php

namespace Src\Application\MediaRepositorySeasons\Infrastructure\Enum;

enum Status: string
{
    case FINALIZED = 'finalizado';
    case IN_PROGRESS = 'en progreso';

}
