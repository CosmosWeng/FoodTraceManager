<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Category
 * @package App\Models
 * @version June 15, 2018, 6:31 am UTC
 *
 * @property string name
 */
class Category extends Model
{
    public $table = 'categories';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'name',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'   => 'integer',
        'name' => 'string',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];

    public function getNameAttribute($value)
    {
        return explode('-', $value)[0];
    }

    /**
     * Products
     *
     * @return void
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
