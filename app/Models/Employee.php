<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
	
	protected $table = 'employees';
	
	protected $hidden = [
        
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'designation', 'mobile', 'email', 'dept'
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->hasOne('App\User', 'context_id');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department', 'dept');
    }
}
