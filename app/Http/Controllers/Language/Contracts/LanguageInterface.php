<?php

namespace App\Http\Controllers\Language\Contracts;

interface LanguageInterface
{
    /**
     * @param $request
     * @return mixed
     */
    public function store($request);

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id);

    /**
     * @param $languageId
     * @param array|string[] $columns
     * @return mixed
     */
    public function getLanguageById($languageId, array $columns = ['*']);

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id);

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id);

    /**
     * @return mixed
     */
    public function datatables();
}
