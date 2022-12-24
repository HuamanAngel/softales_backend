<?php

namespace Tests\Unit;

use App\Models\Collection;
use App\Models\Tale;
use Tests\TestCase;
use App\Http\Controllers\TalesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TalesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */

     


    /** @test */ 
    public function IndexTales()
    {
        $coll = Tale::all();
        $TalController = new TalesController();
        $response = $TalController->index();
        //$this->assertTrue(true);
        $responseContent = $response->getOriginalContent()[0];

        $this->assertEquals(200, $response->status());
        $this->assertEquals((string) $coll,(string) $responseContent);
    }
}
