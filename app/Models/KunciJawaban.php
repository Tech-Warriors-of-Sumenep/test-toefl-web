<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KunciJawaban extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    // One To One
    public function soal(): BelongsTo {
        return $this->belongsTo(Soal::class);
    }

    // One To One
    public function jawaban(): BelongsTo {
        return $this->belongsTo(Jawaban::class);
    }
}
