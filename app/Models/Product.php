<?php

namespace App\Models;

use App\Utils\Util;
use Eloquent as Model;

/**
 * @SWG\Definition(
 *      definition="Product",
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
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="spec",
 *          description="spec",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="company",
 *          description="company",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="warning_sign_text",
 *          description="warning_sign_text",
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
 *          property="inspection_date",
 *          description="inspection_date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="inspection_subject",
 *          description="inspection_subject",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="inspection_items",
 *          description="inspection_items",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="inspection_reports",
 *          description="inspection_reports",
 *          type="string"
 *      )
 * )
 */
class Product extends Model
{
    public $table = 'products';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'category_id',
        'name',
        'spec',
        'description',
        'company',
        'warning_sign_text',
        'url',
        'images',
        'inspection_date',
        'inspection_subject',
        'inspection_items',
        'inspection_reports'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                 => 'integer',
        'category_id'        => 'integer',
        'name'               => 'string',
        'spec'               => 'string',
        'description'        => 'string',
        'company'            => 'string',
        'warning_sign_text'  => 'string',
        'url'                => 'string',
        'images'             => 'array',
        'inspection_date'    => 'date',
        'inspection_subject' => 'string',
        'inspection_items'   => 'array',
        'inspection_reports' => 'array'
    ];

    public function setInspectionDateAttribute($value)
    {
        if ($value) {
            $this->attributes['inspection_date'] = $value;
        }
    }

    public function getWarningSignTextAttribute($value)
    {
        if ($value) {
            return $value;
        }
    }

    public function getImagesAttribute($images)
    {
        if ($images) {
            $images = Util::JsonDecode($images);
            foreach ($images as &$image) {
                $image = url('storage/reports/'.urlencode($image));
            }
            unset($image);
        }

        return $images;
    }

    public function getInspectionDateAttribute($value)
    {
        if ($value) {
            $date = $this->asDateTime($value);

            return $date->format('Y-m-d');
        }

        return $value;
    }

    public function getInspectionReportsAttribute($reports)
    {
        if ($reports) {
            $reports = Util::JsonDecode($reports);
            foreach ($reports as &$report) {
                $report = url('storage/reports/'.urlencode($report));
            }
            unset($report);
        }

        return $reports;
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
}
