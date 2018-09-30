<?php
/**
 * Model generated using LaraAdmin
 * Help: http://laraadmin.com
 * LaraAdmin is open-sourced software licensed under the MIT license.
 * Developed by: Dwij IT Solutions
 * Developer Website: http://dwijitsolutions.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shift_Break extends Model
{
    use SoftDeletes;
    
    protected $table = 'shift_breaks';
    
    protected $hidden = [
    
    ];
    
    protected $guarded = [];

    protected $fillable = [
            'shift_id', 'start_time', 'end_time', 
        ];
    
    protected $dates = ['deleted_at'];
}
