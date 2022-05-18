<?php


namespace App\Http\Controllers\Language\Services;

use App\Helpers\GeneralStatusHelper;
use App\Http\Controllers\Language\Collections\LanguageCollection;
use App\Http\Controllers\Language\Contracts\LanguageInterface;
use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class LanguageService
{
    /**
     * @var LanguageInterface
     */
    private $repository;

    /**
     * LanguageService constructor.
     * @param LanguageInterface $repository
     */
    public function __construct(LanguageInterface $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Send requested value to repository for creating a new language
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return DB::transaction(function () use ($request) {
            return $this->repository->store($request);
        });
    }

    /**
     * Get specified language from repository
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return $this->repository->edit($id);
    }

    /**
     * Update language information according to incoming information
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return DB::transaction(function () use ($request, $id) {
            return $this->repository->update($request, $id);
        });
    }

    /**
     * Deletes Language by id
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return DB::transaction(function () use ($id) {
            return $this->repository->destroy($id);
        });
    }

    /**
     * @return LanguageCollection
     * @throws Exception
     */
    public function datatables(): LanguageCollection
    {
        $datatable = DataTables::of($this->repository->datatables())
            ->with([GeneralStatusHelper::$statusDataName => GeneralStatusHelper::getStatus('status')])
            ->make(true);
        return new LanguageCollection(
            !is_null($datatable) ? collect($datatable->getData()) : collect([])
        );
    }

}
