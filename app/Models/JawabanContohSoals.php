<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class JawabanContohSoals extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function contohSoal(): BelongsTo
    {
        return $this->belongsTo(ContohSoal::class);
    }
}
