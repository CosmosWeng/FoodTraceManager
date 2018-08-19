<?php

use App\Models\Knowledge;
use App\Repositories\KnowledgeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KnowledgeRepositoryTest extends TestCase
{
    use MakeKnowledgeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var KnowledgeRepository
     */
    protected $knowledgeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->knowledgeRepo = App::make(KnowledgeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateKnowledge()
    {
        $knowledge = $this->fakeKnowledgeData();
        $createdKnowledge = $this->knowledgeRepo->create($knowledge);
        $createdKnowledge = $createdKnowledge->toArray();
        $this->assertArrayHasKey('id', $createdKnowledge);
        $this->assertNotNull($createdKnowledge['id'], 'Created Knowledge must have id specified');
        $this->assertNotNull(Knowledge::find($createdKnowledge['id']), 'Knowledge with given id must be in DB');
        $this->assertModelData($knowledge, $createdKnowledge);
    }

    /**
     * @test read
     */
    public function testReadKnowledge()
    {
        $knowledge = $this->makeKnowledge();
        $dbKnowledge = $this->knowledgeRepo->find($knowledge->id);
        $dbKnowledge = $dbKnowledge->toArray();
        $this->assertModelData($knowledge->toArray(), $dbKnowledge);
    }

    /**
     * @test update
     */
    public function testUpdateKnowledge()
    {
        $knowledge = $this->makeKnowledge();
        $fakeKnowledge = $this->fakeKnowledgeData();
        $updatedKnowledge = $this->knowledgeRepo->update($fakeKnowledge, $knowledge->id);
        $this->assertModelData($fakeKnowledge, $updatedKnowledge->toArray());
        $dbKnowledge = $this->knowledgeRepo->find($knowledge->id);
        $this->assertModelData($fakeKnowledge, $dbKnowledge->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteKnowledge()
    {
        $knowledge = $this->makeKnowledge();
        $resp = $this->knowledgeRepo->delete($knowledge->id);
        $this->assertTrue($resp);
        $this->assertNull(Knowledge::find($knowledge->id), 'Knowledge should not exist in DB');
    }
}
