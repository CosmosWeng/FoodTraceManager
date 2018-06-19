<?php

namespace App\Models;

use Eloquent as Model;

/**
 * @SWG\Definition(
 *      definition="Products",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="category_id",
 *          description="category_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="company",
 *          description="company",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="url",
 *          description="url",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="images",
 *          description="images",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="inspection_reports",
 *          description="inspection_reports",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="inspection_date",
 *          description="inspection_date",
 *          type="string",
 *          format="date"
 *      )
 * )
 */
class Products extends Model
{
    public $table = 'products';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'category_id',
        'company',
        'name',
        'url',
        'images',
        'inspection_reports',
        'inspection_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                 => 'integer',
        'category_id'        => 'integer',
        'company'            => 'string',
        'name'               => 'string',
        'url'                => 'string',
        'images'             => 'array',
        'inspection_reports' => 'array',
        'inspection_date'    => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];
}
