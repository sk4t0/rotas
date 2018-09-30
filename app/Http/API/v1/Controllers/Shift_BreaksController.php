<?php
/**
 * Created by PhpStorm.
 * User: skato
 */

namespace App\Http\API\Controllers;

use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Http\API\Controllers\Controller;

use App\Models\Shift_Break;
use App\Transformers\Shift_BreaksTransformer;


/**
 * Shift_Breaks resource representation.
 *
 * @Resource("Shift_Breaks", uri="/shift_breaks")
 */
class Shift_BreaksController extends Controller
{
    use Helpers;

    /**
     * Display a listing of the Shift_Breaks.
     *
     * Get a JSON representation of all the Shift_Breaks.
     *
     * @Get("")
     * @Versions({"v1"})
     * @Response(200, body={"id": "id", "shift_id": "shift_id", "start_time": "start_time", "end_time": "end_time"})
     * @return \Dingo\Api\Http\Response
     */
    public function index()
    {

        $shift_breaks = Shift_Break::all();
        return $this->response->collection($shift_breaks, new Shift_BreaksTransformer);

    }

    /**
     * Display the specified Shift_Break.
     *
     * Get a JSON representation of the single Shift_Break.
     *
     * @Get("/{id}")
     * @Versions({"v1"})
     * @Response(200, body={"id": "id", "shift_id": "shift_id", "start_time": "start_time", "end_time": "end_time"})
     * @Parameters({
     *      @Parameter("id", type="integer", required=true, description="The id for the Shift_Break")
     * })
     *
     * @param  int  $id
     * @return \Dingo\Api\Http\Response
     */
    public function show($id)
    {

        $shift_break = Shift_Break::findOrFail($id);
        return $this->response->item($shift_break, new Shift_BreaksTransformer);

    }

    /**
     * Store a new Shift_Break
     *
     * Register a new Shift_Break .
     *
     * @Post("")
     * @Versions({"v1"})
     * @Request({"shift_id": "shift_id", "start_time": "start_time", "end_time": "end_time"})
     * @Response(200, body={"id": "id", "shift_id": "shift_id", "start_time": "start_time", "end_time": "end_time"})
     *
     * @param Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function store(Request $request)
    {
        $shift_break = Shift_Break::create($request->all());
        return $this->response->item($shift_break, new Shift_BreaksTransformer);
    }

    /**
     * Update a Shift_Break
     *
     * Update a Shift_Break .
     *
     * @Put("/{id}")
     * @Versions({"v1"})
     * @Request({"shift_id": "shift_id", "start_time": "start_time", "end_time": "end_time"})
     * @Response(200, body={"id": "id", "shift_id": "shift_id", "start_time": "start_time", "end_time": "end_time"})
     * @Parameters({
     *      @Parameter("id", type="integer", required=true, description="The id for the Shift_Break")
     * })
     *
     * @param Request $request
     * @param $id
     * @return \Dingo\Api\Http\Response
     */
    public function update(Request $request, $id)
    {
        $shift_break = Shift_Break::findOrFail($id)->update($request->all());
        return $this->response->item($shift_break, new Shift_BreaksTransformer);
    }

    /**
     * Destroy a Shift_Break
     *
     * Destroy a single Shift_Break. No content returned
     *
     * @Delete("/{id}")
     * @Versions({"v1"})
     * @Response(204)
     * @Parameters({
     *      @Parameter("id", type="integer", required=true, description="The id for the Shift_Break")
     * })
     *
     * @param $id
     * @return \Dingo\Api\Http\Response
     */
    public function destroy($id)
    {
        $shift_break = Shift_Break::findOrFail($id)->delete();
        return $this->response->noContent();
    }

}