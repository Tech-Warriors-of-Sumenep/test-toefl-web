<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ContohSoal extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function materi(): BelongsTo
    {
        return $this->belongsTo(Materi::class);
    }

    public function contohJawaban(): HasMany
    {
        return $this->hasMany(JawabanContohSoals::class);
    }


}
