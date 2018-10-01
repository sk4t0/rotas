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

class Rota extends Model
{
    use SoftDeletes;
    
    protected $table = 'rotas';
    
    protected $hidden = [
    
    ];
    
    protected $guarded = [];

    protected $fillable = [
            'week_commence_date', 'shop_id', 
        ];
    
    protected $dates = ['deleted_at'];

    /**
     * Get the shop that owns the rota.
     */
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    /**
     * Get the shifts for the rota.
     */
    public function shifts()
    {
        return $this->hasMany('App\Models\Shift');
    }
}
