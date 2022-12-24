<?php

namespace Tests\Unit;

use App\Models\Collection;
use Tests\TestCase;
use App\Http\Controllers\CollectionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CollectionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */

     


    /** @test */ 
    public function IndexCollection()
    {
        $coll = Collection::all();
        $CollController = new CollectionController();
        $response = $CollController->index();
        //$this->assertTrue(true);
        $responseContent = $response->getOriginalContent()[0];

        $this->assertEquals(200, $response->status());
        $this->assertEquals((string) $coll,(string) $responseContent);
    }
}
