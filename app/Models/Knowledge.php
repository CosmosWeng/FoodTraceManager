<?php

namespace App\Models;

use Eloquent as Model;

/**
 * @SWG\Definition(
 *      definition="Knowledge",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="title",
 *          description="title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="image",
 *          description="image",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="url",
 *          description="url",
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
class Knowledge extends Model
{
    public $table = 'knowledges';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'title',
        'image',
        'url',
        'date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'    => 'integer',
        'title' => 'string',
        'image' => 'string',
        'url'   => 'string',
        'date'  => 'date'
    ];

    public function getDateAttribute($value): string
    {
        $date = $this->asDateTime($value);

        return $date->format('Y-m-d H:m:s');
    }

    public function getImageAttribute($image) : string
    {
        return url('storage/knowledges/'.$image);
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];
}
