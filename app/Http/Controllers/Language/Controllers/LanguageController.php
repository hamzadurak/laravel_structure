<?php

namespace App\Http\Controllers\Language\Controllers;

use App\Helpers\GeneralStatusHelper;
use App\Helpers\RedirectHelper;
use App\Http\Controllers\Language\Collections\LanguageCollection;
use App\Http\Controllers\Language\Services\LanguageService;
use App\Http\Requests\Language\LanguageStoreRequest;
use App\Http\Requests\Language\LanguageUpdateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Exception;

class LanguageController extends Controller
{
    /**
     * @var LanguageService
     */
    private $service;

    /**
     * LanguageController constructor.
     *
     * @param LanguageService $service
     */
    public function __construct(LanguageService $service)
    {
        $this->service = $service;
    }

    /**
     * Returns required data for create page
     *
     * @return array
     */
    public function create(): array
    {
        return [
            GeneralStatusHelper::$statusDataName => GeneralStatusHelper::getStatus('status')
        ];
    }

    /**
     * Store a new language
     *
     * @param LanguageStoreRequest $request
     * @return JsonResponse|object
     */
    public function store(LanguageStoreRequest $request)
    {
        return RedirectHelper::store(['id' => $this->service->store($request->all())]);
    }

    /**
     * Get data for specified language
     *
     * @param $id
     * @return array
     */
    public function edit($id): array
    {
        return [
            'language' => $this->service->edit($id),
            GeneralStatusHelper::$statusDataName => GeneralStatusHelper::getStatus('status')
        ];
    }

    /**
     * Update language if its not changed to another used language
     *
     * @param LanguageUpdateRequest $request
     * @param $id
     * @return JsonResponse|object
     */
    public function update(LanguageUpdateRequest $request, $id)
    {
        if ($this->service->update($request->all(), $id)) {
            return RedirectHelper::update();
        }
        return RedirectHelper::error();
    }

    /**
     * Destroy specified language
     *
     * @param $id
     * @return JsonResponse|object
     */
    public function destroy($id)
    {
        if ($this->service->destroy($id)) {
            return RedirectHelper::destroy();
        }
        return RedirectHelper::error();
    }

    /**
     * Get language list as datatable
     * @return LanguageCollection
     * @throws Exception
     */
    public function datatables(): LanguageCollection
    {
        return $this->service->datatables();
    }
}
