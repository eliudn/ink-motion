<?php

namespace Src\Management\Login\Domain\ValueObject;

use Src\Shared\Domain\ValueObjects\MixedValueObject;

class LoginAuthenticationParametersValueObject extends MixedValueObject
{


    /**
     * @return array
     */
    public function  handler():array
    {
        return [
            'iat'=>time(),
            'exp'=>$this->getTime(),
            'aud'=>$this->aud(),
            'data'=>$this->value()
        ];
    }

    /**
     * @return float|int
     */
    private function getTime():float|int
    {
        $time = time();
        return $time + (90*60);
    }

    /**
     * @return ?string
     */
    private function aud(): ?string
    {
        $aud ='';

        if(!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $aud = $_SERVER['HTTP_CLIENT_IP'];
        }

        if(!empty($_SERVER['HTTP_X_FORWARDER_FOR']))
        {
            $aud = $_SERVER['HTTP_X_FORWARDER_FOR'];
        }

        if(!empty($_SERVER['REMOTE_ADDR']))
        {
            $aud = $_SERVER['REMOTE_ADDR'];
        }

        $aud .=@$_SERVER['HTTP_USER_AGENT'];
        $aud .=gethostname();

        return sha1($aud ?? null);

    }

    public function jwtKey(): string
    {
        return env('JWT_KEY');
    }

    public function jwtEncrypt(): string
    {
        return  env('JWT_ENCRYPT');
    }
}
