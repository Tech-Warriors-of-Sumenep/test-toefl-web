<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ujian extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    // One To Many
    public function soal(): HasMany {
        return $this->hasMany(Soal::class);
    }

    // One To Many
    public function nilai(): HasMany {
        return $this->hasMany(Nilai::class);
    }

    // Many To One
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
