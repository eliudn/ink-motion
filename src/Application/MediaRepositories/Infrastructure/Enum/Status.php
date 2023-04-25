<?php

namespace Src\Application\MediaRepositories\Infrastructure\Enum;

enum Status: string
{
    case IN_PROGRESS ="en progreso";
    case IN_PAUSE = "en pausa";
    case CANCELLED  ="cancelado";
    case FINALIZED  ="Finalizado";
}
