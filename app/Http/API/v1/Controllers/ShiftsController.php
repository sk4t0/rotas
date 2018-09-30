<?php
/**
 * Created by PhpStorm.
 * User: skato
 */

namespace App\Http\API\Controllers;

use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Http\API\Controllers\Controller;

use App\Models\Shift;
use App\Transformers\ShiftsTransformer;


/**
 * Shifts resource representation.
 *
 * @Resource("Shifts", uri="/shifts")
 */
class ShiftsController extends Controller
{
    use Helpers;

    /**
     * Display a listing of the Shifts.
     *
     * Get a JSON representation of all the Shifts.
     *
     * @Get("")
     * @Versions({"v1"})
     * @Response(200, body={"id": "id", "rota_id": "rota_id", "staff_id": "staff_id", "start_time": "start_time", "end_time": "end_time"})
     * @return \Dingo\Api\Http\Response
     */
    public function index()
    {

        $shifts = Shift::all();
        return $this->response->collection($shifts, new ShiftsTransformer);

    }

    /**
     * Display the specified Shift.
     *
     * Get a JSON representation of the single Shift.
     *
     * @Get("/{id}")
     * @Versions({"v1"})
     * @Response(200, body={"id": "id", "rota_id": "rota_id", "staff_id": "staff_id", "start_time": "start_time", "end_time": "end_time"})
     * @Parameters({
     *      @Parameter("id", type="integer", required=true, description="The id for the Shift")
     * })
     *
     * @param  int  $id
     * @return \Dingo\Api\Http\Response
     */
    public function show($id)
    {

        $shift = Shift::findOrFail($id);
        return $this->response->item($shift, new ShiftsTransformer);

    }

    /**
     * Store a new Shift
     *
     * Register a new Shift .
     *
     * @Post("")
     * @Versions({"v1"})
     * @Request({"rota_id": "rota_id", "staff_id": "staff_id", "start_time": "start_time", "end_time": "end_time"})
     * @Response(200, body={"id": "id", "rota_id": "rota_id", "staff_id": "staff_id", "start_time": "start_time", "end_time": "end_time"})
     *
     * @param Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function store(Request $request)
    {
        $shift = Shift::create($request->all());
        return $this->response->item($shift, new ShiftsTransformer);
    }

    /**
     * Update a Shift
     *
     * Update a Shift .
     *
     * @Put("/{id}")
     * @Versions({"v1"})
     * @Request({"rota_id": "rota_id", "staff_id": "staff_id", "start_time": "start_time", "end_time": "end_time"})
     * @Response(200, body={"id": "id", "rota_id": "rota_id", "staff_id": "staff_id", "start_time": "start_time", "end_time": "end_time"})
     * @Parameters({
     *      @Parameter("id", type="integer", required=true, description="The id for the Shift")
     * })
     *
     * @param Request $request
     * @param $id
     * @return \Dingo\Api\Http\Response
     */
    public function update(Request $request, $id)
    {
        $shift = Shift::findOrFail($id)->update($request->all());
        return $this->response->item($shift, new ShiftsTransformer);
    }

    /**
     * Destroy a Shift
     *
     * Destroy a single Shift. No content returned
     *
     * @Delete("/{id}")
     * @Versions({"v1"})
     * @Response(204)
     * @Parameters({
     *      @Parameter("id", type="integer", required=true, description="The id for the Shift")
     * })
     *
     * @param $id
     * @return \Dingo\Api\Http\Response
     */
    public function destroy($id)
    {
        $shift = Shift::findOrFail($id)->delete();
        return $this->response->noContent();
    }

}