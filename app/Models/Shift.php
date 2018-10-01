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
use Carbon\Carbon;

class Shift extends Model
{
    use SoftDeletes;
    
    protected $table = 'shifts';
    
    protected $hidden = [
    
    ];
    
    protected $guarded = [];

    protected $fillable = [
            'rota_id', 'staff_id', 'start_time', 'end_time', 
        ];
    
    protected $dates = ['deleted_at'];

    /**
     * Get the rota that owns the shift.
     */
    public function rota()
    {
        return $this->belongsTo('App\Models\Rota');
    }

    /**
     * Get the staff member that owns the shift.
     */
    public function staff()
    {
        return $this->belongsTo('App\Models\Staff');
    }

    /**
     * Get the shift breaks for the shift.
     */
    public function shift_breaks()
    {
        return $this->hasMany('App\Models\Shift_Break');
    }

    public function scopeByDay ($query, Carbon $start, Carbon $end) {

        return $query->where('start_time', '>=', $start->toDateTimeString())
            ->where('start_time', '<=', $end->toDateTimeString())
            ->where('end_time', '>=', $start->toDateTimeString())
            ->where('end_time', '<=', $end->toDateTimeString());

    }
}
