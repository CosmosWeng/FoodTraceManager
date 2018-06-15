<?php

namespace App\Repositories;

use App\Models\Opendata;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OpendataRepository
 * @package App\Repositories
 * @version June 15, 2018, 6:21 am UTC
 *
 * @method Opendata findWithoutFail($id, $columns = ['*'])
 * @method Opendata find($id, $columns = ['*'])
 * @method Opendata first($columns = ['*'])
*/
class OpendataRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Opendata::class;
    }
}
