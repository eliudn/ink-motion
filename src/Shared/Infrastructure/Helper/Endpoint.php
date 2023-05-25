<?php

namespace Src\Shared\Infrastructure\Helper;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Testing\TestResponse;
use Src\Application\MediaRepositories\Infrastructure\Repositories\Eloquent\MediaRepository;

trait Endpoint
{
    //use UrlApi;
    /**
     * @var array
     */
    private  function header(){
        return [
            'authorization'=>env('API_KEY'),
            'authentication'=>$this->jwt
        ];
    }
    private function urlLoginUser(): void
    {
        Artisan::call('migrate:fresh --seed');

        $loguin= $this->post($this->login(),
            [
                "nickname_or_email"=>"default1",
                "password"=>"defaul"
            ],
            ['authorization'=>env('API_KEY')]
        );

        $this->userId = $loguin->original['message']['id'];
        $this->jwt = $loguin->original['message']['jwt'];


    }

    private function urlPostPlotSection(): TestResponse
    {
        $value = $this->post(
            $this->plotSectionByRepositoryId(1),
            [

            ],
            $this->header()
        );
        return $value;
    }
    private function MediaRepositoryFactory(

    )
    {
        $mediaRepository = MediaRepository::factory()->create(['user_id'=>$this->userId]);
        $this->repositoryId = $mediaRepository->id;
        return $mediaRepository;
    }
}
