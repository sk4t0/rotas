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

class Staff extends Model
{
    use SoftDeletes;
    
    protected $table = 'staff';
    
    protected $hidden = [
    
    ];
    
    protected $guarded = [];

    protected $fillable = [
            'first_name', 'surname', 'shop_id', 
        ];
    
    protected $dates = ['deleted_at'];

    /**
     * Get the shifts for the staff member.
     */
    public function shifts()
    {
        return $this->hasMany('App\Models\Shift');
    }
}
