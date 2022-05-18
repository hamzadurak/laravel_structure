<?php

namespace App\Http\Controllers\Language\Collections;

use App\Http\Controllers\Language\Resources\LanguageResource;
use App\Traits\CollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class LanguageCollection
 * @package App\Http\Resources\Language
 */
class LanguageCollection extends ResourceCollection
{
    use CollectionTrait;

    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        self::withoutWrapping();
        $data = LanguageResource::collection($this->resource['data']);
        return array_merge(
            $this->datatables($data),
            $this->status()
        );

    }
}
