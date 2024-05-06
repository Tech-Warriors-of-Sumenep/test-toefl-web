<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Record extends Model
{
    use HasFactory;

    // Many To One
    public function soal(): BelongsTo {
        return $this->belongsTo(Soal::class);
    }

    // Many To One
    public function jawaban(): BelongsTo {
        return $this->belongsTo(Jawaban::class);
    }

    // Many To One
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
