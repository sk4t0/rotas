<?php
/**
 * Created by PhpStorm.
 * User: skato
 */

namespace App\Http\API\Controllers;

use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Http\API\Controllers\Controller;

use App\Models\Shop;
use App\Transformers\ShopsTransformer;


/**
 * Shops resource representation.
 *
 * @Resource("Shops", uri="/shops")
 */
class ShopsController extends Controller
{
    use Helpers;

    /**
     * Display a listing of the Shops.
     *
     * Get a JSON representation of all the Shops.
     *
     * @Get("")
     * @Versions({"v1"})
     * @Response(200, body={"id": "id", "name": "name"})
     * @return \Dingo\Api\Http\Response
     */
    public function index()
    {

        $shops = Shop::all();
        return $this->response->collection($shops, new ShopsTransformer);

    }

    /**
     * Display the specified Shop.
     *
     * Get a JSON representation of the single Shop.
     *
     * @Get("/{id}")
     * @Versions({"v1"})
     * @Response(200, body={"id": "id", "name": "name"})
     * @Parameters({
     *      @Parameter("id", type="integer", required=true, description="The id for the Shop")
     * })
     *
     * @param  int  $id
     * @return \Dingo\Api\Http\Response
     */
    public function show($id)
    {

        $shop = Shop::findOrFail($id);
        return $this->response->item($shop, new ShopsTransformer);

    }

    /**
     * Store a new Shop
     *
     * Register a new Shop .
     *
     * @Post("")
     * @Versions({"v1"})
     * @Request({"name": "name"})
     * @Response(200, body={"id": "id", "name": "name"})
     *
     * @param Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function store(Request $request)
    {
        $shop = Shop::create($request->all());
        return $this->response->item($shop, new ShopsTransformer);
    }

    /**
     * Update a Shop
     *
     * Update a Shop .
     *
     * @Put("/{id}")
     * @Versions({"v1"})
     * @Request({"name": "name"})
     * @Response(200, body={"id": "id", "name": "name"})
     * @Parameters({
     *      @Parameter("id", type="integer", required=true, description="The id for the Shop")
     * })
     *
     * @param Request $request
     * @param $id
     * @return \Dingo\Api\Http\Response
     */
    public function update(Request $request, $id)
    {
        $shop = Shop::findOrFail($id)->update($request->all());
        return $this->response->item($shop, new ShopsTransformer);
    }

    /**
     * Destroy a Shop
     *
     * Destroy a single Shop. No content returned
     *
     * @Delete("/{id}")
     * @Versions({"v1"})
     * @Response(204)
     * @Parameters({
     *      @Parameter("id", type="integer", required=true, description="The id for the Shop")
     * })
     *
     * @param $id
     * @return \Dingo\Api\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::findOrFail($id)->delete();
        return $this->response->noContent();
    }

}