<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KnowledgeApiTest extends TestCase
{
    use MakeKnowledgeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateKnowledge()
    {
        $knowledge = $this->fakeKnowledgeData();
        $this->json('POST', '/api/v1/knowledge', $knowledge);

        $this->assertApiResponse($knowledge);
    }

    /**
     * @test
     */
    public function testReadKnowledge()
    {
        $knowledge = $this->makeKnowledge();
        $this->json('GET', '/api/v1/knowledge/'.$knowledge->id);

        $this->assertApiResponse($knowledge->toArray());
    }

    /**
     * @test
     */
    public function testUpdateKnowledge()
    {
        $knowledge = $this->makeKnowledge();
        $editedKnowledge = $this->fakeKnowledgeData();

        $this->json('PUT', '/api/v1/knowledge/'.$knowledge->id, $editedKnowledge);

        $this->assertApiResponse($editedKnowledge);
    }

    /**
     * @test
     */
    public function testDeleteKnowledge()
    {
        $knowledge = $this->makeKnowledge();
        $this->json('DELETE', '/api/v1/knowledge/'.$knowledge->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/knowledge/'.$knowledge->id);

        $this->assertResponseStatus(404);
    }
}
