<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RomaziAiueo extends TestCase
{
    public function test_getRandomName()
    {
        $this->assertTrue(true);
    }

    public function test_getUser()
    {
        $this->assertEquals(10, count(\App\Libs\ExternalApi\RomaziAiueo::getUser(10)));
        $this->assertEquals(100, count(\App\Libs\ExternalApi\RomaziAiueo::getUser(150)));
    }
}
