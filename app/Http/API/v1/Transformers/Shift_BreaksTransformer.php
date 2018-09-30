<?php
/**
 * Created by PhpStorm.
 * User: skato
 */
namespace App\Transformers;

use League\Fractal\TransformerAbstract;

use App\Models\Shift_Break;

class Shift_BreaksTransformer extends TransformerAbstract
{
    public function transform(Shift_Break $shift_break)
    {
        return [
            "id" => (int) $shift_break->id, 
            "shift_id" => $shift_break->shift_id, 
            "start_time" => $shift_break->start_time, 
            "end_time" => $shift_break->end_time, 

        ];
    }
}