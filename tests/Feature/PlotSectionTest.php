<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Src\Shared\Infrastructure\Helper\Endpoint;
use Src\Shared\Infrastructure\Helper\UrlApi;
use Tests\TestCase;

class PlotSectionTest extends TestCase
{
    use UrlApi, Endpoint;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $this->urlLoginUser();
        $this->MediaRepositoryFactory();
        $plotSection = $this->urlPostPlotSection();

        dd($plotSection);
    }
}
