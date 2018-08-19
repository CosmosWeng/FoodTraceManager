<?php

namespace App\Models;

use Eloquent as Model;

/**
 * @SWG\Definition(
 *      definition="Topic",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="category",
 *          description="category",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="title",
 *          description="title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="images",
 *          description="images",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="date",
 *          description="date",
 *          type="string",
 *          format="date"
 *      )
 * )
 */
class Topic extends Model
{
    public $table = 'topics';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'category',
        'title',
        'images',
        'date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'       => 'integer',
        'category' => 'string',
        'title'    => 'string',
        'images'   => 'array',
        'date'     => 'date'
    ];
    
    public function getDateAttribute($value): string
    {
        $date = $this->asDateTime($value);

        return $date->format('Y-m-d');
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];
}
