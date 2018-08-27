<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKnowledgeAPIRequest;
use App\Http\Requests\API\UpdateKnowledgeAPIRequest;
use App\Models\Knowledge;
use App\Repositories\KnowledgeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class KnowledgeController
 * @package App\Http\Controllers\API
 */
class KnowledgeAPIController extends AppBaseController
{
    /** @var  KnowledgeRepository */
    private $knowledgeRepository;

    public function __construct(KnowledgeRepository $knowledgeRepo)
    {
        $this->knowledgeRepository = $knowledgeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/knowledge",
     *      summary="Get a listing of the Knowledge.",
     *      tags={"Knowledge"},
     *      description="Get all Knowledge",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Knowledge")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->knowledgeRepository->pushCriteria(new RequestCriteria($request));
        $knowledge = $this->knowledgeRepository->paginate($request->get('limit', null));

        return $this->sendPaginateResponse($knowledge->toArray(), 'Knowledge retrieved successfully');
    }

    /**
     * @param CreateKnowledgeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/knowledge",
     *      summary="Store a newly created Knowledge in storage",
     *      tags={"Knowledge"},
     *      description="Store Knowledge",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Knowledge that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Knowledge")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Knowledge"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateKnowledgeAPIRequest $request)
    {
        $input = $request->all();

        $knowledge = $this->knowledgeRepository->create($input);

        return $this->sendResponse($knowledge->toArray(), 'Knowledge saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/knowledge/{id}",
     *      summary="Display the specified Knowledge",
     *      tags={"Knowledge"},
     *      description="Get Knowledge",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Knowledge",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Knowledge"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Knowledge $knowledge */
        $knowledge = $this->knowledgeRepository->findWithoutFail($id);

        if (empty($knowledge)) {
            return $this->sendError('Knowledge not found');
        }

        return $this->sendResponse($knowledge->toArray(), 'Knowledge retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateKnowledgeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/knowledge/{id}",
     *      summary="Update the specified Knowledge in storage",
     *      tags={"Knowledge"},
     *      description="Update Knowledge",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Knowledge",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Knowledge that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Knowledge")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Knowledge"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateKnowledgeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Knowledge $knowledge */
        $knowledge = $this->knowledgeRepository->findWithoutFail($id);

        if (empty($knowledge)) {
            return $this->sendError('Knowledge not found');
        }

        $knowledge = $this->knowledgeRepository->update($input, $id);

        return $this->sendResponse($knowledge->toArray(), 'Knowledge updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/knowledge/{id}",
     *      summary="Remove the specified Knowledge from storage",
     *      tags={"Knowledge"},
     *      description="Delete Knowledge",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Knowledge",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Knowledge $knowledge */
        $knowledge = $this->knowledgeRepository->findWithoutFail($id);

        if (empty($knowledge)) {
            return $this->sendError('Knowledge not found');
        }

        $knowledge->delete();

        return $this->sendResponse($id, 'Knowledge deleted successfully');
    }
}
