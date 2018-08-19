<?php

namespace App\Repositories;

use App\Models\Topic;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TopicRepository
 * @package App\Repositories
 * @version August 19, 2018, 11:50 pm CST
 *
 * @method Topic findWithoutFail($id, $columns = ['*'])
 * @method Topic find($id, $columns = ['*'])
 * @method Topic first($columns = ['*'])
*/
class TopicRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'category',
        'title',
        'images',
        'date'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Topic::class;
    }
}
