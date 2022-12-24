<?php

namespace Tests\Unit;

use App\Models\Collection;
use App\Models\Tale;
use Tests\TestCase;
use App\Http\Controllers\TalesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TalesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */

     


    /** @test */ 
    public function IndexTalesTest()
    {
        $coll = Tale::all();
        $TalController = new TalesController();
        $response = $TalController->index();
        $responseContent = $response->getOriginalContent()[0];
        $this->assertEquals(200, $response->status());
        $this->assertEquals((string) $coll,(string) $responseContent);
    }

    public function BorrarTalesTest()
    {
        $response = $TalController->index();
        $responseContent = $response->getOriginalContent()[0];
        $this->assertEquals(200, $response->status());
        $this->assertEquals("hola  todod mundo - Prueba #2 - part",(string) $responseContent);
    }

    public function storeTaleTest()
    {
        $request = new Request([
            "algo"=>"awdwa"
        ]);
        $TalController = new TalesController();
        $response = $TalController->store($request);
        $responseContent = $response->getOriginalContent();
        $this->assertEquals(200, $response->status());
        $this->assertEquals("Insertar token Bearer", $responseContent["message"]);
    }

    public function storeTaleTest1()
    {
        $request = new Request([
            "tal_titl"=>"Larry",
            "tal_desc"=>"Esta es la historia de larry",
            "tal_cont"=>"Aca va todo el contenido html",
            "col_id"  =>4
        ]);
        $TalController = new TalesController();
        $response = $TalController->store($request);
        $responseContent = $response->getOriginalContent();
        $this->assertEquals(200, $response->status());
        $this->assertEquals("Insertar token Bearer", $responseContent["message"]);
    }
}
