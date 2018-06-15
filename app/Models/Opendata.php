<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Opendata
 * @package App\Models
 * @version June 15, 2018, 6:21 am UTC
 *
 * @property string categories
 * @property string company
 * @property string name
 * @property string specifications
 * @property string trace_code
 * @property string warning_words
 * @property string features
 * @property string image_start_at
 * @property string photo_front
 * @property string photo_back
 * @property string photo_side
 * @property string start_at
 * @property string amount
 * @property string contains
 * @property string calorie
 * @property string protein
 * @property string fat
 * @property string fat_saturated
 * @property string fat_trans
 * @property string carbohydrates
 * @property string sugar
 * @property string sodium
 * @property string g100_calorie
 * @property string g100_protein
 * @property string g100_fat
 * @property string g100_fat_saturated
 * @property string g100_fat_trans
 * @property string g100_carbohydrates
 * @property string g100_sugar
 * @property string g100_sodium
 * @property string ml100_calorie
 * @property string ml100_protein
 * @property string ml100_fat
 * @property string ml100_fat_saturated
 * @property string ml100_fat_trans
 * @property string ml100_carbohydrates
 * @property string ml100_sugar
 * @property string ml100_sodium
 * @property string dr_calorie
 * @property string dr_protein
 * @property string dr_fat
 * @property string dr_fat_saturated
 * @property string dr_fat_trans
 * @property string dr_carbohydrates
 * @property string dr_sugar
 * @property string dr_sodium
 * @property string nutrition_label_picture
 * @property string content_label
 * @property string content_label_picture
 * @property string inspection_date
 * @property string inspection_item
 * @property string inspection_report_1
 * @property string inspection_report_2
 * @property string inspection_report_3
 */
class Opendata extends Model
{

    public $table = 'opendata';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'categories',
        'company',
        'name',
        'specifications',
        'trace_code',
        'warning_words',
        'features',
        'image_start_at',
        'photo_front',
        'photo_back',
        'photo_side',
        'start_at',
        'amount',
        'contains',
        'calorie',
        'protein',
        'fat',
        'fat_saturated',
        'fat_trans',
        'carbohydrates',
        'sugar',
        'sodium',
        'g100_calorie',
        'g100_protein',
        'g100_fat',
        'g100_fat_saturated',
        'g100_fat_trans',
        'g100_carbohydrates',
        'g100_sugar',
        'g100_sodium',
        'ml100_calorie',
        'ml100_protein',
        'ml100_fat',
        'ml100_fat_saturated',
        'ml100_fat_trans',
        'ml100_carbohydrates',
        'ml100_sugar',
        'ml100_sodium',
        'dr_calorie',
        'dr_protein',
        'dr_fat',
        'dr_fat_saturated',
        'dr_fat_trans',
        'dr_carbohydrates',
        'dr_sugar',
        'dr_sodium',
        'nutrition_label_picture',
        'content_label',
        'content_label_picture',
        'inspection_date',
        'inspection_item',
        'inspection_report_1',
        'inspection_report_2',
        'inspection_report_3'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'categories' => 'string',
        'company' => 'string',
        'name' => 'string',
        'specifications' => 'string',
        'trace_code' => 'string',
        'warning_words' => 'string',
        'features' => 'string',
        'image_start_at' => 'string',
        'photo_front' => 'string',
        'photo_back' => 'string',
        'photo_side' => 'string',
        'start_at' => 'string',
        'amount' => 'string',
        'contains' => 'string',
        'calorie' => 'string',
        'protein' => 'string',
        'fat' => 'string',
        'fat_saturated' => 'string',
        'fat_trans' => 'string',
        'carbohydrates' => 'string',
        'sugar' => 'string',
        'sodium' => 'string',
        'g100_calorie' => 'string',
        'g100_protein' => 'string',
        'g100_fat' => 'string',
        'g100_fat_saturated' => 'string',
        'g100_fat_trans' => 'string',
        'g100_carbohydrates' => 'string',
        'g100_sugar' => 'string',
        'g100_sodium' => 'string',
        'ml100_calorie' => 'string',
        'ml100_protein' => 'string',
        'ml100_fat' => 'string',
        'ml100_fat_saturated' => 'string',
        'ml100_fat_trans' => 'string',
        'ml100_carbohydrates' => 'string',
        'ml100_sugar' => 'string',
        'ml100_sodium' => 'string',
        'dr_calorie' => 'string',
        'dr_protein' => 'string',
        'dr_fat' => 'string',
        'dr_fat_saturated' => 'string',
        'dr_fat_trans' => 'string',
        'dr_carbohydrates' => 'string',
        'dr_sugar' => 'string',
        'dr_sodium' => 'string',
        'nutrition_label_picture' => 'string',
        'content_label' => 'string',
        'content_label_picture' => 'string',
        'inspection_date' => 'string',
        'inspection_item' => 'string',
        'inspection_report_1' => 'string',
        'inspection_report_2' => 'string',
        'inspection_report_3' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
