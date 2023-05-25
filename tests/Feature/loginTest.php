<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Artisan;
use Src\Application\User\Infrastructure\Repositories\Eloquent\User;
use Tests\TestCase;

class loginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testLoginErrorBadRequest(): void
    {

        $login = $this->post('/api/v0/login');
        $login->assertStatus(400)
              ->assertJsonStructure([
                  'status',
                  'error',
                  'class',
                  'message'
              ]);
    }
    public function testLogin():void
    {
        Artisan::call('migrate --seed');

        $login = $this->post('/api/v0/login',
        [
            "nickname_or_email"=>"default1",
            "password"=>"defaul"
        ],
        [
            'authorization'=>env('API_KEY')
        ]);
        $login->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'error',
                'message'=>[
                    'id',
                    'nickname',
                    'roles'=>[
                        'id',
                        'name'
                    ],
                    'jwt'
                ]
            ]);
    }
}
