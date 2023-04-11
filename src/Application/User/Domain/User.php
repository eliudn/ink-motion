<?php

namespace Src\Application\User\Domain;

use Src\Application\User\Domain\Exceptions\UserNotFoundException;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;
use Src\Shared\Domain\Domain;
use Src\Shared\Domain\Helper\HttpCodesDomainHelper;
use Src\Shared\Domain\ValueObjects\StringValueObject;

class User extends Domain
{
    use HttpCodesDomainHelper;
    private const USER_NOT_FOUND = 'USER_NOT_FOUND';
    public function __construct(private mixed $entity = null,private ?string $exception = null)
    {

       parent::__construct($this->entity, $this->exception);
    }

    protected function isException(?string $exception): void
    {
        if (!is_null($exception)) {
            match ($exception) {
                self::USER_NOT_FOUND => throw new UserNotFoundException("User not found", $this->notFound())
            };
        }
    }

    public  function checkAuthorization(UserIdValueObject $userIdValueObject):bool
    {
        if ($this->entity()->id === $userIdValueObject->value())
        {
            return true;
        }
        return false;
    }

    public function checkSuperAdmin(string $nameRol):bool
    {
        if ($nameRol === "super_admin")
            {
                return true;
            }
        return  false;
    }

    public function getEmail():string
    {
        return $this->entity()["email"];
    }
}
