<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JsonTest extends TestCase
{
    public function test_convertJsonpToJson()
    {
	    $jsonp = 'callback({"err": 0,"name": [["鈴木 真美","すずき まみ","Suzuki Mami"]]})';
        $this->assertEquals('{"err": 0,"name": [["鈴木 真美","すずき まみ","Suzuki Mami"]]}', \App\Libs\Utility\Json::convertJsonpToJson($jsonp));
    }
}
