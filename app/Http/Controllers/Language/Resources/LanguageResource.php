<?php

namespace App\Http\Controllers\Language\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class LanguageResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id ?? '',
            'name' => $this->name ?? '',
            'locale' => $this->locale ?? '',
            'status' => $this->status ?? '',
            'lc' => $this->lc ?? ''
        ];
    }
}
