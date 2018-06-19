<?php

namespace App\Repositories;

use App\Models\Products;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductsRepository
 * @package App\Repositories
 * @version June 19, 2018, 2:01 am UTC
 *
 * @method Products findWithoutFail($id, $columns = ['*'])
 * @method Products find($id, $columns = ['*'])
 * @method Products first($columns = ['*'])
 */
class ProductsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'category_id',
        'company',
        'name',
        'url',
        'images',
        'inspection_reports',
        'inspection_date'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Products::class;
    }
    
    public function getTotal()
    {
        $this->applyCriteria();
        $this->applyScope();

        return $this->model->count();
    }
}
