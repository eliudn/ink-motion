<?php

namespace Src\Application\MediaRepositories\Infrastructure\Controllers;

use Src\Application\MediaRepositories\Infrastructure\Enum\Status;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;

class RepositoryIndexStatusController extends CustomController
{
    use HttpCodeHelper;
    public function __construct()
    {
    }

    public function __invoke()
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            Status::cases()
        );
    }
}
