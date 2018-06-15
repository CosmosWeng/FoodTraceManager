<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOpendataRequest;
use App\Http\Requests\UpdateOpendataRequest;
use App\Repositories\OpendataRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class OpendataController extends AppBaseController
{
    /** @var  OpendataRepository */
    private $opendataRepository;

    public function __construct(OpendataRepository $opendataRepo)
    {
        $this->opendataRepository = $opendataRepo;
    }

    /**
     * Display a listing of the Opendata.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->opendataRepository->pushCriteria(new RequestCriteria($request));
        $opendatas = $this->opendataRepository->paginate(15);

        return view('opendatas.index')
            ->with('opendatas', $opendatas);
    }

    /**
     * Show the form for creating a new Opendata.
     *
     * @return Response
     */
    public function create()
    {
        return view('opendatas.create');
    }

    /**
     * Store a newly created Opendata in storage.
     *
     * @param CreateOpendataRequest $request
     *
     * @return Response
     */
    public function store(CreateOpendataRequest $request)
    {
        $input = $request->all();

        $opendata = $this->opendataRepository->create($input);

        Flash::success('Opendata saved successfully.');

        return redirect(route('admin.opendatas.index'));
    }

    /**
     * Display the specified Opendata.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $opendata = $this->opendataRepository->findWithoutFail($id);

        if (empty($opendata)) {
            Flash::error('Opendata not found');

            return redirect(route('admin.opendatas.index'));
        }

        return view('opendatas.show')->with('opendata', $opendata);
    }

    /**
     * Show the form for editing the specified Opendata.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $opendata = $this->opendataRepository->findWithoutFail($id);

        if (empty($opendata)) {
            Flash::error('Opendata not found');

            return redirect(route('admin.opendatas.index'));
        }

        return view('opendatas.edit')->with('opendata', $opendata);
    }

    /**
     * Update the specified Opendata in storage.
     *
     * @param  int              $id
     * @param UpdateOpendataRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOpendataRequest $request)
    {
        $opendata = $this->opendataRepository->findWithoutFail($id);

        if (empty($opendata)) {
            Flash::error('Opendata not found');

            return redirect(route('admin.opendatas.index'));
        }

        $opendata = $this->opendataRepository->update($request->all(), $id);

        Flash::success('Opendata updated successfully.');

        return redirect(route('admin.opendatas.index'));
    }

    /**
     * Remove the specified Opendata from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $opendata = $this->opendataRepository->findWithoutFail($id);

        if (empty($opendata)) {
            Flash::error('Opendata not found');

            return redirect(route('admin.opendatas.index'));
        }

        $this->opendataRepository->delete($id);

        Flash::success('Opendata deleted successfully.');

        return redirect(route('admin.opendatas.index'));
    }
}
