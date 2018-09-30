<?php
/**
 * Created by PhpStorm.
 * User: skato
 */

namespace App\Http\API\Controllers;

use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Http\API\Controllers\Controller;

use App\Models\Staff;
use App\Transformers\StaffsTransformer;


/**
 * Staffs resource representation.
 *
 * @Resource("Staffs", uri="/staffs")
 */
class StaffController extends Controller
{
    use Helpers;

    /**
     * Display a listing of the Staffs.
     *
     * Get a JSON representation of all the Staffs.
     *
     * @Get("")
     * @Versions({"v1"})
     * @Response(200, body={"id": "id", "first_name": "first_name", "surname": "surname", "shop_id": "shop_id"})
     * @return \Dingo\Api\Http\Response
     */
    public function index()
    {

        $staffs = Staff::all();
        return $this->response->collection($staffs, new StaffsTransformer);

    }

    /**
     * Display the specified Staff.
     *
     * Get a JSON representation of the single Staff.
     *
     * @Get("/{id}")
     * @Versions({"v1"})
     * @Response(200, body={"id": "id", "first_name": "first_name", "surname": "surname", "shop_id": "shop_id"})
     * @Parameters({
     *      @Parameter("id", type="integer", required=true, description="The id for the Staff")
     * })
     *
     * @param  int  $id
     * @return \Dingo\Api\Http\Response
     */
    public function show($id)
    {

        $staff = Staff::findOrFail($id);
        return $this->response->item($staff, new StaffsTransformer);

    }

    /**
     * Store a new Staff
     *
     * Register a new Staff .
     *
     * @Post("")
     * @Versions({"v1"})
     * @Request({"first_name": "first_name", "surname": "surname", "shop_id": "shop_id"})
     * @Response(200, body={"id": "id", "first_name": "first_name", "surname": "surname", "shop_id": "shop_id"})
     *
     * @param Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function store(Request $request)
    {
        $staff = Staff::create($request->all());
        return $this->response->item($staff, new StaffsTransformer);
    }

    /**
     * Update a Staff
     *
     * Update a Staff .
     *
     * @Put("/{id}")
     * @Versions({"v1"})
     * @Request({"first_name": "first_name", "surname": "surname", "shop_id": "shop_id"})
     * @Response(200, body={"id": "id", "first_name": "first_name", "surname": "surname", "shop_id": "shop_id"})
     * @Parameters({
     *      @Parameter("id", type="integer", required=true, description="The id for the Staff")
     * })
     *
     * @param Request $request
     * @param $id
     * @return \Dingo\Api\Http\Response
     */
    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id)->update($request->all());
        return $this->response->item($staff, new StaffsTransformer);
    }

    /**
     * Destroy a Staff
     *
     * Destroy a single Staff. No content returned
     *
     * @Delete("/{id}")
     * @Versions({"v1"})
     * @Response(204)
     * @Parameters({
     *      @Parameter("id", type="integer", required=true, description="The id for the Staff")
     * })
     *
     * @param $id
     * @return \Dingo\Api\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::findOrFail($id)->delete();
        return $this->response->noContent();
    }

}