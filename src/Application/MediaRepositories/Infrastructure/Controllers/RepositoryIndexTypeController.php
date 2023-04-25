<?php

namespace Src\Application\MediaRepositories\Infrastructure\Controllers;

use Src\Application\MediaRepositories\Infrastructure\Enum\MediaRepositoryType;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;

class RepositoryIndexTypeController extends \Src\Shared\Infrastructure\Controllers\CustomController
{
    use HttpCodeHelper;
    public function __invoke()
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            MediaRepositoryType::cases()
        );
    }
}
