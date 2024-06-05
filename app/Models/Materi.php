<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Materi extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    // Many To One
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // One To Many
    public function contohSoal()
    {
        return $this->hasMany(ContohSoal::class);
    }

    // Has Many Through
    public function contohJawaban(): HasManyThrough{
        return $this->hasManyThrough(JawabanContohSoals::class, ContohSoal::class);
    }
}
