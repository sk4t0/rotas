<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Rota;
use App\Models\Staff;
use App\Models\Shift;
use App\Models\Shop;
use App\Models\Shift_Break;
use App\Library\SingleManning;
use Carbon\Carbon;
use Kumuwai\DataTransferObject\Laravel5DTO;

class SingleManningTest extends TestCase
{

    /**
     * Test Single Manning class.
     *
     * @return void
     */
    public function testSingleManning()
    {
        $rota = Rota::findOrFail(1);
        $singleManningObject = new SingleManning($rota);
        $singleManning = Laravel5DTO::make($singleManningObject->singleManningArray);
        $singleManningArray = $singleManning->toArray();

        $this->assertEquals(600, $singleManningArray['Monday']['Black Widow']);
        $this->assertEquals(600, $singleManningArray['Monday']['tot']);
        $this->assertEquals(360, $singleManningArray['Tuesday']['Black Widow']);
        $this->assertEquals(240, $singleManningArray['Tuesday']['Thor']);
        $this->assertEquals(600, $singleManningArray['Tuesday']['tot']);
        $this->assertEquals(60, $singleManningArray['Wednesday']['Wolverine']);
        $this->assertEquals(300, $singleManningArray['Wednesday']['Gamora']);
        $this->assertEquals(360, $singleManningArray['Wednesday']['tot']);
        $this->assertEquals(59, $singleManningArray['Thursday']['Wolverine']);
        $this->assertEquals(59, $singleManningArray['Thursday']['Gamora']);
        $this->assertEquals(118, $singleManningArray['Thursday']['tot']);
        $this->assertEquals(60, $singleManningArray['Friday']['Black Widow']);
        $this->assertEquals(120, $singleManningArray['Friday']['Thor']);
        $this->assertEquals(120, $singleManningArray['Friday']['Wolverine']);
        $this->assertEquals(300, $singleManningArray['Friday']['tot']);
    }
}
