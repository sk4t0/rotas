<?php
/**
 * Created by PhpStorm.
 * User: skato
 */
namespace App\Transformers;

use League\Fractal\TransformerAbstract;

use App\Models\Staff;

class StaffsTransformer extends TransformerAbstract
{
    public function transform(Staff $staff)
    {
        return [
            "id" => (int) $staff->id, 
            "first_name" => $staff->first_name, 
            "surname" => $staff->surname, 
            "shop_id" => $staff->shop_id, 

        ];
    }
}