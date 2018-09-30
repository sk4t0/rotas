<?php
/**
 * Created by PhpStorm.
 * User: skato
 */
namespace App\Transformers;

use League\Fractal\TransformerAbstract;

use App\Models\Shop;

class ShopsTransformer extends TransformerAbstract
{
    public function transform(Shop $shop)
    {
        return [
            "id" => (int) $shop->id, 
            "name" => $shop->name, 

        ];
    }
}