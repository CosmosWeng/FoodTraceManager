<?php

namespace App\Repositories;

use App\Models\Knowledge;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KnowledgeRepository
 * @package App\Repositories
 * @version September 1, 2018, 12:10 pm CST
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
        'image',
        'url',
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
