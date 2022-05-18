<?php

namespace App\Http\Controllers\Language\Repositories;

use App\Http\Controllers\Language\Contracts\LanguageInterface;
use App\Models\Languages\Language;
use Exception;
use Illuminate\Support\Facades\DB;

class LanguageRepository implements LanguageInterface
{
    /**
     * @var Language
     */
    private $language;

    /**
     * LanguageRepository constructor.
     *
     * @param Language $language
     */
    public function __construct(Language $language)
    {
        $this->language = $language;
    }

    /**
     * Create a new language and return id
     *
     * @param $request
     * @return mixed
     * @throws Exception
     */
    public function store($request)
    {
        return $this->language->create($request)->id;
    }

    /**
     * Get specified language from database
     *
     * @param $id
     * @return Language
     * @throws Exception
     */
    public function edit($id)
    {
        return $this->getLanguageById(
            $id
        );
    }

    /**
     * Returns Language by id
     *
     * @param $languageId
     * @param string[] $columns
     * @return Language
     */
    public function getLanguageById($languageId, array $columns = ['*']): Language
    {
        return $this->language
            ->select($columns)
            ->where([
                'id' => $languageId,
            ])
            ->firstOrFail();
    }

    /**
     * Update specified language
     *
     * @param $request
     * @param $id
     * @return bool
     * @throws Exception
     */
    public function update($request, $id): bool
    {
        return $this->getLanguageById($id)->update($request);
    }

    /**
     * Destroy specified language
     *
     * @param $id
     * @return bool
     * @throws Exception
     */
    public function destroy($id): bool
    {
        return $this->getLanguageById($id)->delete();
    }

    /**
     * Return languages as datatable with statuses
     * @throws Exception
     */
    public function datatables()
    {
        return DB::table($this->language->getTable())
            ->select('*');
    }
}
