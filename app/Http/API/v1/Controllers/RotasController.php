<?php
/**
 * Created by PhpStorm.
 * User: skato
 */

namespace App\Http\API\Controllers;

use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Http\API\Controllers\Controller;

use App\Models\Rota;
use App\Transformers\RotasTransformer;


/**
 * Rotas resource representation.
 *
 * @Resource("Rotas", uri="/rotas")
 */
class RotasController extends Controller
{
    use Helpers;

    /**
     * Display a listing of the Rotas.
     *
     * Get a JSON representation of all the Rotas.
     *
     * @Get("")
     * @Versions({"v1"})
     * @Response(200, body={"id": "id", "week_commence_date": "week_commence_date", "shop_id": "shop_id"})
     * @return \Dingo\Api\Http\Response
     */
    public function index()
    {

        $rotas = Rota::all();
        return $this->response->collection($rotas, new RotasTransformer);

    }

    /**
     * Display the specified Rota.
     *
     * Get a JSON representation of the single Rota.
     *
     * @Get("/{id}")
     * @Versions({"v1"})
     * @Response(200, body={"id": "id", "week_commence_date": "week_commence_date", "shop_id": "shop_id"})
     * @Parameters({
     *      @Parameter("id", type="integer", required=true, description="The id for the Rota")
     * })
     *
     * @param  int  $id
     * @return \Dingo\Api\Http\Response
     */
    public function show($id)
    {

        $rota = Rota::findOrFail($id);
        return $this->response->item($rota, new RotasTransformer);

    }

    /**
     * Store a new Rota
     *
     * Register a new Rota .
     *
     * @Post("")
     * @Versions({"v1"})
     * @Request({"week_commence_date": "week_commence_date", "shop_id": "shop_id"})
     * @Response(200, body={"id": "id", "week_commence_date": "week_commence_date", "shop_id": "shop_id"})
     *
     * @param Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function store(Request $request)
    {
        $rota = Rota::create($request->all());
        return $this->response->item($rota, new RotasTransformer);
    }

    /**
     * Update a Rota
     *
     * Update a Rota .
     *
     * @Put("/{id}")
     * @Versions({"v1"})
     * @Request({"week_commence_date": "week_commence_date", "shop_id": "shop_id"})
     * @Response(200, body={"id": "id", "week_commence_date": "week_commence_date", "shop_id": "shop_id"})
     * @Parameters({
     *      @Parameter("id", type="integer", required=true, description="The id for the Rota")
     * })
     *
     * @param Request $request
     * @param $id
     * @return \Dingo\Api\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rota = Rota::findOrFail($id)->update($request->all());
        return $this->response->item($rota, new RotasTransformer);
    }

    /**
     * Destroy a Rota
     *
     * Destroy a single Rota. No content returned
     *
     * @Delete("/{id}")
     * @Versions({"v1"})
     * @Response(204)
     * @Parameters({
     *      @Parameter("id", type="integer", required=true, description="The id for the Rota")
     * })
     *
     * @param $id
     * @return \Dingo\Api\Http\Response
     */
    public function destroy($id)
    {
        $rota = Rota::findOrFail($id)->delete();
        return $this->response->noContent();
    }

}