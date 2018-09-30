<?php
/**
 * Created by PhpStorm.
 * User: skato
 */
namespace App\Transformers;

use League\Fractal\TransformerAbstract;

use App\Models\Rota;

class RotasTransformer extends TransformerAbstract
{
    public function transform(Rota $rota)
    {
        return [
            "id" => (int) $rota->id, 
            "week_commence_date" => $rota->week_commence_date, 
            "shop_id" => $rota->shop_id, 

        ];
    }
}