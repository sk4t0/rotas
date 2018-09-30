<?php
/**
 * Created by PhpStorm.
 * User: skato
 */
namespace App\Transformers;

use League\Fractal\TransformerAbstract;

use App\Models\Shift;

class ShiftsTransformer extends TransformerAbstract
{
    public function transform(Shift $shift)
    {
        return [
            "id" => (int) $shift->id, 
            "rota_id" => $shift->rota_id, 
            "staff_id" => $shift->staff_id, 
            "start_time" => $shift->start_time, 
            "end_time" => $shift->end_time, 

        ];
    }
}