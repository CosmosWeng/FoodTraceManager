<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKnowledgeRequest;
use App\Http\Requests\UpdateKnowledgeRequest;
use App\Repositories\KnowledgeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class KnowledgeController extends AppBaseController
{
    /** @var  KnowledgeRepository */
    private $knowledgeRepository;

    public function __construct(KnowledgeRepository $knowledgeRepo)
    {
        $this->knowledgeRepository = $knowledgeRepo;
    }

    /**
     * Display a listing of the Knowledge.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->knowledgeRepository->pushCriteria(new RequestCriteria($request));
        $knowledge = $this->knowledgeRepository->all();

        return view('knowledge.index')
            ->with('knowledge', $knowledge);
    }

    /**
     * Show the form for creating a new Knowledge.
     *
     * @return Response
     */
    public function create()
    {
        return view('knowledge.create');
    }

    /**
     * Store a newly created Knowledge in storage.
     *
     * @param CreateKnowledgeRequest $request
     *
     * @return Response
     */
    public function store(CreateKnowledgeRequest $request)
    {
        $input = $request->all();

        $knowledge = $this->knowledgeRepository->create($input);

        Flash::success('Knowledge saved successfully.');

        return redirect(route('knowledge.index'));
    }

    /**
     * Display the specified Knowledge.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $knowledge = $this->knowledgeRepository->findWithoutFail($id);

        if (empty($knowledge)) {
            Flash::error('Knowledge not found');

            return redirect(route('knowledge.index'));
        }

        return view('knowledge.show')->with('knowledge', $knowledge);
    }

    /**
     * Show the form for editing the specified Knowledge.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $knowledge = $this->knowledgeRepository->findWithoutFail($id);

        if (empty($knowledge)) {
            Flash::error('Knowledge not found');

            return redirect(route('knowledge.index'));
        }

        return view('knowledge.edit')->with('knowledge', $knowledge);
    }

    /**
     * Update the specified Knowledge in storage.
     *
     * @param  int              $id
     * @param UpdateKnowledgeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKnowledgeRequest $request)
    {
        $knowledge = $this->knowledgeRepository->findWithoutFail($id);

        if (empty($knowledge)) {
            Flash::error('Knowledge not found');

            return redirect(route('knowledge.index'));
        }

        $knowledge = $this->knowledgeRepository->update($request->all(), $id);

        Flash::success('Knowledge updated successfully.');

        return redirect(route('knowledge.index'));
    }

    /**
     * Remove the specified Knowledge from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $knowledge = $this->knowledgeRepository->findWithoutFail($id);

        if (empty($knowledge)) {
            Flash::error('Knowledge not found');

            return redirect(route('knowledge.index'));
        }

        $this->knowledgeRepository->delete($id);

        Flash::success('Knowledge deleted successfully.');

        return redirect(route('knowledge.index'));
    }
}
