<?php

use Faker\Factory as Faker;
use App\Models\Topic;
use App\Repositories\TopicRepository;

trait MakeTopicTrait
{
    /**
     * Create fake instance of Topic and save it in database
     *
     * @param array $topicFields
     * @return Topic
     */
    public function makeTopic($topicFields = [])
    {
        /** @var TopicRepository $topicRepo */
        $topicRepo = App::make(TopicRepository::class);
        $theme = $this->fakeTopicData($topicFields);
        return $topicRepo->create($theme);
    }

    /**
     * Get fake instance of Topic
     *
     * @param array $topicFields
     * @return Topic
     */
    public function fakeTopic($topicFields = [])
    {
        return new Topic($this->fakeTopicData($topicFields));
    }

    /**
     * Get fake data of Topic
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTopicData($topicFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'category' => $fake->word,
            'title' => $fake->text,
            'images' => $fake->text,
            'date' => $fake->word,
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s')
        ], $topicFields);
    }
}
