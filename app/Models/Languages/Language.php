<?php

namespace App\Models\Languages;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends BaseModel
{
    use HasFactory;
    /**
     * @var string
     */
    protected $table = 'languages';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name',
        'locale',
        'lc',
        'status',
    ];

    /**
     * @var array
     */
    protected $guarded = [];
}

