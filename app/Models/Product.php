<?php

namespace App\Models;

use Eloquent as Model;
use App\Utils\Util;

/**
 * Class Product
 * @package App\Models
 * @version June 15, 2018, 7:18 am UTC
 *
 * @property integer category_id
 * @property string company
 * @property string name
 * @property string url
 * @property string images
 * @property string inspection_reports
 * @property date inspection_date
 */
class Product extends Model
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
        'inspection_text',
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
        'inspection_text'    => 'string',
        'inspection_reports' => 'array',
        'inspection_date'    => 'date'
    ];

    public function getInspectionDateAttribute($value): string
    {
        $date = $this->asDateTime($value);

        return $date->format('Y-m-d');
    }

    public function getImagesAttribute($images) : array
    {
        $images = Util::JsonDecode($images);
        foreach ($images as &$image) {
            $image = url('storage/images/'.urlencode($image));
        }

        return $images;
    }

    public function getInspectionReportsAttribute($reports) : array
    {
        $reports = Util::JsonDecode($reports);
        foreach ($reports as &$report) {
            $report = url('storage/reports/'.urlencode($report));
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
