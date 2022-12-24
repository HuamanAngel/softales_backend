<?php

namespace Tests\Unit;

use App\Models\Collection;
use Tests\TestCase;
use App\Http\Controllers\CollectionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollectionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */

     


    /** @test */ 
    public function IndexCollectionTest()
    {
        $coll = Collection::all();
        $CollController = new CollectionController();
        $response = $CollController->index();
        //$this->assertTrue(true);
        $responseContent = $response->getOriginalContent()[0];

        $this->assertEquals(200, $response->status());
        $this->assertEquals((string) $coll,(string) $responseContent);
    }


    public function storeCollectionTest()
    {
        $request = new Request([
            "algo"=>"awdwa"
        ]);
        $CollController = new CollectionController();
        $response = $CollController->store($request);
        $responseContent = $response->getOriginalContent();
        $this->assertEquals(200, $response->status());
        $this->assertEquals("Insertar token Bearer", $responseContent["message"]);
    }
}
