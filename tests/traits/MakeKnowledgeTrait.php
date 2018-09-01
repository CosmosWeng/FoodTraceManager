<?php

use Faker\Factory as Faker;
use App\Models\Knowledge;
use App\Repositories\KnowledgeRepository;

trait MakeKnowledgeTrait
{
    /**
     * Create fake instance of Knowledge and save it in database
     *
     * @param array $knowledgeFields
     * @return Knowledge
     */
    public function makeKnowledge($knowledgeFields = [])
    {
        /** @var KnowledgeRepository $knowledgeRepo */
        $knowledgeRepo = App::make(KnowledgeRepository::class);
        $theme = $this->fakeKnowledgeData($knowledgeFields);
        return $knowledgeRepo->create($theme);
    }

    /**
     * Get fake instance of Knowledge
     *
     * @param array $knowledgeFields
     * @return Knowledge
     */
    public function fakeKnowledge($knowledgeFields = [])
    {
        return new Knowledge($this->fakeKnowledgeData($knowledgeFields));
    }

    /**
     * Get fake data of Knowledge
     *
     * @param array $postFields
     * @return array
     */
    public function fakeKnowledgeData($knowledgeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->text,
            'image' => $fake->text,
            'url' => $fake->text,
            'date' => $fake->word,
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s')
        ], $knowledgeFields);
    }
}
