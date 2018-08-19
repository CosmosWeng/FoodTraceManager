<?php

namespace App\Repositories;

use App\Models\Knowledge;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KnowledgeRepository
 * @package App\Repositories
 * @version August 19, 2018, 11:50 pm CST
 *
 * @method Knowledge findWithoutFail($id, $columns = ['*'])
 * @method Knowledge find($id, $columns = ['*'])
 * @method Knowledge first($columns = ['*'])
*/
class KnowledgeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'images',
        'date'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Knowledge::class;
    }
}
